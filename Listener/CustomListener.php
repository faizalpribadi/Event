<?php
namespace Mozart\Library\Event\Listener;

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
 * Class CustomListener
 *
 * @author  Faizal Pribadi <faizal_pribadi@aol.com>
 */
class CustomListener
{
    /**
     * Constant
     */
    const EVENT_SUBSCRIBER  = 'event.subscriber';
    const EVENT_NEWS        = 'event.news';
    const EVENT_AUTHOR      = 'event.author';
    const EVENT_DATE        = 'event.date';

    /**
     * @var array
     */
    protected $listeners    = array(
        'subscriber'        => CustomListener::EVENT_SUBSCRIBER,
        'news'              => CustomListener::EVENT_NEWS,
        'author'            => CustomListener::EVENT_AUTHOR,
        'date'              => CustomListener::EVENT_DATE,
    );

    /**
     * @var null
     */
    protected $comparator = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        foreach ($this->listeners as $listener) {
            $this->comparator = $listener;
        }
    }

    /**
     * @return array|string
     */
    public function __toString()
    {
        return $this->comparator;
    }
}
