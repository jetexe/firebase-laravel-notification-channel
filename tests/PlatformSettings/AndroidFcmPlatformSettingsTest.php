<?php

namespace AvtoDev\FirebaseCloudMessaging\Test\PlatformSettings;

use AvtoDev\FirebaseCloudMessaging\PlatformSettings\AndroidFcmPlatformSettings;

/**
 * @coversDefaultClass \AvtoDev\FirebaseCloudMessaging\PlatformSettings\AndroidFcmPlatformSettings
 */
class AndroidFcmPlatformSettingsTest extends AbstractPlatformSettingsTest
{
    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            ['collapse_key', 'collapse_key', 'collapse_key_test'],
            ['priority', 'priority', 'priority_test'],
            ['ttl', 'ttl', 'ttl_test'],
            ['restricted_package_name', 'restricted_package_name', 'restricted_package_name_test'],
            ['data', 'data', ['key' => 'value']],
            ['title', 'notification.title', 'title_test'],
            ['body', 'notification.body', 'body_test'],
            ['icon', 'notification.icon', 'icon_test'],
            ['color', 'notification.color', 'color_test'],
            ['sound', 'notification.sound', 'sound_test'],
            ['tag', 'notification.tag', 'tag_test'],
            ['click_action', 'notification.click_action', 'click_action_test'],
            ['body_loc_key', 'notification.body_loc_key', 'body_loc_key_test'],
            ['body_loc_args', 'notification.body_loc_args', ['val1', 'val2']],
            ['title_loc_key', 'notification.title_loc_key', ['title1', 'title2']],
            ['title_loc_args', 'notification.title_loc_args', 'title_loc_args_test'],
            ['channel_id', 'notification.channel_id', 'channel_id_test'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getPlatformSetting()
    {
        return new AndroidFcmPlatformSettings;
    }
}
