<?php
$pageTitle = 'Chickens';
include "includes/header.php";
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
    $sort = $_GET['sort'] ?? 'BreedName';
    $dir = $_GET['dir'] ?? 'ASC';
    $id = $_GET['id'] ?? '';
    $query = "SELECT * FROM Chickens WHERE ID = '$id'";
    $result = mysqli_query($db, $query) or die("Error Loading Chicken");
    $chickens = mysqli_fetch_array($result, MYSQLI_ASSOC);

    ?>

    <a type="button" class="btn btn-primary back" href="chickens.php">Back</a>

    <?php

    //build the query
    $query = "SELECT 
	ID,
	Age,
    BreedName,
    Eggs.ChickenID,
    EggCount,
    Image
    FROM `Chickens`
    JOIN Eggs ON Chickens.ID = Eggs.ChickenID
    JOIN Breed ON Chickens.BreedID = Breed.BreedID
    WHERE ID = '$id'
    ";

    //execute the query, also start this with @ to keep information hidden
    //mysqli_error will show the last error that happened. Make sure to comment this out, don't keep it live in code. Strictly debugging
    $result = mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));

    // use num_rows to get the amount returned
    //$queryN = "SELECT * FROM `Breed` JOIN Chickens ON Breed.ChickenID = Chicken.ID WHERE BreedID = '$id'";

    //$resultN = mysqli_query($db, $queryN) or die("Error Loading Chicken");
    //$name = mysqli_fetch_array($resultN, MYSQLI_ASSOC);

    echo "<p>Found " . mysqli_num_rows($result) . " Chicken.</p>";
    ?>

    <table class="table table-bordered table-striped">
        <thead>

        <tr>
            <th>Image</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Egg Count</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php

        //loop through the results
        //mysqli_fetch_array returns the next record each time it is called
        //MYSQLI_ASSOC returns the column name as the index
        //MYSQLI_NUM returns the column number
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            extract($row, EXTR_PREFIX_ALL, 'chickens');
            //This will create a separate variable for each time in Row...$Name, $District etc
            //EXTR will insert text  before those variables with an underscore
            echo "<tr>
                <td class='text-center'><img class='qwe' src='$chickens_Image'</td>
                <td>$chickens_BreedName</td>
                <td>$chickens_Age</td>
                <td>$chickens_EggCount</td>
                <td><a href='edit-age.php?id=$id' class='btn btn-primary'>Edit Chook</a>
                    <a href='delete.php?id=$id' class='btn btn-danger'>Delete Chook</a>
                </td>
            </tr>";
        }

        ?>
        </tbody>
    </table>

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
