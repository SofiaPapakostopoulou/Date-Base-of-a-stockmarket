<?php

require "header.php";

require_once 'includes/dbh.inc.php';

$query1 = "SELECT DISTINCT country.country_name 
            FROM citizen,country,person  
            WHERE citizen.person_id=person.person_id AND citizen.country_id=country.country_id 
            ORDER BY country.country_name";
$result1 = pg_query($query1);
if (!$result1) {
    echo "An error occurred.\n";
    exit;
}

?>

<!DOCTYPE html>

<section id="show">
    <div class="tbl" style="overflow-x:auto;">
    <list>
        <h2>Παρουσίαση Χωρών και Ατόμων</h2>
        <?php
        echo "<br>";
        while($rows=pg_fetch_assoc($result1))
        {
            echo "<b>".$rows['country_name']."</b>"; 
            $x=$rows['country_name'];
            echo "<br>";
                $query2 = "SELECT DISTINCT person.person_name_surname 
                FROM citizen,country,person  
                WHERE citizen.person_id=person.person_id 
                AND citizen.country_id=country.country_id                
                AND country.country_name = '$x'
                ORDER BY person.person_name_surname";
                $result2 = pg_query($query2);
                if(!$result2) {
                    echo "An error occurred.\n";
                    exit;
                }
                while($rows=pg_fetch_assoc($result2))
                {
                    echo str_repeat("&nbsp;", 4);
                    echo $rows['person_name_surname']; 
                    echo "<br>";
                }
            
        }
        ?>

    </list>
    </div>

</section>

<?php
	require "footer.php";
?>