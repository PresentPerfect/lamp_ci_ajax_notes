<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("America/Los_Angeles");

class note_model extends CI_Model
{
	public function add_post($new_post)
	{
		$query = "INSERT INTO posts(description, created_at, updated_at) VALUES(?,?,?)";
		return $this->db->query($query,array($new_post['description'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s')));
	}

	public function all_notes()
	{
		$query = "SELECT * FROM posts";
		return $this->db->query($query)->result_array();
	}

	public function edit($data)
	{
		$query = "UPDATE posts SET description=?,updated_at=? WHERE id=?";
		$values= array($data['description'],date('Y-m-d H:i:s'),$data['id']);
		return $this->db->query($query,$values);
	}

	public function delete($data)
	{
		$query = "DELETE FROM posts WHERE id=?";
		$values = array($data['id']);
		return $this->db->query($query,$values);
	}
}

?>