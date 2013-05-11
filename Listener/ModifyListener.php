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
 * Class ModifyListener
 *
 * @author Faizal Pribadi <faizal_pribadi@aol.com>
 */
final class ModifyListener
{
    /**
     * Modify you're project event listener
     */
    const MODIFY_EVENT      = 'event.modify';

    /**
     * Custom you're project event listener
     */
    const CUSTOM_EVENT      = 'custom.event';

    /**
     * Basic priority event listener
     */
    const BASIC_EVENT       = 'basic.event';

    /**
     * Queue you're event listener
     */
    const QUEUE_EVENT       = 'queue.event';
}
