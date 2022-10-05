<?php

require "header.php";
require_once 'includes/dbh.inc.php';

$query = "(SELECT country_name,count(person_id) AS c
            FROM country,citizen
            WHERE citizen.country_id  = country.country_id
            GROUP BY country_name
            ORDER BY count(person_id) DESC
            limit 2)
            EXCEPT
            (SELECT country_name,count(person_id) AS c
            FROM country,citizen
            WHERE citizen.country_id  = country.country_id
            GROUP BY country_name
            ORDER BY count(person_id) DESC
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
            <th>Δεύτερη πιο δημοφιλής χώρα</th>
            <th>Αριθμός υπηκόων</th>
        </t>
        <?php
        while($rows=pg_fetch_assoc($result))
        {
        ?>

        <tr>
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