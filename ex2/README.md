# Ex2

## A class
A class define propreties and method of a type of object
an object 'volvo' can be define by a class car
```php
// define a car
class Car 
{
    protected $color;
    protected $brand;
    
    public function __construtor($color, $brand)
    {
        $this->color = $color;
        $this->brand = $brand;
    }
    
    public function openPilotDoor() 
    {
        //action
    }
}
// create the volvo object
$volvo = new Car('blue', 'Volvo');
$volvo->openPilotDoor();


```
## An object
An object is an instance of class
```php
class Car
{

}
$car = new Car(); // this is an instance of the class Car
```
## A method
A method is part of a class and define action that instance of this class will be able to do
```php
class Car 
{
    protected $color;
    protected $brand;
    
    public function __construtor($color, $brand)
    {
        $this->color = $color;
        $this->brand = $brand;
    }
    
    public function openPilotDoor() // this is a method
    {
        //action
    }
}
```

## Class inheritance
it is when a child class inherit ( properties, method, ...) from a parent class
```php
class Vehicle 
{
    protected $color;
    protected $brand;
    
    public function __construtor($color, $brand)
    {
        $this->color = $color;
        $this->brand = $brand;
    }
    
    public function getColor() 
    {
        return $this->color;
    }
    
    public function getBrand() 
    {
        return $this->brand;
    }
}

// this class is a child of vehicle
// it can use what is define in the parent class if they are public or protected
class Car extends Vehicle
{    
    public function __construtor($color, $brand)
    {
        parent::__constructor($color, $brand;
    }
    
    public function openPilotDoor() 
    {
        //action
    }
}

$car = new Car('red', 'BMW');
echo 'My '.$car->getBrand(). ' is '. $car->getColor();
// here because car 'extends' vehicle methods from vehicle can be used
```

## Method overloading
overloading a method is to use the name of an existing method ( parent class ) and write a different code
note : by calling the method parent it is possible to keep the original functionality while adding some more  code
```php
class Write
{
    public function say()
    {
        echo 'Hello !!';
    }
}

class WriteMore extends Write
{
    public function say()
    {
        echo 'Hello everyone !!';
    }
}

class WriteSomeMore extends Write
{
    public function say()
    {
        parent::say();
        echo ' How are you ?';
    }
}
(new WriteMore())->say(); // 'Hello everyone !!'
(new WriteSomeMore())->say(); // 'Hello !! How are you ?'

```

## singleton
Singleton is a design pattern, used to limit the number of instance of class
the constructor will be private to avoid external instantiation.
in static there will be a method with the job of keeping track of instance of this class ( with the help of a static 
private property)
note : php method allowing to deplicate/create/... an instance will be put as private 
```php
class MyClass 
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): MyClass
    {
        if (!isset(self::$instance)) {
            self::$instance = new MyClass();
        }
        return self::$instance;
    }

    public function doSomething(): array
    {
        //something
    }

    protected function __clone()
    {
        throw new Exception("Cannot clone a singleton.");
    }

    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }
}
```
