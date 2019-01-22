<?php

namespace NotificationChannels\FirebaseCloudMessaging\Receivers;

interface FcmNotificationReceiverInterface
{
    /**
     * Get target (token or topic)
     *
     * @return array
     */
    public function getTarget();
}
