<?php
/**
 * Created by PhpStorm.
 * User: sethsandaru
 * Date: 1/21/18
 * Time: 3:37 PM
 */

class User extends CI_Model
{
	private $tableName = "Users";

	public $username;
	public $password;
	public $email;

	public function login($user, $pass)
	{
		$this->db->select('id');
		$this->db->from($this->tableName);
		$this->db->where('username', $user)->where('password', strtolower(md5($pass)));
		$data = $this->db->get();

		$user = $data->row();

		if ($user == null)
			return 0;
		else
			return $user->id;
	}

	public function GetByID($id)
	{
		$this->db->select("*, ". $this->tableName . ".id as pid,");
		$this->db->from($this->tableName);
		$this->db->where($this->tableName . ".id", $id);
		$query = $this->db->get();

		return $query->row();
	}
}
