<?php 
    include 'header.php';  
?>

<section class="orgp-container">
<?php
    if (isset($_POST['submit-search'])){
        
        require_once 'includes/dbh.inc.php'; 

        $x = pg_escape_string($_POST['x']);
        $query = "SELECT person_name_surname
                    FROM person,organization,country,works,is_active,citizen
                    WHERE works.person_id=person.person_id
                    AND works.organization_id = organization.organization_id
                    AND is_active.organization_id = organization.organization_id
                    AND is_active.country_id = country.country_id
                    AND citizen.person_id = person.person_id
                    AND citizen.country_id = country.country_id
                    AND organization.organization_name = '$x' 
                    ORDER BY person_name_surname";
        $result = pg_query($query);
        $queryResult = pg_num_rows($result);

        /*
        works.person_id=person.person_id
                    AND works.organization_id = organization.organization_id
                    AND is_active.organization_id = organization.organization_id
                    AND is_active.country_id = country.country_id
                    AND citizen.person_id = person.person_id
                    AND citizen.country_id = country.country_id*/
        if($queryResult > 0){
            
            echo "<h1>Όνομα οργανισμού που απασχολεί τα περισσότερα άτομα φύλλου $x.</h1>";
            ?>
            <div class="tbl">
            <table>
                    <t>
                        <th>Άτομο</th>
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