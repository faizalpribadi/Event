<?php
namespace Mozart\Library\Event\examples;

use Mozart\Library\Event\Event;
use Mozart\Library\Event\Subscriber\SubscriberInterface;

class StoreSubscriberEvent
{
    public function render()
    {
        return 'shopping';
    }
}

class FilterStoreEvent extends Event
{
    protected $store;

    public function setStore(Store $store)
    {
        $this->store = $store;
    }

    public function getStore()
    {
        return $this->store;
    }
}

class StoreSubscriberEvent implements SubscriberInterface
{

    /**
     * Get all method on event configuration
     *
     * @return mixed
     *
     * @api
     */
    public function getSubscriberEvents()
    {
        // TODO: Implement getSubscriberEvents() method.
        return array(

            // subscribers
             'subscribers' => 'onStore',
             'event.all' => array('onStore')
        );
    }

    public function onStore(FilterStoreEvent $event)
    {

    }
}
