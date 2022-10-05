<?php

require "header.php";

require_once 'includes/dbh.inc.php';

$query1 = "SELECT  DISTINCT stock_exchange.stock_exchange_name
            FROM connects_to,stock_exchange,organization  
            WHERE connects_to.organization_id=organization.organization_id 
            AND connects_to.stock_exchange_id=stock_exchange.stock_exchange_id
            ORDER BY stock_exchange.stock_exchange_name";
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
        <h2>Παρουσίαση χρηματιστηρίων και Οργανισμών</h2>
        
        <?php
        echo "<br>";
        while($rows=pg_fetch_assoc($result1))
        {
            echo "<b>".$rows['stock_exchange_name']."</b>";         
            $x=$rows['stock_exchange_name'];
            echo "<br>";
                $query2 = "SELECT organization.organization_name 
                            FROM connects_to,stock_exchange,organization  
                            WHERE connects_to.organization_id=organization.organization_id 
                            AND connects_to.stock_exchange_id=stock_exchange.stock_exchange_id
                            AND stock_exchange.stock_exchange_name = '$x'
                            ORDER BY organization.organization_name";
                $result2 = pg_query($query2);
                if(!$result2) {
                    echo "An error occurred.\n";
                    exit;
                }
                while($rows=pg_fetch_assoc($result2))
                {
                    echo str_repeat("&nbsp;", 4);
                    echo $rows['organization_name']; 
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