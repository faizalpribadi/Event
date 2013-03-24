<?php
namespace Mozart\Library\Event;

/*
 * This file is a part of Mozart PHP Small MVC Framework
 *
 * (c) Faizal Pribadi <faizal_pribadi@aol.com>
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * file that was distributed with this source code.
 */

/**
 * Event Class
 *
 * @author  Faizal Pribadi <faizal_pribadi@aol.com>
 */
class Event implements EventInterface
{
    /**
     * @var string
     */
    protected $event;

    /**
     * @var bool
     */
    protected $stopPropagation = false;

    /**
     * @see EventInterface::setEvent
     */
    public function setEvent($eventName)
    {
        $this->event = $eventName;
    }

    /**
     * @see EventInterface::getEvent
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @see EventInterface::stopPropagation
     */
    public function stopPropagation()
    {
        $this->stopPropagation = true;
    }

    /**
     * @see EventInterface::hasStoppedPropagation
     */
    public function hasStoppedPropagation()
    {
        return $this->stopPropagation;
    }
}
