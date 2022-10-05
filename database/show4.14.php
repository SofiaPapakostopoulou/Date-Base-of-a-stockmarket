<?php

require "header.php";
require_once 'includes/dbh.inc.php';


$query = "SELECT organization_name,country_name,count(person.person_name_surname) AS c
            FROM organization,person,country,works,citizen
            WHERE citizen.person_id = person.person_id
            AND citizen.country_id = country.country_id
            AND works.person_id=person.person_id
            AND works.organization_id = organization.organization_id
            GROUP BY organization_name,country_name
            ORDER BY organization_name,country_name";

$result = pg_query($query);
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
?>
    <div class="tbl" style="overflow-x:auto;">
    <table>
        <t>
            <th>Οργανισμός</th>
            <th>Χώρα</th>
            <th>Πλήθος εργαζομένων</th>
        </t>
        <?php
        while($rows=pg_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $rows['organization_name']; ?></td>
            <td><?php echo $rows['country_name']; ?></td>
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