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

use Mozart\Library\Event\EventDispatcher;
use Mozart\Library\Event\Listener\CustomListener;

class EventDispatcherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    public function setUp()
    {
        if (!class_exists('Mozart\Library\Event\EventDispatcher')) {
            $this->markTestSkipped('The Class "EventDispatcher" Not Found');
        }

        $this->eventDispatcher = new EventDispatcher();
    }

    public function testAddListener()
    {
        $this->assertTrue($this->eventDispatcher->hasListener(CustomListener::EVENT_AUTHOR));
        $this->assertTrue($this->eventDispatcher->hasListener(CustomListener::EVENT_DATE));
        $this->assertCount(1, $this->eventDispatcher->getListener(CustomListener::EVENT_AUTHOR));
        $this->assertCount(1, $this->eventDispatcher->getListener(CustomListener::EVENT_DATE));
    }
}
