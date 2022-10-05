<?php
    require "header.php";


require_once 'includes/dbh.inc.php';

$query = "SELECT organization_name,organization_date_of_creation,organization_number_of_employees,organization_web_address 
            FROM organization 
            ORDER BY organization_name";
$result = pg_query($query);
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

?>

<!DOCTYPE html>

<section id="show">
    <div class="tbl" style="overflow-x:auto;">
    <table>
        <tr>
            <th colspan="4"><h2>Παρουσίαση Οργανισμών</h2></th>
        </tr>
        <t>
            <th>Name</th>
            <th>Date of creation</th>
            <th>Number of employees</th>
            <th>Web address</th>
        </t>
        <?php
        while($rows=pg_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $rows['organization_name']; ?></td>
            <td><?php echo $rows['organization_date_of_creation']; ?></td>
            <td><?php echo $rows['organization_number_of_employees']; ?></td>
            <td><?php echo $rows['organization_web_address']; ?></td>
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