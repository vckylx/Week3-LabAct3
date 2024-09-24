<?php
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year){
        $this->make = $make; 
        $this->model = $model; 
        $this->year = $year; 
    }

    final public function getDetails(){
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    public function describe(){
        return "This is a vehicle";
    }
}

class Car extends Vehicle{
    private $doors;

    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
    }

    public function describe() {
        return "This car has $this->doors doors.";
    }
}

interface ElectricVehicle {
    public function chargeBattery();
}

class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $doors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $doors);
        $this->batteryLevel = $batteryLevel;
    }

    public function chargeBattery() {
        $this->batteryLevel = 100;
        echo "Battery fully charged.\n";
    }

    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery.";
    }
}

final class Motorcycle extends Vehicle {
    public function describe() {
        return "This is a motorcycle.";
    }
}

$car = new Car("Lamborghini", "Huracan", 2017, 2);
echo $car->getDetails() . "\n";
echo $car->describe() . "\n" . "\n";

$motorcycle = new Motorcycle("Ducati", "Panigale V4 Red", 2024);
echo $motorcycle->getDetails() . "\n";
echo $motorcycle->describe() . "\n" ."\n";

$electricCar = new ElectricCar("Tesla", "Model 3", 2023, 4, 75);
echo $electricCar->getDetails() . "\n";
echo $electricCar->describe() . "\n";
$electricCar->chargeBattery();
echo $electricCar->describe() . "\n";
?>