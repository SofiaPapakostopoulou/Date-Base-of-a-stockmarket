<?php

if(isset($_POST['submit'])){
    
    $country_id = $_POST['country_id'];
    $country_name = $_POST['country_name'];
    $country_description = $_POST['country_description'];
    $country_alternative_name = $_POST['country_alternative_name'];
    
    require_once 'dbh.inc.php';

    //ελεγχοι

    $queryObj = deleteco($country_id,$country_name,$country_alternative_name,$country_description);

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

function deleteco($country_id,$country_name,$country_alternative_name,$country_description)
{
    $query = "DELETE FROM country WHERE country_id='$country_id' AND country_name='$country_name' AND country_alternative_name='$country_alternative_name' AND country_description= '$country_description';";
	pg_query($query);
	return $query;
}
