<?php

require "header.php";
require_once 'includes/dbh.inc.php';

$query = "SELECT organization_name,stock_exchange_name,country_name
            FROM organization,stock_exchange,country,connects_to,is_active
            WHERE connects_to.stock_exchange_id=stock_exchange.stock_exchange_id
            AND   is_active.country_id = country.country_id
            AND connects_to.organization_id=organization.organization_id
            AND connects_to.organization_id= is_active.organization_id
            ORDER BY organization_name";
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
            <th>Χρηματιστήριο</th>
            <th>Χώρα</th>
        </t>
        <?php
        while($rows=pg_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $rows['organization_name']; ?></td>
            <td><?php echo $rows['stock_exchange_name']; ?></td>
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