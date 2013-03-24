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
 * Interface EventInterface
 *
 * @author  Faizal Pribadi <faizal_pribadi@aol.com>
 */
interface EventInterface
{
    /**
     * Create and customizable event
     *
     * @param  string $eventName customize name of event
     * @return mixed
     *
     * @api
     */
    public function setEvent($eventName);

    /**
     * Get the customizable of event
     *
     * @return mixed
     *
     * @api
     */
    public function getEvent();

    /**
     * Set the propagation will be stopped
     *
     * @return mixed
     *
     * @api
     */
    public function stopPropagation();

    /**
     * Stopped propagation
     *
     * @return mixed
     *
     * @api
     */
    public function hasStoppedPropagation();
}
