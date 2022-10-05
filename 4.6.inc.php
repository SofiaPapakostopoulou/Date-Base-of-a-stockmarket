<?php 
    include 'header.php';  
?>

<section class="orgp-container">
<?php
    if (isset($_POST['submit-search'])){
        
        require_once 'includes/dbh.inc.php'; 

        $x = pg_escape_string($_POST['x']);
        $query = "SELECT organization_name, count(person.person_sex) AS c
                    FROM organization,works,person
                    WHERE works.organization_id = organization.organization_id
                    AND  works.person_id=person.person_id
                    AND person_sex = '$x'
                    GROUP BY organization_name
                    ORDER BY count(person.person_sex) DESC LIMIT 1";
        $result = pg_query($query);
        $queryResult = pg_num_rows($result);

        if($queryResult > 0){
            
            echo "<h1>Όνομα οργανισμού που απασχολεί τα περισσότερα άτομα φύλλου $x.</h1>";
            ?>
            <div class="tbl">
            <table>
                    <t>
                        <th>Όνομα οργανισμού</th>
                        <th>Πλήθος εργαζομένων</th>
                    </t>

            <?php
            while($rows = pg_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $rows['organization_name']; ?></td>
                    <td><?php echo $rows['c']; ?></td>
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