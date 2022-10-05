<?php 
    include 'header.php';  
?>

<section class="orgp-container">
<?php
    if (isset($_POST['submit-search'])){
        
        require_once 'includes/dbh.inc.php'; 

        $x = pg_escape_string($_POST['x']);
        $y = pg_escape_string($_POST['y']);
        $query = "SELECT organization_name
                    FROM organization,stock_exchange,connects_to
                    WHERE connects_to.stock_exchange_id = stock_exchange.stock_exchange_id
                    AND connects_to.organization_id = organization.organization_id
                    AND stock_exchange.stock_exchange_name = '$x'
                    EXCEPT
                    SELECT organization_name
                    FROM organization,stock_exchange,connects_to
                    WHERE connects_to.stock_exchange_id = stock_exchange.stock_exchange_id
                    AND connects_to.organization_id = organization.organization_id
                    AND stock_exchange.stock_exchange_name = '$y'
                    ORDER BY organization_name";
        $result = pg_query($query);
        $queryResult = pg_num_rows($result);

        if($queryResult > 0){
            
            echo "<h1>Ονόματα οργανισμών που συνδέονται με το χρηματιστήριο $x αλλά όχι με το $y.</h1>";
            ?>
            <div class="tbl">
            <table>
                    <t>
                        <th>Οργανισμοί</th>
                    </t>

            <?php
            while($rows = pg_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $rows['organization_name']; ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
<?php
        } else{
            echo "Δεν υπάρχειο οργανισμός που να πληρεί τα κριτήρια.";
        }
    }
?>
</section>

<?php
	require "footer.php";
?>