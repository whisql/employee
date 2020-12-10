<?php


namespace App\Command;


use App\Command\Exception\CommandClassException;
use App\Constraint\MinLength;
use App\Constraint\NotBlank;

class CreateEmployeeConstraint implements CommandConstraintInterface
{
    public function getConstraints():array
    {
        return [
            'getFirstName' => [new NotBlank(),new MinLength(2)],
            'getSecondName' => [new NotBlank()],
            'getPhoneCode' => [new NotBlank()]
        ];
    }

}