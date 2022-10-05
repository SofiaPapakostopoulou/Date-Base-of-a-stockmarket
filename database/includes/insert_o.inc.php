<?php

if(isset($_POST['submit'])){
    
    $organization_id = $_POST['organization_id'];
    $organization_number_of_employees = $_POST['organization_number_of_employees'];
    $organization_web_adress = $_POST['organization_web_adress'];
    $organization_date_of_creation = $_POST['organization_date_of_creation'];
    $organization_name = $_POST['organization_name'];

    require_once 'dbh.inc.php';

    //ελεγχοι

    $queryObj = insertorg($organization_id,$organization_name,$organization_web_address,$organization_number_of_employees,$organization_date_of_creation);

    if(!$queryObj)
    {
        echo "Σφάλμα εισαγωγής.\n";
    }
    else{
        echo "Η εισαγωγή ολοκληρώθηκε επιτυχώς.\n";
    }

}else{
    header("location: ../insert_o.php");
    exit();
}

function insertorg($organization_id,$organization_name,$organization_web_address,$organization_number_of_employees,$organization_date_of_creation)
{
    $query = "INSERT INTO organization(organization_id,organization_name,organization_web_address,organization_number_of_employees,organization_date_of_creation) VALUES ('".pg_escape_string($organization_id)."','".pg_escape_string($organization_name)."','".pg_escape_string($organization_web_address)."','".pg_escape_string($organization_number_of_employees)."','".pg_escape_string($organization_date_of_creation)."');";
    pg_query($query);
	return $query;
}