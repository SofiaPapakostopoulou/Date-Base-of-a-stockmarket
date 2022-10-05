<?php

require "header.php";
require_once 'includes/dbh.inc.php';

?>

<section id="insertxy">
    <h1>Εισάγετε Το Πλήθος των Εργαζομένων που Επιθημείτε.</h1>
    <div class="insertxy">
        <form action="4.3b.inc.php" method="post">
            <input type="text" name="smaller" placeholder="πλήθος < x">
            <input type="text" name="biger" placeholder="πλήθος > y">
            <button type="submit" name="submit-num">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>


<?php
include "footer.php";
?>