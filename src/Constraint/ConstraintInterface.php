<?php


namespace App\Constraint;


interface ConstraintInterface
{
    public function validate($value);

    public function isValid():bool;

    public function getErrorMessage();
}