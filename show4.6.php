<?php
    require "header.php";
    require_once 'includes/dbh.inc.php';
?>

<section id="insertxy">
    <h1>Εισάγετε Το Φύλλο Που Επιθημείτε.</h1>
    <div class="insertxy">
        <form action="4.6.inc.php" method="post">
            <input type="text" name="x" placeholder="Φύλλο">
            <button type="submit" name="submit-search">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>

<?php
	require "footer.php";