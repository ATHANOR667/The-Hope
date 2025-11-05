<?php

namespace Modules\ContactEtNewsletter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterDelivery;

class ContactEtNewsletterController extends Controller
{
    public function track(string $d) : Response
    {
        try {
            $delivery = NewsletterDelivery::withTrashed()->find($d);

            if (!$delivery || $delivery->is_read) {
                return $this->transparentPixel();
            }

            // Marque comme lu
            $delivery->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

            Log::info('Newsletter email read', [
                'delivery_id' => $delivery->id,
                'subscriber_id' => $delivery->subscriber_id,
                'message_id' => $delivery->newsletter_message_id,
            ]);

        } catch (\Exception $e) {
            Log::error('Newsletter track error', [
                'delivery_id' => $d,
                'error' => $e->getMessage(),
            ]);
        }

        return $this->transparentPixel();
    }

    protected function transparentPixel(): Response
    {
        $pixel = base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');

        return response($pixel, 200, [
            'Content-Type' => 'image/gif',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

}
