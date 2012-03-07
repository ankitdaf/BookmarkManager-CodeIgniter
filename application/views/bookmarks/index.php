<!-- HTML Code to generate the "view" of page elements. Two column layout with bookmarks on the left and Add bookmarks on the right-->
<div class="leftside">
<?php foreach ($bookmarks as $bookmark): ?>

    <h2><a href="<?php echo $bookmark['link']?>"><?php echo $bookmark['description']?> </a> </h2>
        <h3><?php echo $bookmark['tag'] ?></h3>
	<p><?php echo $bookmark['link']?></p>

<?php endforeach ?>
</div>

<div class="rightside">
<h3>Add bookmark</h3><br/>
	<form action="add_bookmarks" method="post">
Link : <input type="text" name="link" /><br/><br/>
Tags : <input type="text" name="tag" /><br/><br/>
Description : <input type="text" name="description" /><br/><br/>
<input type="submit" text="Search"/></form>
</div>
