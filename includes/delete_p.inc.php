<?php

if(isset($_POST['submit'])){
    
    $person_id = $_POST['person_id'];
    $person_name_surname = $_POST['person_name_surname'];
    $person_sex = $_POST['person_sex'];
    $person_profession_code = $_POST['person_profession_code'];
    $person_date_of_birth = $_POST['person_date_of_birth'];

    require_once 'dbh.inc.php';

    //ελεγχοι

    $queryObj = deleteper($person_id,$person_name_surname,$person_date_of_birth,$person_sex, $person_profession_code);

	if(!$queryObj)
	{
		echo "Σφάλμα διαγραφής.\n";
	}else{
        echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.\n";
    }

}else{
    header("location: ../delete_p.php");
    exit();
}

function deleteper($person_id,$person_name_surname,$person_date_of_birth,$person_sex, $person_profession_code)
    {
        $query = "DELETE FROM person WHERE person_id='$person_id' AND person_name_surname='$person_name_surname' AND person_date_of_birth='$person_date_of_birth'  AND person_sex='$person_sex'  AND person_profession_code='$person_profession_code';";
		pg_query($query);
		return $query;
    }
