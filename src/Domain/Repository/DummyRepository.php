<?php


namespace App\Domain\Repository;


use App\Domain\Employee;

class DummyRepository implements EmployeeRepositoryInterface
{
    public function find($id)
    {
        return new Employee();
    }

    public function add(Employee $employee):bool
    {
        $employee->setId(rand(0,99));
        return true;
    }

    public function update(Employee $employee):bool
    {
        return true;
    }

    public function remove(Employee $employee):bool
    {
        return true;
    }

}