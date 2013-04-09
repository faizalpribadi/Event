<?php
namespace Mozart\Library\Event\Factory;

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
 * Class    ObjectFactoryEvent
 *
 * @author  Faizal Pribadi <faizal_pribadi@aol.com>
 */
class ObjectFactoryEvent implements ArrayAccess
{
    /**
     * @var null
     * @var array|null
     * @var array
     */
    private $subject;
    private $definition;
    private $parameters = array();

    /**
     * Constructor
     *
     * @param null  $subject
     * @param array $definition
     */
    public function __construct($subject = null, array $definition = array())
    {
        $this->subject = $subject;
        $this->definition = $definition;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        $this->subject = null;
        $this->definition = null;
    }

    /**
     * Set the definition of object event
     *
     * @param  string $key
     * @param  string $value
     * @param  null   $parameters
     * @return object ObjectFactoryEvent
     */
    public function setDefinition($key, $value, $parameters = null)
    {
        $this->definition[$key][$parameters] = $value;

        return $this;
    }

    /**
     * Get the object event definition
     *
     * @param  string                    $key
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getDefinition($key)
    {
        if ($this->setParameters($key)) {
            return $this->parameters[$key];
        }

        throw new \InvalidArgumentException(
            sprintf('Wrong parameters event definition on key: "%s"', $key)
        );
    }

    /**
     * Set the parameters of object event
     *
     * @param  array              $parameters
     * @return ObjectFactoryEvent
     */
    public function setParameters(array $parameters = array())
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * If exist the definition object event return array
     *
     * @param  string|array $key
     * @return bool
     */
    public function hasParameter($key)
    {
        return array_key_exists($key, $this->parameters);
    }

    /**
     * Get the subject of event if not empty for subject
     *
     * @return null
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Offset Get implementation from \ArrayAccess::offsetGet
     *
     * @param  mixed $key
     * @return mixed
     *
     * @see \ArrayAccess::offsetGet
     *
     * @api
     */
    public function offsetGet($key)
    {
        return $this->getDefinition($key);
    }

    /**
     * Set the offset implementation from \ArrayAccess::offsetSet
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @see \ArrayAccess::offsetSet
     *
     * @api
     */
    public function offsetSet($key, $value)
    {
        $this->setDefinition($key, $value);
    }

    /**
     * Unset the offset
     *
     * @param mixed $key
     *
     * @see \ArrayAccess::offsetUnset
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
     * If parameters already exist return the parameters definition on array
     *
     * @param  mixed $key
     * @return bool
     *
     * @see \ArrayAccess::offsetExists
     *
     * @api
     */
    public function offsetExists($key)
    {
        return $this->hasParameter($key);
    }

    /**
     * Return the object on array
     *
     * @return \ArrayIterator
     */
    public function getObjectFactoryEvent()
    {
        return new ArrayIterator($this->definition);
    }
}
