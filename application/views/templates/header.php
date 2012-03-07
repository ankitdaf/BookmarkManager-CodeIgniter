<!-- HTML View -->

<html>

<!-- Header -->

<head>
<?php 

$this->load->helper('html');
echo link_tag('css/style.css');?>
	<title><?php echo $title ?> - Show Bookmarks</title>

</head>
<body>

<!-- Searchbar begins -->

	<h1>Bookmarks</h1>
	<form action="get_bookmarks" method="post">
Search for : <input type="text" name="tag" />
<input type="submit" text="Search"/></form>

<!-- Searchbar ends -->
