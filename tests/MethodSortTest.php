<?php

class MethodSortTest extends \Codeception\Test\Unit
{

	protected function _before()
	{

	}

	protected function _after()
	{
	}

	public function testSorting()
	{
	$method_sort = new Honeycomb\MethodSort();
	$objects     = [
		'ms' => new Person('Matthew', 'Sahagian'),
		'mj' => new Person('Matthew', 'Jones'),
		'bt' => new Person('Brian', 'Tam')
	];

	$method_sort->setOrder([
		'getFirstName' => 'asc',
		'getLastName'  => 'asc'
	]);

	$this->assertEquals(uasort($objects, $method_sort), TRUE);
	$this->assertEquals(array_keys($objects), ['bt', 'mj', 'ms']);

	$method_sort->setOrder([
		'getFirstName' => 'asc',
		'getLastName'  => 'desc'
	]);

	$this->assertEquals(uasort($objects, $method_sort), TRUE);
	$this->assertEquals(array_keys($objects), ['bt', 'ms', 'mj']);

	$method_sort->setOrder([
		'getFirstName' => 'desc',
		'getLastName'  => 'desc'
	]);

	$this->assertEquals(uasort($objects, $method_sort), TRUE);
	$this->assertEquals(array_keys($objects), ['ms', 'mj', 'bt']);
	}
}


class Person {
	public function __construct($firstname, $lastname) {
		$this->firstname = $firstname;
		$this->lastname  = $lastname;
	}

	public function getFirstName()
	{
		return $this->firstname;
	}

	public function getLastName()
	{
		return $this->lastname;
	}
}
