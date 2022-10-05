<?php 
    require "header.php";  
?>


<section class="orgp-container">
<?php
    if (isset($_POST['submit-search'])){
        
        require_once 'includes/dbh.inc.php'; 

        $search = pg_escape_string($_POST['search']);
        $query = "SELECT organization.organization_name 
            FROM organization,stock_exchange,connects_to 
            WHERE connects_to.organization_id=organization.organization_id 
            AND connects_to.stock_exchange_id=stock_exchange.stock_exchange_id 
            AND stock_exchange.stock_exchange_name LIKE '%$search%'";
        $result = pg_query($query);
        $queryResult = pg_num_rows($result);

        if($queryResult > 0){
            
            ?>
            <div class="tbl">
            <table>
                    <t>
                        <th><?php echo "Oργανισμoί Εγγεγραμμένοι στο Χρηματιστήριο $search"; ?></th>
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
            echo "Δεν υπάρχει οργανισμός με αυτό το όνομα.";
        }
    }
?>
</section>

<?php
	require "footer.php";
?>