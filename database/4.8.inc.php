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
                    FROM organization,is_active
                    WHERE is_active.organization_id=organization.organization_id 
                    GROUP BY organization_name
                    HAVING count(is_active.country_id) > $x
                    AND count(organization.organization_number_of_employees) > $y";
        $result = pg_query($query);
        $queryResult = pg_num_rows($result);

        if($queryResult > 0){
            
            echo "<h1>Ονόματα οργανισμών που δραστηριοποιούνται σε περισσότερες απο $x χώρες και απασχολούν περισσότερους απο $y εργαζομένους. </h1>";
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