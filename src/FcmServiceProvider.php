<?php

namespace NotificationChannels\FirebaseCloudMessaging;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class FcmServiceProvider extends ServiceProvider
{
    const FCM_SCOPE = 'https://www.googleapis.com/auth/firebase.messaging';

    const ENV_NAME  = 'GOOGLE_APPLICATION_CREDENTIALS';

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(FcmChannel::class)
            ->needs(FcmClient::class)
            ->give(function () {
                putenv(static::ENV_NAME . '=' . config('fcm.credentials'));

                $google_client = new \Google_Client;
                $google_client->useApplicationDefaultCredentials();
                $google_client->addScope(static::FCM_SCOPE);

                /** @var Client $http_client */
                $http_client = $google_client->authorize();

                return new FcmClient(
                    $http_client,
                    'https://fcm.googleapis.com/v1/projects/' . config('fcm.project_id') . '/messages:send'
                );
            });
    }

    /**
     * Define the publishable migrations and resources.
     *
     * @return void
     */
    protected function definePublishing()
    {
        $this->publishes([
            __DIR__ . '/../config/fcm.php' => config_path('fcm.php'),
        ], 'config');
    }
}
