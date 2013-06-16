
Master: [![Build Status](https://travis-ci.org/FaizalPribadi/Event.png?branch=master)](https://travis-ci.org/FaizalPribadi/Event)

# Mozart Event Dispatcher Library

_This event library from Mozart Small MVC Framework implementation from [Observer Pattern](http://en.wikipedia.org/wiki/Observer_pattern)_

Composer
========
```php
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar install

//optional create alias composer
$ ln -s composer.phar /usr/bin/composer
$ composer install
$ composer install --dev 	// dev-master
$ composer require mozart/event-dispatcher	// next typing "dev-master"
```

Initialize Class Component
==========================

```php
<?php
require 'vendor/autoload.php'   // if youre install this library with composer
use Mozart\Library\Event\Event;
use Mozart\Library\Event\EventDispatcher;
use Mozart\Library\Event\ObjectEvent;
use Mozart\Library\Event\Listener\CustomListener;
```

Custom Event Listener
=====================

Optional, custom listener to create default listener name on event

| **Constant**              |   **Result**    |
|---------------------------|-----------------|
| EVENT_SUBSCRIBER          | event.subsriber |
| EVENT_NEWS                | event.news      |
| EVENT_AUTHOR              | event.author    |
| EVENT_DATE                | event.date      |


Usage
=====

-. Event With Array Argument

```php
<?php

/**
 * Example Class ListenerOne { Array Argument }
 */
class ListenerOne extends CustomListener
{
    public function emailSubscriber(Event $event)
    {
        $event->setEvent(CustomListener::EVENT_SUBSCRIBER);
        echo $event->getEvent();
    }
}

$dispatcher = new EventDispatcher();

/**
 * Dispatch the event with Array Event Argument
 */
$listenerOne = new ListenerOne();
$dispatcher->addListener('event.email.subscriber', array($listenerOne, 'emailSubscriber'));
$dispatcher->dispatch('event.email.subscriber');
```

-. Event With Closure

```php
<?php
/**
 * Example Class ListenerTwo
 */
class ListenerTwo extends CustomListener
{
    public function newsEvent(Event $event)
    {
        $event->setEvent(CustomListener::EVENT_NEWS);
        echo $event->getEvent();
    }
}

/**
 * Dispatch the event with Closure Event Argument
 */
$dispatcher->addListener('news.event', function() {
        $listenerTwo = new ListenerTwo();
        echo $listenerTwo->newsEvent(new Event());
    });
$dispatcher->dispatch('news.event');
```

-.Object Event Create Custom Definition Event From Specific Object

```php
<?php
/**
 * Email Subscriber Listener
 */
class EmailSubscriberListener
{
    public function sendDelivery(ObjectEvent $event)
    {
        if (isset($event['name']) && $event['name'] === 'email.subscriber') {
            return $event['name'];
        }

        $event['send'];
    }
}
$objectEvent = new ObjectEvent(
    $subject = null, array(
        'name'  => 'email.subsciber',
        'send'  => array(
            'list'  => array(
                'faizal_pribadi@aol.com',
                'nathan_wahyudi@arcacorp.com'
            )
        )
    )
);
$dispatcher->dispatch('email.subscriber', $objectEvent);
foreach ($objectEvent['send'] as $emails => $email) {
    foreach ($email as $listEmail) {
        echo $listEmail;
    }
}
```

PHPUnit Test Suite 
==================

```php
$ cp phpunit.xml.dist phpunit.xml
$ phpunit
````
