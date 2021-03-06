<?php


namespace App\Constraint;


class NotBlank implements ConstraintInterface
{
    private $is_valid = true;
    private $error_message;

    public function __construct(string $message = null)
    {
        if(null !== $message) {
            $this->error_message = $message;
            return;
        }

        $this->error_message = sprintf('Empty value');
    }


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
        return $this->error_message;
    }

}