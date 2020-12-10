<?php


namespace App;


interface ContainerInterface
{
    public function make($class);
}