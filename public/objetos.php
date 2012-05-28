<?php

// CREAR UNA CLASE

class miClase
{
	//propiedades
	public $mipropiedad='esto es una propiedad';
	//Metodos
	public function mimetodo()
	{
		echo "hola mundo";
		return NULL;
	}
}
$miObjeto= new miClase();
$miObjeto -> miMetodo();
echo "<br/>";
echo $miObjeto ->mipropiedad;
$miObjeto -> mipropiedad= "otra cosa";
echo "<br/>";
echo $miObjeto -> mipropiedad;
echo "<br/>";

$miObjeto2= new miClase();
echo $miObjeto2 -> mipropiedad;
echo "<br/>";


class A
{
	function foo()
	{
		if (isset($this)) {
			echo '$this is defined ('; //this es una referencia al objeto, solo tiene sentido dentro de un objeto.
			echo get_class($this);
			echo ")\n";
		} else {
			echo "\$this is not defined.\n";
		}
	}
}
$objeto1= new A;
$objeto1 -> foo();
echo "<br/>";
echo "<br/>";


class SimpleClass
{
	public $pi= 3.1418;
	public $var6 = myConstant;
// 	public $var7 = self::pi;
	public $var8 = array(true, false);
	function displayVar2()
	{
		echo "Simple class \n";
		return;
	}
}
	$objeto2 = new SimpleClass();
	echo $objeto2 -> pi;
	echo "<br/>";


class ExtendClass extends SimpleClass
{
	// Redefine the parent method
	function displayVar()
	{
		echo "Extending class\n";
		parent::displayVar2();
	}
}
$extended = new ExtendClass();
$extended->displayVar();

$extended-> displayVar2();
echo "<br/>";
echo "<br/>";
class MyDestructableClass {
	function __construct() {
		print "In constructor\n";
		$this->name = "MyDestructableClass";
	}
	function __destruct() {
		print "Destroying " . $this->name . "\n";
	}
}
$obj = new MyDestructableClass();

echo "<br/>";
echo "<br/>";

class MyClass
{
	public $public = 'Public';
	protected $protected = 'Protected';
	private $private = 'Private';
	function printHello()
	{
		echo $this->public;
		echo $this->protected;
		echo $this->private;
	}
}

$obj = new MyClass();
// echo $obj-> private;
$obj-> printHello();
























?>


