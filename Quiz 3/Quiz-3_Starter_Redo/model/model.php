<?php


//****************** get_species_list ********************
function get_species_list() {
    global $db;
    $query = 'SELECT DISTINCT species FROM pet';
    $statement = $db->prepare($query);
    $statement->execute();
    $species= $statement->fetchAll();
    $statement->closeCursor();
    return $species;
    
}



//****************** get_species_name ********************
function get_species_name($species) {
    global $db;
    $query2 = "SELECT DISTINCT species FROM pet WHERE pet.species = :species";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':species', $species);
    $statement2->execute();
    $species2 = $statement2->fetch();
    $statement2->closeCursor();
    $species_name = $species2['species'];
    return $species_name;
}




//****************** get_pets_list ***********************
function get_pets_list($species) {
    global $db;
    $query3 = 'SELECT * FROM pet WHERE species = :species';
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(':species', $species);
    $statement3->execute();
    $pets = $statement3->fetchAll();
    $statement3->closeCursor();
    return $pets;
    
}



//****************** add_pet *****************************
function add_pet($species, $sex, $name, $birth, $owner){
    global $db;
    $query4 = 'INSERT INTO pet
                    (species, name, sex, birth, owner)
               VALUES 
                    (:species, :name, :sex, :birth, :owner)';
    $statement4 = $db->prepare($query4);
    $statement4->bindValue(':species', $species);
    $statement4->bindValue(':name', $name);
    $statement4->bindValue(':sex', $sex);
    $statement4->bindValue(':birth', $birth);
    $statement4->bindValue(':owner', $owner);
    $statement4->execute();
    $statement4->closeCursor();
    
    
}




//****************** delete_pet **************************
function delete_pet($species, $name) {
    global $db;
    $query5 = 'DELETE FROM pet
                WHERE species = :species 
                AND name = :name';
    $statement5 = $db->prepare($query5);
    $statement5->bindValue(':species', $species);
    $statement5->bindValue(':name', $name);
    $statement5->execute();
    $statement5->closeCursor();
    
}


?>