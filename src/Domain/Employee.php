<?php


namespace App\Domain;


class Employee
{
    private $id;

    private $first_name;

    private $second_name;

    private $patronymic;

    private $phones;

    private $address;

    private $statuses;

    private $date_created;

    private $date_modified;

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'first_name' => $this->getFirstName(),
            'second_name' => $this->getSecondName(),
            'patronymic' => $this->getPatronymic(),
            'phones' => $this->phonesToArray(),
            'address' => $this->addressToArray(),
            'statuses' => $this->statusesToArray(),
            'date_created' => $this->getDateCreated(),
            'date_modified' => $this->getDateModified()
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->first_name = $name;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->second_name;
    }

    /**
     * @param mixed $second_name
     */
    public function setSecondName($second_name)
    {
        $this->second_name = $second_name;
    }

    /**
     * @return mixed
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @param mixed $patronymic
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    /**
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }

    /**
     * @param mixed $date_modified
     */
    public function setDateModified($date_modified)
    {
        $this->date_modified = $date_modified;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param mixed $phones
     */
    public function setPhones($phones): void
    {
        $this->phones = $phones;
    }

    /**
     * @return mixed
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * @param mixed $statuses
     */
    public function setStatuses($statuses): void
    {
        $this->statuses = $statuses;
    }

    private function phonesToArray()
    {
        $arr = [];

        foreach ($this->phones as $phone) {
            $arr[] = $phone->toArray();
        }

        return $arr;
    }

    private function addressToArray()
    {
        if(!$this->address instanceof Address) return [];

        return $this->address->toArray();
    }

    private function statusesToArray(){
        $arr = [];

        foreach ($this->statuses as $status){
            $arr[] = $status->getState();
        }

        return $arr;
    }
}