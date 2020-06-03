<?php
namespace Core;

use Core\ResourceModelInterface;
use Core\Model;
use Config\Database;

class ResourceModel implements ResourceModelInterface
{
	private $table = null;
	private $id = null;
	private $model = null;

	public function _init($table, $id, $model)
	{
		$this->table = $table;
		$this->id = $id;
		$this->model = $model;
	}

	public function showAllTasks()
    {
        $sql = "SELECT * FROM " . $this->table;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

	public function create()
	{
		$model = $this->model->getProperties();

		$sql = "INSERT INTO " . $this->table;
        $sql .= " (".implode(", ", array_keys($model)).")";
        $sql .= " VALUES (:".implode(", :", array_keys($model)).") ";
        // var_dump($sql);
        // die();
        $result = Database::getBdd()->prepare($sql);
        
        $result = $result->execute($model);
        return $result;
	}

	public function showTask($id)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        // var_dump($req->fetch());
        return $req->fetch();
	}

	public function edit($id)
    {
    	$model = $this->model->getProperties();
    	unset($model['created_at']);
    	// var_dump($model);
    	// die();

        $sql = "UPDATE $this->table SET ";
        foreach ($model as $key=>$value) {
            $sql .= "$key = :$key,";
        }
        $sql = rtrim($sql, ",");
        $sql .= " WHERE $this->id = $id";
        // var_dump($sql);
        // die();
        
        $req = Database::getBdd()->prepare($sql);
        
        return $req->execute($model);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = ' . $this->id = $id;
        $req = Database::getBdd()->prepare($sql);
        // var_dump($sql);
        // die();
        return $req->execute();
    }
}