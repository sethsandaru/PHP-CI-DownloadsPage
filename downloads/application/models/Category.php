<?php
/**
 * Created by PhpStorm.
 * User: sethsandaru
 * Date: 1/18/18
 * Time: 2:45 PM
 */

class Category extends CI_Model
{
	private $tableName = "Categories";

	public $name;
	public $position;

	/*
	 * Get all Categories
	 */
	public function GetAll()
	{
		$qr = $this->db->order_by('position', 'ASC')->get($this->tableName);
		return $qr->result();
	}

	/*
	 * Get single
	 */
	public function GetByID($id)
	{
		$this->db->select("*");
		$this->db->from($this->tableName);
		$this->db->where("id", $id);
		$query = $this->db->get();

		return $query->row();
	}

	/*
	 * Add
	 */
	public function Add($name, $position)
	{
		$this->name = $name;
		$this->position = $position;

		$this->db->insert($this->tableName, $this);
	}

	/*
	 * Edit
	 */
	public function Edit($id, $name, $position)
	{
		$this->name = $name;
		$this->position = $position;

		$this->db->update($this->tableName, $this, array('id' => $id));
	}

	/*
	 * Delete
	 */
	public function Delete($id)
	{
		$this->db->delete($this->tableName, array('id' => $id));
	}
}
