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

use Mozart\Library\Event\Exception\ErrorCallException;

/**
 * Class InjectDispatcher
 *
 * @author Faizal Pribadi <faizal_pribadi@aol.com>
 */
class InjectDispatcher implements EventDispatcherInterface
{
    protected $dispatcher;

    /**
     * Constructor
     */
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function addListener($eventName, $callback, $priority = EventDispatcherInterface::SCOPE_PROTOTYPE)
    {
        throw ErrorCallException::errorAddListener();
    }

    /**
     * {@inheritdoc}
     */
    public function getListener($eventName)
    {
        return $this->dispatcher->getListener($eventName);
    }

    /**
     * {@inheritdoc}
     */
    public function hasListener($eventName)
    {
        return $this->dispatcher->hasListener($eventName);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch($eventName, Event $event = null)
    {
        return $this->dispatcher->dispatch($eventName, $event);
    }

    /**
     * {@inheritdoc}
     */
    public function shortListener($eventName)
    {
        throw ErrorCallException::errorShortListener();
    }

    /**
     * {@inheritdoc}
     */
    public function removeListener($eventName)
    {
        throw ErrorCallException::errorRemoveListener();
    }
}
