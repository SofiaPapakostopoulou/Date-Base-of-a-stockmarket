<?php
$host = "localhost";
$user = "db1u39";
$pass = "kLn5ekGi";
$dbname = $user;

$conn = pg_connect("host=$host user=$user password=$pass dbname=$dbname");
if(!$conn)
{
    echo "Πρόβλημα σύνδεσης στη βάση.";
    die;
}

echo "\nΚαλωσήρθατε στην βάση δεδομένων Χρηματιστηρίου.\n\n";
for(;;){
        echo "\nΓια εισαγωγη στοιχείου επιλεξτε 1.\nΓια διαγραφή επιλέξτε 2.\nΓια έξοδο οποιοδήποτε άλλο πλήκτρο.\n\n";
        $line = readline();
		if($line == 1){
			echo "Τι θέλετε να εισάγετε;\n 1.Χρηματιστήριο\n 2.Χώρα\n 3.Άτομο\n 4.Οργανισμός\n";
			$line = readline();
			if($line == 1){
				echo "Γράψτε τα στοιχεία του Χρηματιστηρίου. Μορφή εισαγωγής(id(ακεραιος) name alternative_name description )\n";
				$line = readline();
				list($stock_exchange_id,$stock_exchange_name,$stock_exchange_alternative_name, $stock_exchange_description) = explode(" ", $line, 4);
				$queryObj = insertse($stock_exchange_id,$stock_exchange_name, $stock_exchange_alternative_name, $stock_exchange_description);
				if(!$queryObj)
				{
					echo "Σφάλμα εισαγωγής.\n";
				}
				else{
					echo "Η εισαγωγή ολοκληρώθηκε επιτυχώς.\n";
				}
			}

			if($line == 2){
				echo "Γράψτε τα στοιχεία της Χώρας .Μορφή εισαγωγής(id(ακεραιος) name alternative_name description)\n";
				$line = readline();
				list($country_id,$country_name,$country_alternative_name,$country_description) = explode(" ", $line,4);
				$queryObj = insertco($country_id,$country_name,$country_alternative_name,$country_description);
				if(!$queryObj)
				{
					echo "Σφάλμα εισαγωγής.\n";
				}
				else{
					echo "Η εισαγωγή ολοκληρώθηκε επιτυχώς.\n";
				}

			}
			if($line == 3){
				echo "Γράψτε τα στοιχεία του  Άτομου. Μορφή εισαγωγής(id(ακεραιος)name_surname date_of_birth sex profession_code )\n";
				$line = readline();
				list($person_id,$person_name_surname,$person_date_of_birth,$person_sex, $person_profession_code) = explode(" ", $line, 5);
				$queryObj = insertper($person_id,$person_name_surname,$person_date_of_birth,$person_sex, $person_profession_code);
				if(!$queryObj)
				{
					echo "Σφάλμα εισαγωγής.\n";
				}
				else{
					echo "Η εισαγωγή ολοκληρώθηκε επιτυχώς.\n";
				}

			}

			if($line == 4){
				echo "Γράψτε τα στοιχεία του Οργανισμου .Μορφή εισαγωγής(id(ακεραιος), name, web_address,number_of_employees, date_of_creation )\n";
				$line = readline();
				list($organization_id,$organization_name,$organization_web_address, $organization_number_of_employees,$organization_date_of_creation) = explode(" ", $line, 5);
				$queryObj = insertorg($organization_id,$organization_name,$organization_web_address, $organization_number_of_employees,$organization_date_of_creation);
				if(!$queryObj)
				{
					echo "Σφάλμα εισαγωγής.\n";
				}
				else{
					echo "Η εισαγωγή ολοκληρώθηκε επιτυχώς.\n";
				}

			}

        }
		else if($line == 2){
			echo "Tι θέλετε να διαγράψετε;\n 1.Χρηματιστήριο\n 2.Χώρα\n 3.Άτομο\n 4.Οργανισμός\n Για ακύρωση οποιοδήποτε πλήκτρο.\n\n";
			$line = readline();
			if($line==1){
				echo "Δώστε το Χρηματιστήριο προς διαγραφή (Μορφή εισαγωγωγής: id(ακεραιος) name  alternative_name description)\n";
                $line = readline();
				list($stock_exchange_id,$stock_exchange_name,$stock_exchange_alternative_name, $stock_exchange_description) = explode(" ", $line, 4);
				$queryObj = deletese($stock_exchange_id,$stock_exchange_name,$stock_exchange_alternative_name, $stock_exchange_description);
				if(!$queryObj)
				{
					echo "Σφάλμα διαγραφής.\n";
				}
				echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.\n";
			}

			if($line == 2){
				echo "Γράψτε τα στοιχεία της Χώρας προς διαγραφή.Μορφή εισαγωγής(id(ακεραιος)  name  alternative_name description)\n";
				$line = readline();
				list($country_id,$country_name,$country_alternative_name,$country_description) = explode(" ", $line, 4);
				$queryObj = deleteco($country_id,$country_name,$country_alternative_name,$country_description);
				if(!$queryObj)
				{
					echo "Σφάλμα διαγραφής.\n";
				}
				echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.\n";
			}

			if($line == 3){
				echo "Γράψτε τα στοιχεία του Ατόμου προς διαγραφή.Μορφή εισαγωγής(id name_surname date_of_birth sex profession_code)\n";
				$line = readline();
				list($person_id,$person_name_surname,$person_date_of_birth,$person_sex, $person_profession_code) = explode(" ", $line, 5);
				$queryObj = deleteper($person_id,$person_name_surname,$person_date_of_birth,$person_sex, $person_profession_code);
				if(!$queryObj)
				{
					echo "Σφάλμα διαγραφής.\n";
				}
				echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.\n";
			}

			if($line == 4){
				echo "Γράψτε τα στοιχεία του Οργανισμού προς διαγραφή.Μορφή εισαγωγής(id(ακεραιος), number_of_employees, web_address, date_of_creation, name )\n";
				$line = readline();
				list($organization_id,$organization_number_of_employees,$organization_web_address, $organization_date_of_creation, $organization_name) = explode(" ", $line, 5);
				$queryObj = deleteorg($organization_id,$organization_number_of_employees,$organization_web_address, $organization_date_of_creation, $organization_name);
				if(!$queryObj)
				{
					echo "Σφάλμα διαγραφής.\n";
				}
				echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.\n";
			}

		}


		else{


			break;
		}

}

