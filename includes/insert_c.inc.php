<?php

if(isset($_POST['submit'])){
    
    $country_id = $_POST['country_id'];
    $country_name = $_POST['country_name'];
    $country_description = $_POST['country_description'];
    $country_alternative_name = $_POST['country_alternative_name'];
    

    require_once 'dbh.inc.php';

    //ελεγχοι

    $queryObj = insertco($country_id,$country_name,$country_alternative_name,$country_description);
    
    if(!$queryObj)
    {
        echo "Σφάλμα εισαγωγής.\n";
    }
    else{
        echo "Η εισαγωγή ολοκληρώθηκε επιτυχώς.\n";
    }

}else{
    header("location: ../insert_c.php");
    exit();
}

function insertco($country_id,$country_name,$country_alternative_name,$country_description)
{
    $query = "INSERT INTO country(country_id,country_name,country_alternative_name,country_description) VALUES ('".pg_escape_string($country_id)."','".pg_escape_string($country_name)."','".pg_escape_string($country_alternative_name)."', '".pg_escape_string($country_description)."');";
    pg_query($query);
	return $query;
}