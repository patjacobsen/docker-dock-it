<?php
$pageTitle = 'Chickens';
include "includes/header.php";
session_name('pjacobsen_final');
session_start();
$_SESSION['csrf_token'] = $_SESSION['csrf_token'] ?? md5(uniqid());

?>

<div class="container">

    <?php
    //connect to the database
    /**
     * @var $db mysqli
     */
    require_once "includes/database.php";
    $dir = $_GET['dir'] ?? 'ASC';

    //Load one specific record for this page/item clicked
    $id = $_GET['id'] ?? '';
    $query = "SELECT * FROM Chickens JOIN Eggs on Chickens.ID = Eggs.ChickenID WHERE ID = '$id'";
    $result = mysqli_query($db, $query) or die("Error Loading Customer");
    $chicken = mysqli_fetch_array($result, MYSQLI_ASSOC);

    ?>
    <h1 class="title">Edit Chicken</h1>

    <?php

    //build the query
    $query = "SELECT *
            FROM `Chickens`
            JOIN Breed on Chickens.BreedID = Breed.BreedID
            WHERE ID = '$id'";

    $queryE = "SELECT * FROM `Eggs` WHERE ChickenID = '$id';";

    //execute the query, also start this with @ to keep information hidden
    //mysqli_error will show the last error that happened. Make sure to comment this out, don't keep it live in code. Strictly debugging
    $result = mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));
    $resultE = mysqli_query($db, $queryE) or die('Error In Query' . mysqli_error($db));




    if (isset($_POST['delete'])) {
        $chicken_id = $_POST['ID'] ?? '';
        $age = $_POST['age'] ?? '';
        $eggs = $_POST['eggs'] ?? '';
        //build the query
        $query = "DELETE FROM `Chickens` WHERE `ID`= '$id'";
        //execute the query, also start this with @ to keep information hidden
        //mysqli_error will show the last error that happened. Make sure to comment this out, don't keep it live in code. Strictly debugging
        @$result = @mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));
        header('Location: chickens.php');
    }

    if (isset($_POST['cancel'])) {

        $id = $_POST['id'] ?? '';

        //redirect back to city page
        header('Location: chickens.php?=id' . $id);

    }

    ?>

    <form method="post" class="text-center">
        <p>Are you sure you want to Delete?</p>
        <input type="hidden" name="id" value="<?= $chicken['ID']?>">

        <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
        <button type="submit" name="delete" class="btn btn-primary">Delete</button>
    </form>

    <?php

    //<a href="country.php?code=' . $row['Code'] . '">
    //close the database connection
    //it will close itself but can slow it down
    //Usually will put this in footer in includes file/folder
    mysqli_close($db);
    ?>

</div>



<?php
include "includes/footer.php";
?>
