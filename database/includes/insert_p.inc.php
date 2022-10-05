<?php

if(isset($_POST['submit'])){
    
    $person_id = $_POST['person_id'];
    $person_name_surname = $_POST['person_name_surname'];
    $person_sex = $_POST['person_sex'];
    $person_profession_code = $_POST['person_profession_code'];
    $person_date_of_birth = $_POST['person_date_of_birth'];

    require_once 'dbh.inc.php';

    //ελεγχοι

    $queryObj = insertper($person_id,$person_name_surname,$person_date_of_birth,$person_sex,$person_profession_code);
    
    if(!$queryObj)
    {
        echo "Σφάλμα εισαγωγής.\n";
    }
    else{
        echo "Η εισαγωγή ολοκληρώθηκε επιτυχώς.\n";
    }

}else{
    header("location: ../insert_p.php");
    exit();
}

function insertper($person_id,$person_name_surname,$person_date_of_birth,$person_sex,$person_profession_code)
{
    $query = "INSERT INTO person(person_id,person_name_surname,person_date_of_birth, person_sex, person_profession_code) VALUES ('".pg_escape_string($person_id)."','".pg_escape_string($person_name_surname)."','".pg_escape_string($person_date_of_birth)."', '".pg_escape_string($person_sex)."', '".pg_escape_string($person_profession_code)."');";
    pg_query($query);
	return $query;
}