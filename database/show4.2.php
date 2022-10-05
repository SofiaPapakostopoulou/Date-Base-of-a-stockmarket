<?php

require "header.php";

require_once 'includes/dbh.inc.php';

$query = "SELECT organization.organization_name,organization.organization_number_of_employees,COUNT(country) AS c 
            FROM organization,country,is_active  
            WHERE is_active.organization_id=organization.organization_id 
            AND is_active.country_id=country.country_id 
            GROUP BY organization.organization_name,organization.organization_number_of_employees 
            ORDER BY organization.organization_name";
$result = pg_query($query);
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
?>

<section id="show">
    <div class="tbl" style="overflow-x:auto;">
    <table>
        <t>
            <th>Οργανισμός</th>
            <th>Αριθμός εργαζομένων οργανισμού</th>
            <th>Χώρες στις οποίες δραστηριοποιείται</th>
        </t>
        <?php
        while($rows=pg_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $rows['organization_name']; ?></td>
            <td><?php echo $rows['organization_number_of_employees']; ?></td>
            <td><?php echo $rows['c']; ?></td>
        </tr>
        <?php
        }
        ?>

    </table>
    </div>

</section>



<?php
	require "footer.php";
?>