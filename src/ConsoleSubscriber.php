<?php


namespace App;


class ConsoleSubscriber implements SubscriberInterface
{
    public function update(string $event, $data = null)
    {
        print PHP_EOL.sprintf('Event: %s, Data: %s',$event,json_encode($data));
    }

}