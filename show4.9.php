<?php
    require "header.php";
    require_once 'includes/dbh.inc.php';
?>

<section id="insertxy">
    <h1>Εισάγετε Τις Χώρες που Επιθημείτε.</h1>
    <div class="insertxy">
        <form action="4.9.inc.php" method="post">
            <input type="text" name="x" placeholder="1ο όνομα χώρας">
            <input type="text" name="y" placeholder="2ο όνομα χώρας">
            <button type="submit" name="submit-search">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>

<?php
	require "footer.php";
?>