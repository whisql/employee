<?php


namespace App\Command;


use App\Constraint\Integer;
use App\Constraint\NotBlank;

class RemoveEmployeeConstraint implements CommandConstraintInterface
{
    public function getConstraints(): array
    {
        return [
            'getEmployeeId' => [new NotBlank(), new Integer()]
        ];
    }

}