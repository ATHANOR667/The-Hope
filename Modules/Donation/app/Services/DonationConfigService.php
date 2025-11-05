<?php

namespace Modules\Donation\Services;

use Illuminate\Support\Facades\Storage;

class DonationConfigService
{
    protected string $path = 'donation_settings.json';

    public function all(): array
    {
        if (!Storage::exists($this->path)) {
            return [];
        }

        return json_decode(Storage::get($this->path), true);
    }

    public  function get(string $key, $default = null)
    {
        $config = $this->all();

        return data_get($config, $key, $default);
    }

    public function set(string $key, $value): void
    {
        $config = $this->all();

        data_set($config, $key, $value);

        Storage::put($this->path, json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