// Κλείσιμο σύνδεσης
pg_close($conn);


//Βοηθητικές συναρτήσεις εισαγωγής και διαγραφής
    function insertse($stock_exchange_id,$stock_exchange_name,$stock_exchange_alternative_name, $stock_exchange_description)
    {
        $query = "INSERT INTO stock_exchange (stock_exchange_id,stock_exchange_name, stock_exchange_alternative_name,stock_exchange_description) VALUES ('".pg_escape_string($stock_exchange_id)."','".pg_escape_string($stock_exchange_name)."','".pg_escape_string($stock_exchange_alternative_name)."','".pg_escape_string($stock_exchange_description)."');";
        pg_query($query);
		return $query;
    }


	function insertco($country_id,$country_name,$country_alternative_name,$country_description)
    {
        $query = "INSERT INTO country(country_id,country_name,country_alternative_name,country_description) VALUES ('".pg_escape_string($country_id)."','".pg_escape_string($country_name)."','".pg_escape_string($country_alternative_name)."', '".pg_escape_string($country_description)."');";
        pg_query($query);
		return $query;
    }


	function insertper($person_id,$person_name_surname,$person_date_of_birth,$person_sex, $person_profession_code)
    {
        $query = "INSERT INTO person(person_id,person_name_surname,person_date_of_birth, person_sex, person_profession_code) VALUES ('".pg_escape_string($person_id)."','".pg_escape_string($person_name_surname)."','".pg_escape_string($person_date_of_birth)."', '".pg_escape_string($person_sex)."', '".pg_escape_string($person_profession_code)."');";
        pg_query($query);
		return $query;
    }

	function insertorg($organization_id,$organization_name,$organization_web_address, $organization_number_of_employees,$organization_date_of_creation)
    {
        $query = "INSERT INTO organization(organization_id,organization_name,organization_web_address, organization_number_of_employees,organization_date_of_creation) VALUES ('".pg_escape_string($organization_id)."','".pg_escape_string($organization_name)."','".pg_escape_string($organization_web_address)."','".pg_escape_string($organization_number_of_employees)."','".pg_escape_string($organization_date_of_creation)."');";
        pg_query($query);
		return $query;
    }

	function deletese($stock_exchange_id,$stock_exchange_name,$stock_exchange_alternative_name, $stock_exchange_description)
    {
        $query = "DELETE FROM stock_exchange WHERE stock_exchange_id= '$stock_exchange_id' AND stock_exchange_name='$stock_exchange_name' AND stock_exchange_alternative_name= '$stock_exchange_alternative_name' AND stock_exchange_description= '$stock_exchange_description';";
		pg_query($query);
        return $query;
    }



	function deleteco($country_id,$country_name,$country_alternative_name,$country_description)
    {
        $query = "DELETE FROM country WHERE country_id='$country_id' AND country_name='$country_name' AND country_alternative_name='$country_alternative_name' AND country_description= '$country_description';";
		pg_query($query);
		return $query;
    }



	function deleteper($person_id,$person_name_surname,$person_date_of_birth,$person_sex, $person_profession_code)
    {
        $query = "DELETE FROM person WHERE person_id='$person_id' AND person_name_surname='$person_name_surname' AND person_date_of_birth='$person_date_of_birth'  AND person_sex='$person_sex'  AND person_profession_code='$person_profession_code';";
		pg_query($query);
		return $query;
    }


	function  deleteorg($organization_id,$organization_number_of_employees,$organization_web_address, $organization_date_of_creation, $organization_name)
    {
        $query = "DELETE FROM organization WHERE organization_id='$organization_id' AND organization_name='$organization_name' AND organization_date_of_creation='$organization_date_of_creation'  AND organization_number_of_employees='$organization_number_of_employees'  AND organization_web_address='$organization_web_address';";
		pg_query($query);
		return $query;
    }

?>


