<?php
namespace Mozart\Library\Event\Exception;

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
 * Class ErrorCallException
 *
 * @author Faizal Pribadi <faizal_pribadi@aol.com>
 */
class ErrorCallException extends \BadMethodCallException
{
    /**
     * @return ErrorCallException
     *
     * @api
     */
    public static function errorRemoveListener()
    {
        return new self(
            'Whoa, you cannot removed the unmodified listener'
        );
    }

    /**
     * @return ErrorCallException
     *
     * @api
     */
    public static function errorShortListener()
    {
        return new self(
            'Whoa, you cannot shorted the listener'
        );
    }

    /**
     * @return ErrorCallException
     *
     * @api
     */
    public static function errorAddListener()
    {
        return new self(
            'Whoa, you cannot tried to add the new listener'
        );
    }
}
