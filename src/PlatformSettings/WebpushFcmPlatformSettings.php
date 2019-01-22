<?php

namespace NotificationChannels\FirebaseCloudMessaging\PlatformSettings;

/**
 * Webpush protocol options.
 */
class WebpushFcmPlatformSettings
{
    /**
     * HTTP headers defined in webpush protocol. Refer to Webpush protocol for supported headers, e.g. "TTL": "15".
     *
     * @var array
     */
    protected $headers;

    /**
     * Arbitrary key/value payload. If present, it will override google.firebase.fcm.v1.Message.data.
     *
     * @var array
     */
    protected $data;

    /**
     * The link to open when the user clicks on the notification. For all URL values, HTTPS is required.
     *
     * @var string
     */
    protected $link;

    /**
     * The notification's title. If present, it will override google.firebase.fcm.v1.Notification.title.
     *
     * @var string
     */
    protected $title;

    /**
     * The notification's body text. If present, it will override google.firebase.fcm.v1.Notification.body.
     *
     * @var string
     */
    protected $body;

    /**
     * HTTP headers defined in webpush protocol. Refer to Webpush protocol for supported headers, e.g. "TTL": "15".
     *
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Arbitrary key/value payload. If present, it will override google.firebase.fcm.v1.Message.data.
     *
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * The link to open when the user clicks on the notification. For all URL values, HTTPS is required.
     *
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * The notification's title. If present, it will override google.firebase.fcm.v1.Notification.title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * The notification's body text. If present, it will override google.firebase.fcm.v1.Notification.body.
     *
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Build an array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'headers'      => $this->headers,
            'data'         => $this->data,
            'notification' => [
                'body'  => $this->body,
                'title' => $this->title,
            ],
            'fcm_options'  => [
                'link' => $this->link,
            ],
        ];
    }
}
