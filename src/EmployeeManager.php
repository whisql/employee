<?php


namespace App;

use App\Command\CreateEmployeeCommand;
use App\Command\RemoveEmployeeCommand;
use App\CommandBus\CommandBusInterface;
use App\Domain\Employee;
use App\Domain\Repository\EmployeeRepositoryInterface;

class EmployeeManager implements SubscriberInterface
{
    /**
     * @var EmployeeRepositoryInterface
     */
    private $employeeRepository;
    /**
     * @var CommandBusInterface
     */
    private $commandBus;
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(
        EmployeeRepositoryInterface $employeeRepository,
        CommandBusInterface $commandBus,
        EventDispatcherInterface $eventDispatcher
    )
    {
        $this->employeeRepository = $employeeRepository;
        $this->commandBus = $commandBus;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function createEmployee(
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
        $command = new CreateEmployeeCommand(
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
        );

        $employee = $this->commandBus->execute($command);

        if(!$employee instanceof Employee){
            throw new \Exception('CommandHandler return');
        }

        if(!$this->employeeRepository->add($employee)){
            throw new \Exception('написать');
        }
        $data = $employee->toArray();

        $this->eventDispatcher->trigger('employee:create',$data);

        return $data;
    }

    /**
     * @param $id
     * @return false
     */
    public function removeEmployee($id)
    {
        $command = new RemoveEmployeeCommand($id);

        $employee_id = $this->commandBus->execute($command);

        $employee = $this->employeeRepository->find($employee_id);

        if(!$employee) return false;

        $result = $this->employeeRepository->remove($employee);

        if(!$result) {
            throw new \Exception('Ошибка при удалении');
        }

        $this->eventDispatcher->trigger('employee:remove',$employee_id);
    }


    public function update(string $event, $data = null)
    {
        if($event !== 'validator:errors') return;

        throw new \Exception(sprintf('Validation exception. Data: %s',json_encode($data)));
    }
}