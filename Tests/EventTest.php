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

class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Event
     */
    protected $event;

    public function setUp()
    {
        if (!class_exists('Mozart\Library\Event\Event')) {
            $this->markTestSkipped('Class "Event" Not Found');
        }

        $this->event = new Event();
    }

    public function testStopPropagation()
    {
        $this->assertTrue($this->event->stopPropagation());
    }

    public function testHasStoppedPropagation()
    {
        $this->assertFalse($this->event->hasStoppedPropagation());
    }

    public function testSetEvent()
    {
        $this->event->setEvent('event');
        $this->assertEquals('event', $this->event->getEvent());
    }
}
