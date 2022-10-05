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
                    FROM organization,country,is_active
                    WHERE is_active.organization_id=organization.organization_id 
                    AND is_active.country_id = country.country_id
                    AND country.country_name = '$x'
                    GROUP BY organization_name 
                    UNION
                    SELECT organization_name
                    FROM organization,country,is_active
                    WHERE is_active.organization_id=organization.organization_id 
                    AND is_active.country_id = country.country_id
                    AND country.country_name = '$y'
                    GROUP BY organization_name 
                    ORDER BY organization_name";
        $result = pg_query($query);
        $queryResult = pg_num_rows($result);

        if($queryResult > 0){
            
            echo "<h1>Ονόματα οργανισμών που δραστηριοποιούνται στις χώρες $x και $y. </h1>";
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