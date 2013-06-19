<?php
use Mozart\Library\Event\EventDispatcher;
use Mozart\Library\Event\Event;

/**
 * Create own your event name "custom"
 */
final class SendMailer
{
    /**
     * Const custom event name
     */
    const EVENT_SENDMAIL = 'event.sendmail';
}

/**
 * Extended the Mozart\Library\Event\Event
 * And create custom event configuration to render
 */
class SendMail extends Event
{
    /**
     * @var null
     */
    protected $mail;

    /**
     * @param $mail
     *
     * @return $this
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return from $this->setMail()
     */
    public function getMail()
    {
        return $this->mail;
    }
}

/**
 * Create the custom configuration event listener
 */
class SendMailListener
{
    /**
     * @param SendMail $sendMail
     *
     * @return mixed
     */
    public function onSend(SendMail $sendMail)
    {
        return $sendMail->setMail('this is mail content')->getMail();
    }
}

/**
 * Class SendMailEvent
 */
class SendMailEvent
{
    /**
     * @var Mozart\Library\Event\EventDispatcher
     */
    protected $dispatcher;

    /**
     * @param EventDispatcher $dispatcher
     */
    public function __construct(EventDispatcher $dispatcher = null)
    {
        if (null === $dispatcher) {
            $dispatcher = new EventDispatcher();
            $this->dispatcher = $dispatcher;
        }

        $listener = new SendMailListener();
        $listener->onSend(new SendMail());
        $this->dispatcher->addListener(SendMailer::EVENT_SENDMAIL, array($listener, 'onSend'));
    }

    /**
     * @return mixed|Event
     */
    public function send()
    {
        $event = new SendMail();

        return $this->dispatcher->dispatch(SendMailer::EVENT_SENDMAIL, $event);
    }
}