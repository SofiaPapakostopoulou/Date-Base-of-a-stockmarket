<?php
    require "header.php";
    require_once 'includes/dbh.inc.php';
?>

<section id="insertxy">
    <h1>Εισάγετε Το πλήθος των χωρών και το πλήθος των εργαζομένων που Επιθημείτε.</h1>
    <div class="insertxy">
        <form action="4.8.inc.php" method="post">
            <input type="text" name="x" placeholder="Πλήθος χωρών">
            <input type="text" name="y" placeholder="Πλήθος εργαζομένων">
            <button type="submit" name="submit-search">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>

<?php
	require "footer.php";
?>