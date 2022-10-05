<?php 
    include 'header.php';  
?>


<section>
<?php
    if (isset($_POST['submit-num'])){
        
        require_once 'includes/dbh.inc.php'; 

        $numx = pg_escape_string($_POST['smaller']);
        $numy = pg_escape_string($_POST['biger']);

        $query = "SELECT COUNT(person_profession_code) AS C, person.person_profession_code, organization.organization_name 
        FROM person,organization,works 
        WHERE works.person_id=person.person_id 
        AND works.organization_id=organization.organization_id  
        GROUP BY organization.organization_name,person.person_profession_code 
        HAVING COUNT(person_profession_code)<$numx 
        AND COUNT(person_profession_code)>$numy 
        ORDER BY organization.organization_name";
        $result = pg_query($query);
        $queryResult = pg_num_rows($result);

        if($queryResult > 0){
            
            ?>
            <div class="tbl">
            <table>
                    <t>
                        <th>Οργανισμός</th>
                        <th>Κωδικός Επαγγέλματος</th>
                        <th>Πλήθος Εργαζομένων</th>
                    </t>

            <?php
            while($rows = pg_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $rows['organization_name']; ?></td>
                    <td><?php echo $rows['person_profession_code']; ?></td>
                    <td><?php echo $rows['c']; ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
<?php
        } else{
            echo "Δεν υπάρχει επάγγελμα με αυτά τα κριτήρια.";
        }
    }
?>
</section>


<?php
	require 'footer.php';
?>