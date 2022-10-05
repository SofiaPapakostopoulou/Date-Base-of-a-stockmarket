<?php
	require "header.php";
?>

<section id="insert">
    <h1>Εισάγετε τα στοιχεία του Οργανισμού Προς Διαγραφή στην παρακάτω φόρμα.</h1>
    <div class="insertd">
        <form action="includes/delete_o.inc.php" method="post">
            <input type="text" name=organization_id placeholder="Αναγνωριστικό Κλειδί(Ακέραιος Αριθμός)">
            <input type="text" name=organization_number_of_employees placeholder="Αριθμός Εργαζομένων Ορανισμού">
            <input type="text" name=organization_ewb_address placeholder="Ιστοσελίδα Οργανισμού">
            <input type="date" value="yyyy-mm-dd" name=organization_date_of_creation placeholder="Ημερομηνία Ίδρυσης Οργανισμού">
            <input type="text" name=organization_name placeholder="Όνομα Οργανισμού">
            <button type="submit" name="submit">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>

<?php
	require "footer.php";
?>
