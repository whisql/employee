<?php


namespace App\Command;

class CreateEmployeeCommand
{
    private $first_name;
    private $second_name;
    private $patronymic;
    private $country;
    private $city;
    private $street;
    private $house;
    private $phone_number;
    private $phone_code;
    private $status;

    public function __construct(
        $first_name,
        $second_name,
        $patronymic,
        $country,
        $city,
        $street,
        $house,
        $phone_number,
        $phone_code,
        $status
    )
    {
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->patronymic = $patronymic;
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->house = $house;
        $this->phone_number = $phone_number;
        $this->phone_code = $phone_code;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->second_name;
    }

    /**
     * @return mixed|null
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getPhoneCode()
    {
        return $this->phone_code;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @return mixed
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
}