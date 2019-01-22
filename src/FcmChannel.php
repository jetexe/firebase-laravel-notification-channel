<?php

namespace NotificationChannels\FirebaseCloudMessaging;

use Illuminate\Notifications\Notification;
use NotificationChannels\FirebaseCloudMessaging\Exceptions\CouldNotSendNotification;

/**
 * Channel to send message to Firebase cloud message
 */
class FcmChannel
{
    /**
     * @var FcmClient
     */
    protected $fcm_client;

    /**
     * FcmChannel constructor.
     *
     * @param FcmClient $fcm_client
     */
    public function __construct(FcmClient $fcm_client)
    {
        $this->fcm_client = $fcm_client;
    }

    /**
     * Send the given notification.
     *
     * @param mixed                                  $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        if (\method_exists($notification, 'toFcm')) {
            $response = $this->fcm_client->sendMessage(
                $notifiable->routeNotificationFor('fcm', $notification),
                $notification->toFcm()
            );

            if ($response->getStatusCode() !== 200) {
                throw new CouldNotSendNotification((string) $response->getBody());
            }
        }
    }
}
