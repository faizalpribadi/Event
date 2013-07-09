<?php
namespace Mozart\Library\Event\Subscriber;

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
 * Abstract Class Subscriber
 *
 * @author  Faizal Pribadi <faizal_pribadi@aol.com>
 */
abstract class Subscriber
{
    /**
     * Added subscriber event from event listener configuration
     *
     * @param SubscriberInterface $subscriber
     *
     * @return mixed
     */
    abstract public function addSubscriber(SubscriberInterface $subscriber);

    /**
     * If notified listener from event remove the subscriber event
     *
     * @param SubscriberInterface $subscriber
     *
     * @return mixed
     */
    abstract public function removeSubscriber(SubscriberInterface $subscriber);
}
