<?php
namespace Mozart\Library\Event\examples;

use Mozart\Library\Event\Event;
use Mozart\Library\Event\Subscriber\SubscriberInterface;

class StoreSubscriberEvent
{
    protected $items = array();

    public function itemLists(array $items = array())
    {
        foreach ($items as $name => $item) {
            $this->items[$name] = $item;
        }

        return $this;
    }

    public function getItem($name)
    {
        return $this->items[$name];
    }
}

class StoreEvent extends Event
{
    private $product;

    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}

final class StoreEventName
{
    const STORE_EVENT = 'store.event';
}

class StoreSubscriber implements SubscriberInterface
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
            // example one
            'store' => array('onStore', 8),

            // example two
            StoreEventName::STORE_EVENT => 'onStore',

            //customize example
            'event.name' => array(
                array('method.listener.one'), array('method.listener.two')
            )
        );

    }

    public function onStore(StoreEvent $storeEvent)
    {
        $storeEvent->setProduct(new Product());
        $storeEvent->getProduct()->itemLists(array(
                'products' => 'Books'
            ))->getItem('products');

        $storeEvent->stopPropagation();

        return $storeEvent;
    }
}
