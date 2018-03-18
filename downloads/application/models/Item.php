<?php
/**
 * Created by PhpStorm.
 * User: sethsandaru
 * Date: 1/18/18
 * Time: 3:11 PM
 */

class Item extends CI_Model
{
	private $tableName = "Items";

	/*
	 * Properties
	 */
	public $title;
	public $content;
	public $category_id;
	public $image_url;
	public $download_url;
	public $created_date;
	public $created_id;
	public $modified_date;
	public $modified_id;

	/*
	 * Retrieve this with pagination
	 */
	public function Retrieve($offset, $limit, $category = null)
	{
		$this->db->select("*, ". $this->tableName . ".id as pid");

		$qr = $this->db->order_by($this->tableName .'.id', 'desc')->limit($limit, $offset);

		// joinning :D
		$this->db->join('Users', 'Users.id = created_id');
		$this->db->join('Categories', 'Categories.id = category_id');

		if ($category != null)
			$qr->where('category_id', $category);

		return $qr->get($this->tableName)->result();
	}

	/*
	 * Count all row
	 */
	public function totalRows($category = null)
	{
		$this->db->select('id');
		$this->db->from($this->tableName);

		if ($category != null)
			$this->db->where('category_id', $category);

		return $this->db->count_all_results();
	}

	/*
	 * Get By ID
	 */
	public function GetByID($id, $join = true)
	{
		$this->db->select("*");

		if ($join == true) {
			$this->db->select($this->tableName . ".id as pid");
			$this->db->join('Users', 'Users.id = created_id');
			$this->db->join('Categories', 'Categories.id = category_id');
		}

		$this->db->from($this->tableName);


		$this->db->where($this->tableName . ".id", $id);
		$query = $this->db->get();

		return $query->row();
	}

	/*
	 * Insert
	 */
	public function Insert($title, $content, $category_id, $download_url, $image_url, $byid)
	{
		$this->title = $title;
		$this->content = $content;
		$this->category_id = $category_id;
		$this->download_url = $download_url;
		$this->image_url = $image_url;
		$this->created_date = $this->modified_date = time();
		$this->created_id = $this->modified_id = $byid;

		$this->db->insert($this->tableName, $this);
	}

	/*
	 * Update
	 */
	public function Update($id, $item)
	{
		$this->db->update($this->tableName, $item, array('id' => $id));
	}

	/*
	 * Delete
	 */
	public function Delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tableName);
	}

}
