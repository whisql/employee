<?php


namespace App;


class SimpleEventDispatcher implements EventDispatcherInterface
{
    private $subscribers = [];

    public function __construct()
    {
        $this->subscribers["*"] = [];
    }

    private function initEventGroup(string $event)
    {
        if (!isset($this->subscribers[$event])) {
            $this->subscribers[$event] = [];
        }
    }

    private function getEventSubscribers(string $event = "*")
    {
        $this->initEventGroup($event);
        $group = $this->subscribers[$event];
        $all = $this->subscribers["*"];

        return array_merge($group, $all);
    }

    public function attach(SubscriberInterface $subscriber, string $event = "*")
    {
        $this->initEventGroup($event);

        $this->subscribers[$event][] = $subscriber;
    }

    public function detach(SubscriberInterface $subscriber, string $event = "*")
    {
        foreach ($this->getEventSubscribers($event) as $key => $s) {
            if ($s === $subscriber) {
                unset($this->subscribers[$event][$key]);
            }
        }
    }

    public function trigger(string $event, $data = null)
    {
        foreach ($this->getEventSubscribers($event) as $subscriber) {
            $subscriber->update($event, $data);
        }
    }
}