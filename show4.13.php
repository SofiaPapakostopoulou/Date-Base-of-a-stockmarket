<?php

require "header.php";
require_once 'includes/dbh.inc.php';

$query = "SELECT DISTINCT person_name_surname,country_name
            FROM person,citizen,country,is_active,organization,works
            WHERE citizen.person_id = person.person_id
            AND citizen.country_id = country.country_id
            AND is_active.organization_id = organization.organization_id
            AND is_active.country_id = country.country_id
            AND works.person_id=person.person_id
            AND works.organization_id = organization.organization_id
            ORDER BY person_name_surname";
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
            <th>Άτομο</th>
            <th>Χώρα</th>
        </t>
        <?php
        while($rows=pg_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $rows['person_name_surname']; ?></td>
            <td><?php echo $rows['country_name']; ?></td>
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