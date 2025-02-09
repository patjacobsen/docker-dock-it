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
    $sort = $_GET['sort'] ?? '';
    $dir = $_GET['dir'] ?? '';
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
            WHERE ID = '$id'";

    $queryE = "SELECT * FROM `Eggs` WHERE ChickenID = '$id';";

    //execute the query, also start this with @ to keep information hidden
    //mysqli_error will show the last error that happened. Make sure to comment this out, don't keep it live in code. Strictly debugging
    $result = mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));
    $resultE = mysqli_query($db, $queryE) or die('Error In Query' . mysqli_error($db));

    ?>

    <?php
    if(isset($_POST['update'])) {

        //$csrf_token = $_POST['csrf_token'] ?? '';
        //if($csrf_token != $_SESSION['csrf_token']){
            //die('Invalid Token');
        //}

        $chicken_id = $_POST['ID'] ?? '';
        $age = $_POST['age'] ?? '';
        $eggs = $_POST['eggs'] ?? '';

        //Sanitize
        //Prevent XSS (Cross Site Scripting) attack
        $eggs = intval($eggs); //also done with prepared statements
        $age = strip_tags($age); //remove all html tags
        $age = str_replace(['onmouseover', 'onmouseenter', 'onwhatever'], 'xxxxxx', $age);

        //sanitize the output
        //dont do it here - its hardd to manupulate the data later
        //$name = htmlspecialchars($name);

        $query = "UPDATE `Chickens` 
                SET `Age` = '$age'
                WHERE `Chickens`.`ID` = $id;";

        @$result = @mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));

        $queryE = "UPDATE `Eggs` 
                SET `EggCount` = '$eggs' 
                WHERE `Eggs`.`EggID` = $id;";

        @$resultE = @mysqli_query($db, $queryE) or die('Error In Query' . mysqli_error($db));

        header('Location: chicken.php?id=' . $id);

}
    ?>

    <form method="post">

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <textarea type="text" class="form-control" id="age" name="age"><?= $chicken['Age']?></textarea>
        </div>

        <div class="mb-3">
            <label for="eggs" class="form-label">Egg Count</label>
            <textarea type="text" class="form-control" id="eggs" name="eggs"><?= $chicken['EggCount']?></textarea>
        </div>

        <input type="hidden" name="chicken_id" value="<?= $chicken['ID']?>">

        <button type="submit" name="update" class="btn btn-primary">Update</button>
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
