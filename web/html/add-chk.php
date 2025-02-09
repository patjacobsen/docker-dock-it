<?php
$pageTitle = 'Add Chicken';
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
    $query = "SELECT * FROM Chickens WHERE ID = '$id'";
    $result = mysqli_query($db, $query) or die("Error Loading Customer");
    $chicken = mysqli_fetch_array($result, MYSQLI_ASSOC);

    ?>
    <h1 class="title">Edit Chicken</h1>

    <?php

    //build the query
    $query = "SELECT * FROM `Chickens` WHERE ID = '$id'";
    $queryM = "SELECT * FROM `Meat` WHERE ChickenID = '$id';";
    $queryE = "SELECT * FROM `Eggs` WHERE ChickenID = '$id';";
    $queryB = "SELECT * FROM `Breed`";

    //execute the query, also start this with @ to keep information hidden
    //mysqli_error will show the last error that happened. Make sure to comment this out, don't keep it live in code. Strictly debugging
    $result = mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));
    $resultM = mysqli_query($db, $queryM) or die('Error In Query' . mysqli_error($db));
    $resultE = mysqli_query($db, $queryE) or die('Error In Query' . mysqli_error($db));
    $resultB = mysqli_query($db, $queryB) or die('Error In Query' . mysqli_error($db));

    // use num_rows to get the amount returned
    echo "<p>Found " . mysqli_num_rows($result) . " Chicken.</p>";

    ?>

    <form method="post">

        <div class="mb-3">
            <label for="purpose" class="form-label">Purpose</label>
            <select name="option" id="option" class="form-select" onchange="this.form.submit()">
                <option disabled selected value value="none"> -- select an option -- </option>
                <option value="1" name="option" id="eggs">Eggs</option>
                <option value="2" name="option" id="meat">Meat</option>
            </select>
        </div>

        <?php
        @$option = $_POST['option'];

        if($option === 'none'){
            echo'<p></p>';
        }

        if($option === '1'){
            echo'

            <div class="mb-3">
                <label for="breeds">Choose Breed</label>
                <select name="breeds">
                    <option value="1">Australorp</option>
                    <option value="2">Isa Brown</option>
                    <option value="3">Leghorn</option>
                    <option value="4">Plymouth Rock</option>
                    <option value="5">Rhode Island Red</option>
                </select>
            </div>
            
            <div class="mb-3" >
                <label for="age" class="form-label">Age</label >
                <textarea type="text" class="form-control" id="age" name="age"> years</textarea>
            </div>

            <div class="mb-3" >
                <label for="eggs" class="form-label">Egg Count</label >
                <input type="text" class="form-control" id="eggs" name="eggs">
            </div>';
        }

        if($option === '2') {
            echo'

        <div class="mb-3">
                <label for="breeds">Choose Breed</label>
                <select name="breeds">
                    <option value="6">Bresse Gauloise</option>
                    <option value="7">Cornish Cross</option>
                    <option value="8">Red Ranger</option>
                </select>
            </div>

            <div class="mb-3" >
                <label for="age" class="form-label">Age</label >
                <textarea type="text" class="form-control" id="age" name="age"> months</textarea >
            </div>

            <div class="mb-3" >
                <label for="weight" class="form-label">Weight</label >
                <textarea type="text" class="form-control" id="weight" name="weight"></textarea >
            </div>
    
            <div class="mb-3" >
                <label for="meat" class="form-label">Meat</label >
                <textarea type="text" class="form-control" id="meat" name="meat"></textarea >
            </div>';
        }

        ?>

        <?php
        if(isset($_POST['add'])) {

            //$csrf_token = $_POST['csrf_token'] ?? '';
            //if($csrf_token != $_SESSION['csrf_token']){
            //die('Invalid Token');
            //}

            $chicken_id = $_POST['ID'] ?? '';
            $age = $_POST['age'] ?? '';
            $eggs = $_POST['eggs'] ?? '';
            $meat = $_POST['meat'] ?? '';
            $weight = $_POST['weight'] ?? '';
            $breed = $_POST['breeds'] ?? '';
            //$purpose = $_POST['option'] ?? '';

            //Sanitize
            //Prevent XSS (Cross Site Scripting) attack
            //$eggs = intval($eggs); //also done with prepared statements
            //$age = strip_tags($age); //remove all html tags
            //$age = str_replace(['onmouseover', 'onmouseenter', 'onwhatever'], 'xxxxxx', $age);

            //sanitize the output
            //dont do it here - its hardd to manupulate the data later
            //$name = htmlspecialchars($name);

            $query = "INSERT INTO `Chickens`
                    (`ID`, `BreedID`, `Age`)
                VALUES
                    ('NULL', '$breed', '$age')";

            $result = @mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));

            $query = "INSERT INTO `Eggs`
                    (`ChickenID`, `EggID`, `EggCount`)
                VALUES
                    ('NULL', 'NULL', '$eggs')";

            $resultE = @mysqli_query($db, $queryE) or die('Error In Query' . mysqli_error($db));

            $query = "INSERT INTO `Meat`
                    (`ChickenID`, `MeatID`, `Meat`, Weight)
                VALUES
                    ('NULL', 'NULL', '$meat', '$weight')";

            $resultM = @mysqli_query($db, $queryM) or die('Error In Query' . mysqli_error($db));

            $newChicken = mysqli_insert_id($db);

            echo "<p>" . $breed . "</p>";

            header('Location: meat.php?id=' . $id);

        }
        ?>

        <button type="submit" name="add" class="btn btn-primary">Add Chicken</button>
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


