<?php


namespace App\Domain;


class Phone
{
    private $code;
    private $number;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    public function toArray()
    {
        return [
          'code' => $this->getCode(),
          'number' => $this->getNumber()
        ];
    }
}