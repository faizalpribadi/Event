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

use Mozart\Library\Event\Subscriber\SubscriberInterface;
use Mozart\Library\Event\WrongArgumentException;
use Mozart\Library\Event\Subscriber\Subscriber;

/**
 * Class EventDispatcher
 *
 * Dispatch The event listener from the configuration
 *
 * @author  Faizal Pribadi <faizal_pribadi@aol.com>
 */
class EventDispatcher extends Subscriber implements EventDispatcherInterface
{
    /**
     * @var array
     */
    protected $dispatcher = array();

    /**
     * @see EventDispatcherInterface::addListener
     */
    public function addListener($eventName, $callback, $priority = EventDispatcherInterface::SCOPE_PROTOTYPE)
    {
        if (!is_callable($callback) && !is_array($callback)) {
            throw new WrongArgumentException("Invalid behaviour callback argument");
        }

        $this->dispatcher[$eventName][$priority][] = $callback;
    }

    /**
     * @see EventDispatcherInterface::getListener
     */
    public function getListener($eventName)
    {
        return (Boolean) count($this->dispatcher[$eventName]);
    }

    /**
     * @see EventDispatcherInterface::hasListener
     */
    public function hasListener($eventName)
    {
        return (array) isset($this->dispatcher[$eventName]);
    }

    /**
     * @see EventDispatcherInterface::dispatch
     */
    public function dispatch($eventName, Event $event = null)
    {
        if (null === $event) {
            $event = new Event();
        }

        if (!isset($this->dispatcher[$eventName])) {
            return $event;
        }

        foreach ($this->shortListener($eventName) as $listener) {
            call_user_func($listener, $event);

            if ($event->hasStoppedPropagation()) {
                break;
            }
        }

        return $event;
    }

    /**
     * @see EventDispatcherInteface::shortListener
     */
    public function shortListener($eventName)
    {
        foreach ($this->dispatcher[$eventName] as $event) {
            return (array) $event;
        }
    }

    /**
     * @see EventDispatcherInterface::removeListener
     */
    public function removeListener($eventName)
    {
        if (isset($this->dispatcher[$eventName])) {
            unset($this->dispatcher[$eventName]);
        }
    }

    /**
     * Add and store event for subscriber all other events
     *
     * @param SubscriberInterface $subscriber
     *
     * @throws \Exception
     */
    public function addSubscriber(SubscriberInterface $subscriber)
    {
        foreach ($subscriber->getSubscriberEvents() as $subscriberEvent => $params) {
            if (!is_string($params)) {
                throw new \Exception(
                    sprintf('Subscribe the event "%s" must be string', $params)
                );
            }
            $this->addListener($subscriberEvent, array($subscriber, $params));
        }
    }

    /**
     * Remove store event subscriber
     *
     * @param SubscriberInterface $subscriber
     */
    public function removeSubscriber(SubscriberInterface $subscriber)
    {
        if (is_array($subscriber->getSubscriberEvents())) {
            foreach ($subscriber->getSubscriberEvents() as $subscriberEvent => $params) {
                $this->removeListener($subscriberEvent, array($subscriber, $params));
            }
        }
    }
}
