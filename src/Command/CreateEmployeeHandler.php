<?php


namespace App\Command;


use App\Command\Exception\CommandClassException;
use App\Domain\Address;
use App\Domain\Employee;
use App\Domain\Phone;
use App\Domain\Status;

class CreateEmployeeHandler implements CommandHandlerInterface
{
    public function handle($command)
    {
        if(!$command instanceof CreateEmployeeCommand) {
            throw new CommandClassException('Command class must be instance of CreateEmployeeCommand');
        }

        $employee = new Employee();
        $address = new Address();
        $phone = new Phone();
        $status = new Status();

        $address->setCity($command->getCity());
        $address->setCountry($command->getCountry());
        $address->setStreet($command->getStreet());
        $address->setHouse($command->getHouse());

        $phone->setCode($command->getPhoneCode());
        $phone->setNumber($command->getPhoneNumber());

        $status->setState($command->getStatus());

        $employee->setName($command->getFirstName());
        $employee->setSecondName($command->getSecondName());
        $employee->setPatronymic($command->getPatronymic());
        $employee->setPhones([$phone]);
        $employee->setAddress($address);
        $employee->setStatuses([$status]);

        return $employee;
    }

}