<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class RefreshInstagramToken extends Command
{
    protected $signature = 'instagram:refresh-token';
    protected $description = 'Refresh Instagram access token if it is near expiry';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $accessToken = env('INSTAGRAM_ACCESS_TOKEN');
        $expiresIn = env('INSTAGRAM_EXPIRES_IN');

        $currentDate = time();
        $expiryDate = (int) $expiresIn;

        if ($expiryDate - $currentDate < 7 * 24 * 60 * 60) {
            $url = "https://graph.instagram.com/refresh_access_token";
            $response = Http::get($url, [
                'grant_type' => 'ig_refresh_token',
                'access_token' => $accessToken,
            ]);

            if ($response->successful()) {
                $responseJson = $response->json();
                $newAccessToken = $responseJson['access_token'];
                $newExpiryDate = time() + $responseJson['expires_in'];

                // Update .env file
                $this->updateEnv([
                    'INSTAGRAM_ACCESS_TOKEN' => $newAccessToken,
                    'INSTAGRAM_EXPIRES_IN' => $newExpiryDate,
                ]);

                Log::info('Instagram access token refreshed successfully.');
            } else {
                Log::error('Failed to refresh Instagram access token.', ['response' => $response->body()]);
            }
        }
    }

    protected function updateEnv(array $data)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        foreach ($data as $key => $value) {
            $str = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $str);
        }

        file_put_contents($envFile, $str);
    }
}
