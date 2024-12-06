<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransService {

    public function __construct() {
        // Set your Merchant Server Key
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transactions).
        Config::$isProduction = env('MIDTRANS_SERVER', false);
        // Set sanitization on (default is true)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;
    }

    public function transaction($data) {
        try {
            $snapToken = Snap::getSnapToken($data);
            return $snapToken;
        } catch (\Exception $e) {
            // Handle exception
            return ['message' => $e->getMessage(), 'is_success' => false];
        }
    }
}