<?php

namespace AvtoDev\FirebaseCloudMessaging\Test\Receivers;

use AvtoDev\FirebaseCloudMessaging\Test\AbstractTestCase;
use AvtoDev\FirebaseCloudMessaging\Receivers\FcmNotificationReceiverInterface;

abstract class AbstractReceiverTest extends AbstractTestCase
{
    protected $target_name;

    protected $target_value;

    /**
     * @covers ::__construct
     *
     * @throws \ReflectionException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testGetConstruct()
    {
        static::assertEquals($this->target_value, self::getProperty($this->getReceiver(), $this->target_name));
    }

    /**
     * @covers ::getTarget()
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testGetTargetArray()
    {
        static::assertEquals([$this->target_name => $this->target_value], $this->getReceiver()->getTarget());
    }

    /**
     * @return FcmNotificationReceiverInterface
     */
    abstract protected function getReceiver();
}
