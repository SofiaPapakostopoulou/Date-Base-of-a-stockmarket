<?php
	require "header.php";
?>


<section id="insert">
    <h1>Εισάγετε Τα Στοιχεία Του Ατόμου Στην Παρακάτω Φόρμα.</h1>
    <div class="insertd">
        <form action="includes/insert_p.inc.php" method="post">
            <input type="text" name=person_id placeholder="Αναγνωριστικό Κλειδί(Ακέραιος Αριθμός)">
            <input type="text" name=person_name_surname placeholder="Όνομα Επώνυμο Ατόμου">
            <p>Φύλλο Ατόμου:</p>
            <input type="radio" id="male" name="person_sex" value="male">
            <label for="male">Άνδρας  </label>
            <input type="radio" id="female" name="person_sex" value="female">
            <label for="female">Γυναίκα  </label>
            <input type="radio" id="other" name="person_sex" value="other">
            <label for="other">Άλλο  </label>
            <input type="text" name=person_profession_code placeholder="ΠΚωδικός Επαγγέλματος Ατόμου">
            <input type="date" name=person_date_of_birth placeholder="Ημερομηνία Γέννησης Ατόμου">
            <button type="submit" name="submit">Υποβολή Στοιχείων</button> 
        </form>
    </div>
</section>

<?php
	require "footer.php";
?>
