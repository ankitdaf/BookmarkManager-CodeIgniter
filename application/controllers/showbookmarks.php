<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShowBookmarks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bookmarks_model');		// Load the bookmarks model
	}

/*
Index page loaded by default
This loads all the bookmarks
*/
	public function index()
	{
		$data['bookmarks'] = $this->bookmarks_model->get_link();	// Gets all the bookmarks since no parameter is supplied.This method is defined in models/bookmarks_model
		$data['title'] = 'Bookmarks List';		// Title to the page. This data along with the bookmarks variable is passed to the 'view'
		$this->load->view('templates/header', $data);	// Load the header. The header also contains the search bar
		$this->load->view('bookmarks/index', $data);	// Generate the main page from the data we got from the controller
		$this->load->view('templates/footer');			// Load the footer
	}

/*
	This method is used for implementing the search bar. 
	The form in the view "POST"s data to this method, which then calls the 'view' method in this same controller
	The view method does the rest of the work just like a normal page load
*/

	public function get_bookmarks()
	{
		$tag=$_POST['tag'];		// Get the tag
		$this->view($tag);		// Reload the page using the search tag
	}

/*
	Form method to add a bookmark. Fields are tag, the url and the description
	Minimal validation here, empty field validation is being done while writing to database
	Using the "Active Records" class and enabling global_xss_filtering in the config/config.php means that validation is taken care of (almost)
*/
	public function add_bookmarks()
	{
		$tag=$_POST['tag'];
		$link=$_POST['link'];
		$description = $_POST['description'];
		$this->bookmarks_model->add_link($link,$tag,$description);
		$this->index();
	}

/*
	This method is called by the get_bookmarks method. 
	TODO : Merge this and index if possible
*/
	public function view($tag)
	{
		$data['bookmarks'] = $this->bookmarks_model->get_link($tag);

/*
	If no bookmark is found with the search tag, load the homepage
*/
	if (empty($data['bookmarks']))
	{
		$this->load->view('templates/header', $data);
		$this->load->view('bookmarks/index', $data);
		$this->load->view('templates/footer');
	}


	else
	{
		$data['title'] = 'Bookmarks List with tag '.$tag;
		$this->load->view('templates/header', $data);
		$this->load->view('bookmarks/index', $data);
		$this->load->view('templates/footer');
	}
	}
}
