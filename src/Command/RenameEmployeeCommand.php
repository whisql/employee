<?php


namespace App\Command;


class RenameEmployeeCommand
{
    private $employee_id;
    private $name;
    private $second_name;
    private $patronymic;

    public function __construct($employee_id,$name,$second_name,$patronymic)
    {
        $this->employee_id = $employee_id;
        $this->name = $name;
        $this->second_name = $second_name;
        $this->patronymic = $patronymic;
    }

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->second_name;
    }

    /**
     * @return mixed
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

}