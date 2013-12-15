<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>assignment 3 D.Alcorn</title>
    </head>
    <body>
       <?php
class Address {
    private $street;
    private $city;
    private $state;

    function __construct($s, $c, $st) {
        $this->street = $s;
        $this->city = $c;
        $this->state = $st;
    }
    function setCity($c) {
        $this->city = $c;
    }
    function getCity() {
        return $this->city;
    }
    function setState($s) {
        $this->state = $s;
    }
    function getState() {
        return $this->state;
    }
    function setStreet($s) {
        $this->street = $s;
    }
    function getStreet() {
        return $this->street;
    }
}
class Student {
    private $name;
    private $age;
    private $address;

    function __construct($n, $a, $s, $c, $st) {
        $this->name = $n;
        $this->age = $a;
        $this->address = new Address($s, $c, $st);
    }

    function getName() {
        return ucwords($this->name);
    }

    function getAge() {
        return $this->age;
    }

    function setName($n) {
        $this->name = $n;
    }

    function setAge($a) {
        $this->age = $a;
    }

    function __set($name, $value) {
        $set = "set".ucfirst($name);
        $this->$set($value);
    }

    function __get($name) {
        $get = "get".ucfirst($name);
        return $this->$get();
    }

    function __call( $method, $parameters) {
          if (is_callable(array($this->address, $method))) {
            return call_user_func_array(
                    array($this->address, $method), $parameters);
          }
    }

}
$s = new Student('john smith', 50, '100 main street', 'Sunnyvale', 'CA');
echo $s->name . '<br/>';
echo "\n";
echo $s->age .'<br/>';
echo "\n";
echo $s->street . ", " . $s->city . ", " . $s->state ;
echo "\n";
$s->street = "50 second street";
$s->city = "Palo Alto" ;
echo '<br/>';
echo "The address has been updated:\n";
echo '<br/>';
echo $s->street . ", " . $s->city . ", " . $s->state ;
?>

    </body>
</html>
