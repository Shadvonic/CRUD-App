	
	<?php 
        include('view/header.php')
	?>
	
	<main>
		<h1>Pet List</h1>

		<aside>
			<!-- display a list of species -->
			<h2>Species</h2>
			<nav>
		  <ul>
        <?php foreach ($species2 as $species) : ?>
            <li>
                <a href="?species=<?php echo $species['species']; ?>">
                <?php echo $species['species']; ?>
                    
                </a>
            </li>
        <?php endforeach; ?>
			</ul>
			</nav>
		</aside>

		
			<!-- display a table of pets -->	
		
		<section>
			<h2><?php echo $species_name; ?>   </h2>
			<table>
				<tr>
					<th>Species</th>
					<th>Name</th>
					<th class="right">Gender</th>
					<th>&nbsp;</th>
				</tr>
                <?php foreach ($pets as $pet) : ?>
				<tr>
					<td><?php echo $pet['species']; ?></td>
					<td><?php echo $pet['name']; ?></td>
					<td><?php echo $pet['sex']; ?></td>
                    
					<td><form action="." method="post">
						
							<input type="hidden" name="action" value="delete_pet">
								   
							<input type="hidden" name="species" value="<?php echo $pet['species'];  ?>">
								   
							<input type="hidden" name="name"  value="<?php echo $pet['name']; ?>">
								   
							<input type="submit" value="Delete">
				</form></td>
				</tr>
            <?php endforeach; ?>
			
			</table>
			
			
			<p class="last_paragraph">
				<a href="?action=add_pet_form">Add Pet</a>
			</p>
		</section>

	</main>
	<?php 
        include('view/footer.php')
	?>
	