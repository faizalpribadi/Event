<?php
namespace Mozart\Library\Event\examples;

use Mozart\Library\Event\Event;
use Mozart\Library\Event\Subscriber\SubscriberInterface;

final class StoreEvent
{
    const STORE_EVENT = 'store.event';
}

class StoreSubscriberEvent implements SubscriberInterface
{

    public function getSubscriberEvents()
    {
        return array(
            'onStoreSomething'
        );
    }

    public function onStoreSomething(Event $event)
    {
        return $event->setEvent(StoreEvent::STORE_EVENT);
    }
}
