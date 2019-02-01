<?php

namespace AvtoDev\FirebaseCloudMessaging\Test;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use AvtoDev\FirebaseCloudMessaging\FcmClient;
use AvtoDev\FirebaseCloudMessaging\FcmMessage;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use AvtoDev\FirebaseCloudMessaging\Receivers\FcmDeviceReceiver;

/**
 * Class FcmClientTest.
 *
 * @coversDefaultClass \AvtoDev\FirebaseCloudMessaging\FcmClient
 */
class FcmClientTest extends AbstractTestCase
{
    /**
     * @var FcmClient
     */
    protected $firebase_client;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->firebase_client = $this->app->make(FcmClient::class);
    }

    /**
     * @covers ::sendMessage()
     * @throws \InvalidArgumentException
     */
    public function testSendMessage()
    {
        $response = new Response(200, [], \json_encode(['message_id' => 'test']));
        $this->mock_handler->append($response);

        $r = $this->firebase_client->sendMessage(new FcmDeviceReceiver('test'), new FcmMessage);
        static::assertJson((string) $r->getBody());
    }

    /**
     * Test remove empty values.
     *
     * @covers ::filterPayload()
     *
     * @throws \ReflectionException
     * @throws InvalidArgumentException
     */
    public function testFilterPayload()
    {
        $unfiltered_payload = [
            'foo'   => 'bar',
            'array' => [
                'foo' => 'bar',
            ],
        ];

        $values_to_remove = [
            'array'       => [
                'empty_value' => '',
                'null_value'  => null,
                'empty_array' => [],
            ],
            'empty_value' => '',
            'null_value'  => null,
            'empty_array' => [],
        ];

        $filtered_payload = self::callMethod(
            $this->firebase_client,
            'filterPayload',
            [\array_merge_recursive($unfiltered_payload, $values_to_remove)]
        );

        static::assertEquals($unfiltered_payload, $filtered_payload);
    }

    /**
     * @covers ::__construct()
     *
     * @throws InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \ReflectionException
     */
    public function testConstructor()
    {
        $http_client = new Client;
        $endpoint = 'test';
        $client = new FcmClient($http_client, $endpoint);

        static::assertEquals($endpoint, static::getProperty($client, 'endpoint'));
        static::assertEquals($http_client, static::getProperty($client, 'http_client'));
    }
}
