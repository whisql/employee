<?php


namespace App\Constraint;


class MinLength implements ConstraintInterface
{
    /**
     * @var int
     */
    private $min_length;

    private $error_message;

    private $is_valid = true;

    public function __construct(int $min_length, string $message = null)
    {
        $this->min_length = $min_length;

        if(null !== $message) {
            $this->error_message = $message;
            return;
        }

        $this->error_message = sprintf('Min line length - %s chars',$min_length);
    }

    public function validate($value)
    {
        if(mb_strlen($value) < $this->min_length) $this->is_valid = false;
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