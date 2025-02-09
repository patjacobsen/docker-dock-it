<?php
$pageTitle = 'Egg Chickens';
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
    $id = $_GET['code'] ?? '';
    $query = "SELECT * FROM Chickens WHERE ID = '$id'";
    $result = mysqli_query($db, $query) or die("Error Loading Customer");
    $chickens = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $start = $_GET['start'] ?? 0;
    $per_page = $_GET['per_page'] ?? 10;

    ?>
    <h1 class="title">Our Chickens</h1>

    <div class="text-center"
        <p>All our chickens at Scuppernong Farm are organic pasture raised chickens!</p>
    </div>

    <?php
    //build the query
    $query = "SELECT 
	ID,
	Age,
    BreedName,
    Eggs.ChickenID,
    EggCount
    FROM `Chickens`
    JOIN Eggs ON Chickens.ID = Eggs.ChickenID
    JOIN Breed ON Chickens.BreedID = Breed.BreedID
    ORDER BY $sort $dir";

    //execute the query, also start this with @ to keep information hidden
    //mysqli_error will show the last error that happened. Make sure to comment this out, don't keep it live in code. Strictly debugging
    $result = mysqli_query($db, $query) or die('Error In Query' . mysqli_error($db));
    $total_rows = mysqli_num_rows($result);
    $query .= " LIMIT $start, $per_page";
    echo "<p>Found " . mysqli_num_rows($result) . " Chickens.</p>";
    echo "<a type='button' class='btn btn-primary addchk' href='add-chk.php' >Add Chicken</a>";
    $result = @mysqli_query($db, $query) or die('Error In Query');
    ?>

    <form method="get">
        <select name="per_page" onchange="this.form.submit()" class="page">
            <option value="10" <?= $per_page == 10 ? 'selected' : '' ?>>10</option>
            <option value="25" <?= $per_page == 25 ? 'selected' : '' ?>>25</option>
            <option value="50" <?= $per_page == 50 ? 'selected' : '' ?>>50</option>
        </select>
    </form>

    <table class="table table-bordered table-striped">
        <br>
        <thead>
        <tr>
            <th><a href="?sort=BreedName&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Chicken Breed</a></th>
            <th><a href="?sort=Age&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Age</a></th>
            <th><a href="?sort=EggCount&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Eggs</a></th>
        </tr>
        </thead>
        <tbody>
        <?php

        //loop through the results
        //mysqli_fetch_array returns the next record each time it is called
        //MYSQLI_ASSOC returns the column name as the index
        //MYSQLI_NUM returns the column number
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo '<tr>';
            echo '<td><a href="chicken.php?id=' . $row['ID'] . '">' . $row['BreedName'] . '</a></td>';
            echo '<td>' . $row['Age'] . '</td>';
            echo '<td>' . $row['EggCount'] . '</td>';
            echo '</tr>';
        }
        ?>

        </tbody>
    </table>

    <?php
    $queryQ = "SELECT EggCount,
    SUM(EggCount) AS TotalEggs
    FROM `Eggs`";
    $resultQ = mysqli_query($db, $queryQ) or die('Error In Query' . mysqli_error($db));
    $eggs = mysqli_fetch_array($resultQ, MYSQLI_ASSOC);
    echo
        "<h4 class='text-center'> Total Eggs: " . $eggs['TotalEggs'] . "<h4>";
    ?>

    <?php
    //<a href="country.php?code=' . $row['Code'] . '">
    //close the database connection
    //it will close itself but can slow it down
    //Usually will put this in footer in includes file/folder
    mysqli_close($db);
    ?>
</div>
<nav aria-label="Chicken Pagination" class="">
    <ul class="pagination <?= $start == 0 ? 'disabled' : ''?> justify-content-center">
        <li class="page-item">
            <a class="page-link" href="?per_page=<?= $per_page ?>&sort<?= $sort ?>&start=<?= $start - $per_page ?>" tabindex="-1">Previous</a>
        </li>

        <?php

        for ($i = $start < 5 * $per_page ? 0 : $start - 5 * $per_page;
             $i < $total_rows and $i < $start + 5 * $per_page ;
             $i += $per_page){

            ?>
            <li class="page-item <?= $i == $start ? 'active' : '' ?>">
                <a class="page-link" href="?per_page=<?= $per_page ?>&sort<?= $sort ?>&start=<?= $i ?>"><?= $i / $per_page +1 ?></a>
            </li>
            <?php
        }
        ?>
        <li class="page-item <?= $total_rows < $start + $per_page ? 'disabled' : ''?>">
            <a class="page-link" href="?per_page=<?= $per_page ?>&sort<?= $sort ?>&start=<?= $start + $per_page ?>">Next</a>
        </li>
    </ul>
</nav>
<?php
include "includes/footer.php";
?>
