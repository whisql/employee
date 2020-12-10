<?php


namespace App;


interface EventDispatcherInterface
{
    public function attach(SubscriberInterface $subscriber, string $event = "*");

    public function detach(SubscriberInterface $subscriber, string $event = "*");

    public function trigger(string $event, $data = null);
}