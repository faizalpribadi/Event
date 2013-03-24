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
 * Interface EventDispatcherInterface
 *
 * @author  Faizal Pribadi <faizal_pribadi@aol.com>
 */
interface EventDispatcherInterface
{
    /**
     * Constant
     */
    const SCOPE_PROTOTYPE = -1;

    /**
     * Add the functionality event listener to setup parameters
     *
     * @param  string         $eventName create the name event listener
     * @param  callable|array $callback  parameter callback must be in array or callable arguments
     * @param  int            $priority  optionally
     * @return mixed
     *
     * @api
     */
    public function addListener($eventName, $callback, $priority = EventDispatcherInterface::SCOPE_PROTOTYPE);

    /**
     * Get the event listener from the function add listener
     *
     * @param  string $eventName
     * @return mixed
     *
     * @api
     */
    public function getListener($eventName);

    /**
     * Has authentication parameter of event listener
     *
     * @param  string $eventName
     * @return mixed
     *
     * @api
     */
    public function hasListener($eventName);

    /**
     * Dispatch event to show configuration from event listener
     *
     * @param  string $eventName
     * @param  Event  $event
     * @return mixed
     *
     * @api
     */
    public function dispatch($eventName, Event $event = null);

    /**
     * Short the event listener
     *
     * @param  string $eventName
     * @return mixed
     *
     * @api
     */
    public function shortListener($eventName);

    /**
     * Remove the configuration from event listener
     *
     * @param  string $eventName
     * @return mixed
     *
     * @api
     */
    public function removeListener($eventName);
}
