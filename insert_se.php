<?php
	require "header.php";
?>


<section id="insert">
    <h1>Εισάγετε τα στοιχεία του Χρηματιστηρίου στην παρακάτω φόρμα.</h1>
    <div class="insertd">
        <form action="includes/insert_se.inc.php" method="post">
            <input type="text" name=stock_exchange_id placeholder="Αναγνωριστικό Κλειδί(Ακέραιος Αριθμός)">
            <input type="text" name=stock_exchange_name placeholder="Όνομα Χρηματιστηρίου">
            <input type="text" name=stock_exchange_description placeholder="Περιγραφή Χρηματιστηρίου">
            <input type="text" name=stock_exchange_alternative_name placeholder="Εναλλακτικό Όνομα Χρηματιστηρίου">
            <button type="submit" name="submit">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>

<?php
	require "footer.php";
?>
