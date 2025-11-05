<?php

namespace Modules\Donation\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExchangeApi
{
    public string $apiKey;

    public function __construct()
    {
        $this->apiKey = env('EXCHANGE_API_KEY');
    }

    /**
     * Récupère ou met en cache le taux de change entre deux devises pendant 5 minutes.
     *
     * @param string $from Devise source
     * @param string $to Devise cible
     * @return float
     * @throws \Exception si l’appel API échoue
     */
    public function getExchangeRate(string $from, string $to): float
    {
        $cacheKey = "exchange_rate_{$from}_{$to}";

        return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($from, $to) {
            $url = "https://v6.exchangerate-api.com/v6/{$this->apiKey}/pair/" . urlencode($from) . "/" . urlencode($to);

            $response = Http::get($url);
            $data = $response->json();

            if ($response->successful() && isset($data['conversion_rate'])) {
                return (float) $data['conversion_rate'];
            }

            Log::error("Échec API taux de change ({$from} → {$to}) : " . json_encode($data));
            throw new \Exception("Impossible d’obtenir le taux de change entre {$from} et {$to}.");
        });
    }

    /**
     * Convertit un montant d'une devise à une autre.
     *
     * @param string $from
     * @param string $to
     * @param float $amount
     * @return float
     * @throws \Exception
     */
    public function convertCurrency(string $from, string $to, float $amount): float
    {
        $rate = $this->getExchangeRate($from, $to);
        return $amount * $rate;
    }
}
