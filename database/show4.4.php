<?php

require "header.php";
require_once 'includes/dbh.inc.php';

$query = "(SELECT role,count(role) AS c
            FROM works
            GROUP BY role
            ORDER BY count(role) desc
            limit 1)
            UNION
            (SELECT role,count(role) AS c
            FROM works
            GROUP BY role
            ORDER BY count(role) asc
            limit 1)";
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
            <th>Ρόλος</th>
            <th>Εμφανίσεις</th>
        </t>
        <?php
        while($rows=pg_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $rows['role']; ?></td>
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