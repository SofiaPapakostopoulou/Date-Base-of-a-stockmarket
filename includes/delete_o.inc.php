<?php

if(isset($_POST['submit'])){
    
    $organization_id = $_POST['organization_id'];
    $organization_number_of_employees = $_POST['organization_number_of_employees'];
    $organization_web_adress = $_POST['organization_ewb_adress'];
    $organization_date_of_creation = $_POST['organization_date_of_creation'];
    $organization_name = $_POST['organization_name'];

    require_once 'dbh.inc.php';

    //ελεγχοι

    $queryObj = deleteorg($organization_id,$organization_number_of_employees,$organization_web_address, $organization_date_of_creation, $organization_name);

	if(!$queryObj)
	{
		echo "Σφάλμα διαγραφής.\n";
	}else{
        echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.\n";
    }

}else{
    header("location: ../delete_o.php");
    exit();
}

function  deleteorg($organization_id,$organization_number_of_employees,$organization_web_address, $organization_date_of_creation, $organization_name)
{
    $query = "DELETE FROM organization WHERE organization_id='$organization_id' AND organization_name='$organization_name' AND organization_date_of_creation='$organization_date_of_creation'  AND organization_number_of_employees='$organization_number_of_employees'  AND organization_web_address='$organization_web_address';";
	pg_query($query);
	return $query;
}
