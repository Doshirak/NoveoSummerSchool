<?php

require_once('iDbConnectable.php');

class Row 
{
	public $id;
	public $login;
	public $password;

	public function __construct($id, $login, $password)
	{
		$this->id      = $id;
		$this->login     = $login;
		$this->password  = $password; 
	}
} 

class UserRow implements iDbConnectable
{
	private $row; 
	private $table;

	private $get;
	private $create;
	private $update;

	public function __construct(PDO &$table, $attributes = array())
	{
		$this->table = $table;
		$this->row = new Row(null, $attributes[0], $attributes[1]);

		$sql = 'SELECT * FROM users WHERE id=:userId';
		$this->get = $table->prepare($sql);
		$sql = 'INSERT INTO users (login, password) VALUES (:login, :password)';
		$this->create = $table->prepare($sql);
		$sql = 'UPDATE users SET login=:login, password=:password WHERE id=:userId';
		$this->update = $table->prepare($sql);
	}

    public function findByPk($pk)
    {
		$this->get->execute(array(':userId' => $pk));
    	$array = $this->get->fetch();
    	if ($array != FALSE)
	    {
	    	$this->row->id = $array['id'];
	    	$this->row->login = $array['login'];
	    	$this->row->password = $array['password'];
	    }
	    else
	    {
	    	echo 'There is no such id'.PHP_EOL;
	    	return null;
	    }    	
	    return $this;
    }

    public function save()
    {
    	if ($this->row->id != null)
	    {
	    	$this->update->execute(array(
		    		':userId' => $this->row->id,
		    		':login' => $this->row->login,
		    		':password' => $this->row->password));
	    	$array = $this->update->fetch();
	    	var_dump($array);
	    }
	    else
	    {
	    	$row = &$this->row;
	    	$this->create->execute(array(
	    		':login' => $row->login,
	    		':password' => $row->password));
	    	$row->id = $this->table->lastInsertId(); 
	    }    	
	    return $this;
    }

    public function where($attribute, $value)
    {

    }

    public function setLogin ($login)
    {
    	$this->row->login = $login;
    }

    public function setPassword ($password)
    {
    	$this->row->password = $password;
    }
}