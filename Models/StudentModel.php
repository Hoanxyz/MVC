<?php
namespace Models;

use Core\Model;

class StudentModel extends Model
{
	public $name;
	public $age;
	public $created_at;
	public $updated_at;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setAge($age)
	{
		$this->age = $age;
	}

	public function getAge()
	{
		return $this->age;
	}
	public function setCreated_at($created_at)
	{
		$this->created_at = $created_at;
	}

	public function getCreated_at()
	{
		return $this->created_at;
	}

		public function setUpdated_at($updated_at)
	{
		$this->updated_at = $updated_at;
	}

	public function getUpdated_at()
	{
		return $this->updated_at;
	}
}