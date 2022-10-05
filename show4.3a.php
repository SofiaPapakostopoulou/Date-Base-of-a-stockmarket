<?php

require "header.php";
require_once 'includes/dbh.inc.php';

$query = "SELECT person_profession_code,COUNT(person_profession_code) AS c 
            FROM person 
            GROUP BY person_profession_code 
            ORDER BY person_profession_code";
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
            <th>Κωδικός Επαγγέλματος</th>
            <th>Πλήθος Εργαζομένων</th>
        </t>
        <?php
        while($rows=pg_fetch_assoc($result))
        {
        ?>
        <tr>
            <td><?php echo $rows['person_profession_code']; ?></td>
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