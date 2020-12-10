<?php


namespace App\Constraint;


class NotBlank implements ConstraintInterface
{
    private $is_valid = true;

    public function validate($value)
    {
        if(empty($value)) $this->is_valid = false;
    }

    public function isValid(): bool
    {
        return $this->is_valid;
    }

    public function getErrorMessage()
    {
        return 'Empty value';
    }

}