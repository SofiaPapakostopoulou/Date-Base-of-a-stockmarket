<?php

if(isset($_POST['submit'])){
    
    $stock_exchange_id = $_POST['stock_exchange_id'];
    $stock_exchange_name = $_POST['stock_exchange_name'];
    $stock_exchange_description = $_POST['stock_exchange_description'];
    $stock_exchange_alternative_name = $_POST['stock_exchange_alternative_name'];

    require_once 'dbh.inc.php';

    //ελεγχοι

    $queryObj = deletese($stock_exchange_id,$stock_exchange_name,$stock_exchange_alternative_name,$stock_exchange_description);

	if(!$queryObj)
	{
		echo "Σφάλμα διαγραφής.\n";
	}else{
        echo "Η διαγραφή ολοκληρώθηκε επιτυχώς.\n";
    }

}else{
    header("location: ../delete_se.php");
    exit();
}

function deletese($stock_exchange_id,$stock_exchange_name,$stock_exchange_alternative_name, $stock_exchange_description)
{
    $query = "DELETE FROM stock_exchange WHERE stock_exchange_id= '$stock_exchange_id' AND stock_exchange_name='$stock_exchange_name' AND stock_exchange_alternative_name= '$stock_exchange_alternative_name' AND stock_exchange_description= '$stock_exchange_description';";
	pg_query($query);
    return $query;
}
