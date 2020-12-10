<?php


namespace App\Command;


class RemoveEmployeeCommand
{
    private $employee_id;

    public function __construct($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

}