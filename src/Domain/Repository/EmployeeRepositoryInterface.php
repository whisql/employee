<?php


namespace App\Domain\Repository;


use App\Domain\Employee;

interface EmployeeRepositoryInterface
{
    public function find($id);

    public function add(Employee $employee):bool;

    public function update(Employee $employee):bool;

    public function remove(Employee $employee):bool;
}