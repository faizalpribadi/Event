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

use \ArrayAccess;
use \ArrayIterator;

/**
 * Class    ObjectEvent.php
 *
 * @author Faizal Pribadi <faizal_pribadi@aol.com>
 * @author Nathan Wahyudi <nathan@arcacorp.com>
 */
class ObjectEvent extends Event implements ArrayAccess
{
    /**
     * @var null
     */
    private $subject;

    /**
     * @var array
     */
    private $parameters;

    /**
     * Constructor
     *
     * Create the subject and parameters about definition object event
     *
     * @param null  $subject
     * @param array $parameters
     */
    public function __construct($subject = null, array $parameters = array())
    {
        $this->subject = $subject;
        $this->parameters = $parameters;
    }

    /**
     * Set the parameter object event
     *
     * @param string|array $key
     * @param string|array $value
     *
     * @return ObjectEvent
     */
    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    /**
     * Get the parameter of object event
     *
     * @param  string|array $key
     * @return string|array mixed
     *
     * @throws \InvalidArgumentException
     */
    public function getParameter($key)
    {
        if ($this->hasParameter($key)) {
            return $this->parameters[$key];
        }

        throw new \InvalidArgumentException(
            sprintf('Wrong parameter key "%s" , invalid returned the key', $key)
        );
    }

    /**
     * If already key parameter object event exist
     *
     * @param string|array $key
     *
     * @return bool
     */
    public function hasParameter($key)
    {
        return array_key_exists($key, $this->parameters);
    }

    /**
     * Set the partial object event on array arguments
     *
     * @param array $parameters
     *
     * @return ObjectEvent
     */
    public function setParameters(array $parameters = array())
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Get the parameters object event on array
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @see     \ArrayAccess::offsetSet
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @api
     */
    public function offsetSet($key, $value)
    {
        $this->setParameter($key, $value);
    }

    /**
     * @see     \ArrayAccess::offsetGet
     *
     * @param  mixed              $key
     * @return array|mixed|string
     *
     * @api
     */
    public function offsetGet($key)
    {
        return $this->getParameter($key);
    }

    /**
     * @see     \ArrayAccess::offsetUnset
     *
     * @param mixed $key
     *
     * @api
     */
    public function offsetUnset($key)
    {
        if ($this->hasParameter($key)) {
            unset($this->parameters[$key]);
        }
    }

    /**
     * @see     \ArrayAccess::offsetExists
     *
     * @param  mixed $key
     * @return bool
     *
     * @api
     */
    public function offsetExists($key)
    {
        return $this->hasParameter($key);
    }

    /**
     * @return object \ArrayIterator
     */
    public function getObjectEvent()
    {
        return new ArrayIterator($this->parameters);
    }
}
