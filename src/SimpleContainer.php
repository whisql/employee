<?php


namespace App;


class SimpleContainer implements ContainerInterface
{
    public function make($class)
    {
        return new $class;
    }
}