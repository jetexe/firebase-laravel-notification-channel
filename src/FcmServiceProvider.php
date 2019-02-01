<?php

namespace AvtoDev\FirebaseCloudMessaging;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class FcmServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(FcmChannel::class)
            ->needs(FcmClient::class)
            ->give(function (Application $app) {
                /** @var \Illuminate\Config\Repository $config */
                $config = $app->make('config');
                $config_driver = $config->get('services.fcm.driver');

                if ($config_driver === 'file') {
                    $credentials_path = $config->get('services.fcm.credentials_path');

                    if (! \file_exists($credentials_path)) {
                        throw new \InvalidArgumentException('file does not exist');
                    }

                    $json = \file_get_contents($credentials_path);

                    if (! $credentials = \json_decode($json, true)) {
                        throw new \LogicException('invalid json for auth config');
                    }
                } elseif ($config_driver === 'config') {
                    $credentials = $config->get('services.fcm.credentials');
                } else {
                    throw new \InvalidArgumentException('Fcm driver not set');
                }

                //Build google client
                $google_client = new \Google_Client;
                $google_client->setAuthConfig($credentials);
                $google_client->addScope('https://www.googleapis.com/auth/firebase.messaging');

                /** @var Client $http_client Guzzle http-client with google-auth middleware */
                $http_client = $google_client->authorize();

                return new FcmClient(
                    $http_client,
                    'https://fcm.googleapis.com/v1/projects/'.$credentials['project_id'].'/messages:send'
                );
            });
    }
}
