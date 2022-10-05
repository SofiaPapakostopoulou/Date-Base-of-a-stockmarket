<?php

if(isset($_POST['submit'])){
    
    $stock_exchange_id = $_POST['stock_exchange_id'];
    $stock_exchange_name = $_POST['stock_exchange_name'];
    $stock_exchange_description = $_POST['stock_exchange_description'];
    $stock_exchange_alternative_name = $_POST['stock_exchange_alternative_name'];

    require_once 'dbh.inc.php';

    //ελεγχοι

    $queryObj = insertse($stock_exchange_id,$stock_exchange_name,$stock_exchange_description,$stock_exchange_alternative_name);
    
    if(!$queryObj)
    {
        echo "Σφάλμα εισαγωγής.\n";
    }
    else{
        echo '<span class="popuptext" id="myPopup">Η εισαγωγή ολοκληρώθηκε επιτυχώς.</span>';
        header('Location: ../insert_se.php');
        //echo '<span class="popuptext" id="myPopup">Η εισαγωγή ολοκληρώθηκε επιτυχώς.</span>';
        //echo "Η εισαγωγή ολοκληρώθηκε επιτυχώς.\n";
    }

}else{
    header("location: ../insert_se.php");
    exit();
}

function insertse($stock_exchange_id,$stock_exchange_name,$stock_exchange_description,$stock_exchange_alternative_name)
{
    $query = "INSERT INTO stock_exchange (stock_exchange_id,stock_exchange_name, stock_exchange_alternative_name,stock_exchange_description) VALUES ('".pg_escape_string($stock_exchange_id)."','".pg_escape_string($stock_exchange_name)."','".pg_escape_string($stock_exchange_alternative_name)."','".pg_escape_string($stock_exchange_description)."');";
    pg_query($query);
    return $query;
}
