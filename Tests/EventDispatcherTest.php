<?php
namespace Mozart\Library\Event\Tests;

/*
 * This file is a part of Mozart PHP Small MVC Framework
 *
 * (c) Faizal Pribadi <faizal_pribadi@aol.com>
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * file that was distributed with this source code.
 */

use Mozart\Library\Event\Event;
use Mozart\Library\Event\EventDispatcher;


class EventDispatcherTest extends \PHPUnit_Framework_TestCase
{
    const testEvent = 'test.event';

    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * @var @TestEventListener
     */
    protected $listener;

    public function setUp()
    {
        if (!class_exists('Mozart\Library\Event\EventDispatcher')) {
            $this->markTestSkipped('The Class "EventDispatcher" Not Found');
        }

        $this->eventDispatcher = new EventDispatcher();
        $this->listener = new TestEventListener();
    }

    public function testListener()
    {
        $this->assertFalse($this->eventDispatcher->hasListener(self::testEvent));
    }

    public function testAddListener()
    {
        $this->eventDispatcher->addListener('test.event', array($this->listener, 'testEvent'), 10);
        $this->eventDispatcher->dispatch('test.event');
        $this->assertTrue($this->listener->invokedTest);
    }
}

class TestEventListener
{
    public $invokedTest = false;

    public function testEvent(Event $event)
    {
        $this->invokedTest = true;

        $event->getEvent();
        $event->stopPropagation();
    }
}