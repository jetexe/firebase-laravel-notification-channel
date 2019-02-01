<?php

namespace AvtoDev\FirebaseCloudMessaging\PlatformSettings;

use Illuminate\Contracts\Support\Arrayable;

/**
 *  Android specific options for messages sent through FCM connection server.
 */
class AndroidFcmPlatformSettings implements Arrayable
{
    /**
     * Priority settings.
     */
    const PRIORITY_HIGH = 'HIGH';

    const PRIORITY_NORMAL = 'NORMAL';

    /**
     * An identifier of a group of messages that can be collapsed,
     * so that only the last message gets sent when delivery can be resumed.
     * A maximum of 4 different collapse keys is allowed at any given time.
     *
     * @var string
     */
    protected $collapse_key;

    /**
     * Message priority. Can take "normal" and "high" values.
     *
     * @var string
     */
    protected $priority;

    /**
     * A duration in seconds with up to nine fractional digits, terminated by 's'. Example: "3.5s".
     *
     * @var string
     */
    protected $ttl;

    /**
     * Package name of the application where the registration token must match in order to receive the message.
     *
     * @var string
     */
    protected $restricted_package_name;

    /**
     * Arbitrary key/value payload. If present, it will override google.firebase.fcm.v1.Message.data.
     * An object containing a list of "key": value pairs.
     *
     * @var array
     */
    protected $data;

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
     * The notification's icon.
     * Sets the notification icon to myicon for drawable resource myicon.
     * If you don't send this key in the request, FCM displays the launcher icon specified in your app manifest.
     *
     * @var string
     */
    protected $icon;

    /**
     * The notification's icon color, expressed in #rrggbb format.
     *
     * @var string
     */
    protected $color;

    /**
     * The sound to play when the device receives the notification.
     * Supports "default" or the filename of a sound resource bundled in the app.
     * Sound files must reside in /res/raw/.
     *
     * @var string
     */
    protected $sound;

    /**
     * Identifier used to replace existing notifications in the notification drawer.
     * If not specified, each request creates a new notification.
     * If specified and a notification with the same tag is already being shown,
     * the new notification replaces the existing one in the notification drawer.
     *
     * @var string
     */
    protected $tag;

    /**
     * The action associated with a user click on the notification.
     * If specified, an activity with a matching intent filter is launched when a user clicks on the notification.
     *
     * @var string
     */
    protected $click_action;

    /**
     * The key to the body string in the app's string resources to use to localize the body text to the user's current
     * localization.
     *
     * @var string
     */
    protected $body_loc_key;

    /**
     * Variable string values to be used in place of the format specifiers in body_loc_key to use to localize the body
     * text to the user's current localization.
     *
     * @var string[]
     */
    protected $body_loc_args;

    /**
     * The key to the title string in the app's string resources to use to localize the title text to the user's
     * current localization.
     *
     * @var string
     */
    protected $title_loc_key;

    /**
     * Variable string values to be used in place of the format specifiers in title_loc_key to use to localize the
     * title text to the user's current localization.
     *
     * @var string[]
     */
    protected $title_loc_args;

    /**
     * The notification's channel id (new in Android O). The app must create a channel with this channel ID before any
     * notification with this channel ID is received. If you don't send this channel ID in the request, or if the
     * channel ID provided has not yet been created by the app, FCM uses the channel ID specified in the app manifest.
     *
     * @var string
     */
    protected $channel_id;

    /**
     * An identifier of a group of messages that can be collapsed,
     * so that only the last message gets sent when delivery can be resumed.
     * A maximum of 4 different collapse keys is allowed at any given time.
     *
     * @param string $collapse_key
     */
    public function setCollapseKey($collapse_key)
    {
        $this->collapse_key = $collapse_key;
    }

    /**
     * Message priority. Can take "normal" and "high" values.
     *
     * @param string $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * A duration in seconds with up to nine fractional digits, terminated by 's'. Example: "3.5s".
     *
     * @param string $ttl
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
    }

    /**
     * Package name of the application where the registration token must match in order to receive the message.
     *
     * @param string $restricted_package_name
     */
    public function setRestrictedPackageName($restricted_package_name)
    {
        $this->restricted_package_name = $restricted_package_name;
    }

    /**
     * Arbitrary key/value payload. If present, it will override google.firebase.fcm.v1.Message.data.
     * An object containing a list of "key": value pairs.
     *
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
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
     * The notification's icon.
     * Sets the notification icon to myicon for drawable resource myicon.
     * If you don't send this key in the request, FCM displays the launcher icon specified in your app manifest.
     *
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * The notification's icon color, expressed in #rrggbb format.
     *
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * The sound to play when the device receives the notification.
     * Supports "default" or the filename of a sound resource bundled in the app.
     * Sound files must reside in /res/raw/.
     *
     * @param string $sound
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
    }

    /**
     * Identifier used to replace existing notifications in the notification drawer.
     * If not specified, each request creates a new notification.
     * If specified and a notification with the same tag is already being shown,
     * the new notification replaces the existing one in the notification drawer.
     *
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * The action associated with a user click on the notification.
     * If specified, an activity with a matching intent filter is launched when a user clicks on the notification.
     *
     * @param string $click_action
     */
    public function setClickAction($click_action)
    {
        $this->click_action = $click_action;
    }

    /**
     * The key to the body string in the app's string resources to use to localize the body text to the user's current
     * localization.
     *
     * @param string $body_loc_key
     */
    public function setBodyLocKey($body_loc_key)
    {
        $this->body_loc_key = $body_loc_key;
    }

    /**
     * Variable string values to be used in place of the format specifiers in body_loc_key to use to localize the body
     * text to the user's current localization.
     *
     * @param string[] $body_loc_args
     */
    public function setBodyLocArgs($body_loc_args)
    {
        $this->body_loc_args = $body_loc_args;
    }

    /**
     * The key to the title string in the app's string resources to use to localize the title text to the user's
     * current localization.
     *
     * @param string $title_loc_key
     */
    public function setTitleLocKey($title_loc_key)
    {
        $this->title_loc_key = $title_loc_key;
    }

    /**
     * Variable string values to be used in place of the format specifiers in title_loc_key to use to localize the
     * title text to the user's current localization.
     *
     * @param string[] $title_loc_args
     */
    public function setTitleLocArgs($title_loc_args)
    {
        $this->title_loc_args = $title_loc_args;
    }

    /**
     * The notification's channel id (new in Android O). The app must create a channel with this channel ID before any
     * notification with this channel ID is received. If you don't send this channel ID in the request, or if the
     * channel ID provided has not yet been created by the app, FCM uses the channel ID specified in the app manifest.
     *
     * @param string $channel_id
     */
    public function setChannelId($channel_id)
    {
        $this->channel_id = $channel_id;
    }

    /**
     * Build an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'collapse_key'            => $this->collapse_key,
            'priority'                => $this->priority,
            'ttl'                     => $this->ttl,
            'restricted_package_name' => $this->restricted_package_name,
            'data'                    => $this->data,
            'notification'            => [
                'title'          => $this->title,
                'body'           => $this->body,
                'icon'           => $this->icon,
                'color'          => $this->color,
                'sound'          => $this->sound,
                'tag'            => $this->tag,
                'click_action'   => $this->click_action,
                'body_loc_key'   => $this->body_loc_key,
                'body_loc_args'  => $this->body_loc_args,
                'title_loc_key'  => $this->title_loc_key,
                'title_loc_args' => $this->title_loc_args,
                'channel_id'     => $this->channel_id,
            ],
        ];
    }
}
