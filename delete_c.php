<?php
	require "header.php";
?>

<section id="insert">
    <h1>Εισάγετε Τα Στοιχεία Της Χώρας Πρός Διαγραφή Στην Παρακάτω Φόρμα.</h1>
    <div class="insertd">
        <form action="includes/delete_c.inc.php" method="post">
            <input type="text" name=country_id placeholder="Αναγνωριστικό Κλειδί(Ακέραιος Αριθμός)">
            <input type="text" name=country_name placeholder="Όνομα Χώρας">
            <input type="text" name=country_description placeholder="Περιγραφή Χώρας">
            <input type="text" name=country_alternative_name placeholder="Εναλλακτικό Όνομα Χώρας">
            <button type="submit" name="submit">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>

<?php
	require "footer.php";
?>
