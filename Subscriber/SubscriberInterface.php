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
 * Interface SubscriberInterface
 *
 * @author  Faizal Pribadi <faizal_pribadi@aol.com>
 */
interface SubscriberInterface
{
    /**
     * Get all method on event configuration
     *
     * @return mixed
     *
     * @api
     */
    public function getSubscriberEvents();
}
