<?php

/*
	The data model that handles all the storage,retrieval and logic
	Controllers call methods in this model, get results and pass them on to the views
*/

class bookmarks_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();		// Loads the database when the model is created
	}


/*
	Database query to fetch bookmarks.
	Default parameter is false, which fetches all bookmarks
	If parameter is supplied, it queries the database accordingly to fetch bookmarks with the search tag
*/

public function get_link($tag = FALSE)
{
	if ($tag === FALSE)
	{
		$query = $this->db->get('bookmarks');		// Fetch all bookmarks, no search parameter
		return $query->result_array();

	}
	
		$where = "bookmarks.tag LIKE '%".$tag."%'";		// Construct a query for the search tag. %tag% is used to ensure partial matching
		$query = $this->db->get_where('bookmarks',$where);	// Executes the query
		return $query->result_array();
}


/*
	Add an entry to the database. The fields are the URL itself, the tag, and the description
*/

public function add_link($link,$tag,$description)
	{
		if(empty($link))
		{
			return;
		}
		$data = array('link' => $link,'tag' => $tag,'description' => $description);
		$this->db->insert('bookmarks', $data); 
	}


}

