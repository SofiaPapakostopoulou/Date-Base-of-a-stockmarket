<?php
    require "header.php";
    require_once 'includes/dbh.inc.php';
?>

<section id="insertxy">
    <h1>Εισάγετε Το Όνομα Του Χρηματιστηρίου Που Επιθημείτε.</h1>
    <div class="insertxy">
        <form action="4.1.inc.php" method="post">
            <input type="text" name="search" placeholder="Όνομα Χρηματιστηρίου">
            <button type="submit" name="submit-search">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>



<?php
	require "footer.php";
?>