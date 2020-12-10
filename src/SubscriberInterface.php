<?php


namespace App;


interface SubscriberInterface
{
    public function update(string $event, $data = null);
}