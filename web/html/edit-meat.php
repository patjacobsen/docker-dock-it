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
    $query = "SELECT * FROM Chickens JOIN Meat ON Chickens.ID = Meat.ChickenID WHERE ID = '$id'";
    $result = mysqli_query($db, $query) or die("Error Loading Customer");
    $chicken = mysqli_fetch_array($result, MYSQLI_ASSOC);

    ?>
    <h1 class="title">Edit Chicken</h1>

    <?php

    //build the query
    $query = "SELECT * FROM `Chickens` WHERE ID = '$id'";

    $queryM = "SELECT * FROM `Meat` WHERE ChickenID = '$id';";

    //execute the query, also start this with @ to keep information hidden
    //mysqli_error will show the last error that happened. Make sure to comment this out, don't keep it live in code. Strictly debugging
    $result = mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));
    $resultM = mysqli_query($db, $queryM) or die('Error In Query' . mysqli_error($db));

    // use num_rows to get the amount returned
    echo "<p>Found " . mysqli_num_rows($result) . " Chicken.</p>";
    ?>

    <?php
    if(isset($_POST['update'])) {

        //$csrf_token = $_POST['csrf_token'] ?? '';
        //if($csrf_token != $_SESSION['csrf_token']){
            //die('Invalid Token');
        //}

        $chicken_id = $_POST['ID'] ?? '';
        $age = $_POST['age'] ?? '';
        $meat = $_POST['meat'] ?? '';
        $weight = $_POST['weight'] ?? '';

        //Sanitize
        //Prevent XSS (Cross Site Scripting) attack
        //$eggs = intval($eggs); //also done with prepared statements
        //$age = strip_tags($age); //remove all html tags
        //$age = str_replace(['onmouseover', 'onmouseenter', 'onwhatever'], 'xxxxxx', $age);

        //sanitize the output
        //dont do it here - its hardd to manupulate the data later
        //$name = htmlspecialchars($name);

        $query = "UPDATE `Chickens` 
                SET `Age` = '$age'
                WHERE `Chickens`.`ID` = $id;";

        @$result = @mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));

        $queryM = "UPDATE `Meat` 
                SET `Meat` = '$meat', `Weight` = '$weight' 
                WHERE `Meat`.`ChickenID` = $id;";

        @$resultM = @mysqli_query($db, $queryM) or die('Error In Query' . mysqli_error($db));

        header('Location: meat.php?id=' . $id);

}
    ?>

    <form method="post">

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <textarea type="text" class="form-control" id="age" name="age"><?= $chicken['Age']?></textarea>
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Weight</label>
            <textarea type="text" class="form-control" id="weight" name="weight"><?= $chicken['Weight']?></textarea>
        </div>

        <div class="mb-3">
            <label for="meat" class="form-label">Meat</label>
            <textarea type="text" class="form-control" id="meat" name="meat"><?= $chicken['Meat']?></textarea>
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
