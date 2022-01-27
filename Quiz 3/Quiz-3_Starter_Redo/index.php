	
	<?php
	//****************** required files ********************	
	require('database.php');
    require('model/model.php');

	//****************** action for list pets and default ********************

  
   

	$action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if($action == NULL) {
            $action = 'list_species';
        }
    }

	
	//******* action for list pets & default *************
    if ($action == 'list_species') {
        $species = filter_input(INPUT_GET, 'species');
        if($species == NULL || $species == FALSE) {
            $species = 'dog';
        }
        // Function Calls
        $species2 = get_species_list();
        $species_name = get_species_name($species);
        $pets = get_pets_list($species);
        // Include View
        include('view/pet_list.php');
        
    	//****************** action for delete pet ********************
     }  else if ($action == 'delete_pet') {
            $species = filter_input(INPUT_POST, 'species');
            $name = filter_input(INPUT_POST, 'name');
         if ($species == NULL || $species == FALSE || $name == NULL || $name == FALSE) { 
            $error = "Missing or incorrect species or name.";
            include('view/error.php');
        } else {
            delete_pet($species, $name);  
            header("Location: .?species=$species");
         }
//****************** action for show_add_form ********************
    } else if ($action == 'add_pet_form') {
            $species2 = get_species_list();
            include('view/pet_add.php');
	
//****************** action for add pet ********************
    } else if ($action == 'add_pet') {
        $species = filter_input(INPUT_POST, 'species');
        $name = filter_input(INPUT_POST, 'name');
        $sex = filter_input(INPUT_POST, 'sex');
        $birth = filter_input(INPUT_POST, 'birth');
        $owner = filter_input(INPUT_POST, 'owner');
        if ($sex == NULL || $name == NULL || $birth == NULL || $owner == NULL) {
            $error = "Invalid product data. Check all fields and try again. ";
            include('view/error.php');
        } else {
            add_pet($species, $sex, $name, $birth, $owner);
            header("Location: .?species=$species");
        }
    }


    
    

	
	

	
	

	
	
	

	

	?>