<?php 
    include 'header.php';  
?>

<section class="orgp-container">
<?php
    if (isset($_POST['submit-search'])){
        
        require_once 'includes/dbh.inc.php'; 

        $x = pg_escape_string($_POST['x']);
        $query = "SELECT DISTINCT person_name_surname
                    FROM person,works,connects_to,stock_exchange
                    WHERE works.person_id=person.person_id
                    AND connects_to.stock_exchange_id = stock_exchange.stock_exchange_id
                    AND works.organization_id =  connects_to.organization_id
                    AND stock_exchange_name = '$x'
                    ORDER BY person_name_surname";
        $result = pg_query($query);
        $queryResult = pg_num_rows($result);

        if($queryResult > 0){
            
            echo "<h1>Ονόματα ατόμων που εργάζονται σε εοργανισμό εγγεγραμμένο στο χρηματιστήριο $x.</h1>";
            ?>
            <div class="tbl">
            <table>
                    <t>
                        <th>Ονόματα Ατόμων</th>
                    </t>

            <?php
            while($rows = pg_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $rows['person_name_surname']; ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
<?php
        } else{
            echo "Δεν υπάρχειο άτομο που να πληρεί τα κριτήρια.";
        }
    }
?>
</section>

<?php
	require "footer.php";
?>