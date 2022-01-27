
	<?php 
        include('view/header.php')
	?>
<main>
    <h1>Add Pet</h1>
    <form action="index.php" method="post" id="add_pet_form">
        <input type="hidden" name="action" value="add_pet">

        <label>Species:<label>
            
        <select name="species">
            <?php foreach($species2 as $species) { ?>
                <option value="<?php echo $species['species'] ?>">
        <?php echo $species['species'] ?> </option>
        <?php } ?> 
	    </select>

        <br>

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Gender:</label>
        <input type="text" name="sex" />
        <br>
		
		<label>Birth:</label>
        <input type="text" name="birth" />
        <br>

        <label>Owner:</label>
        <input type="text" name="owner"/>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Pet" />
        <br>
    </form>
    <p class="last_paragraph">
        
     <a href="?action=list_species">View Pet List</a>
    </p>

</main>
<?php include('footer.php'); ?>
