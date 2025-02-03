<?php
	require_once "includes/database.php";

	// get country code from url
    $id = $_GET['id'] ?? 'USA';

    // build query
    $query = "SELECT * FROM Country WHERE Code = '$id'";

    // execute query
    $result = mysqli_query($db, $query) or die('Error loading country.');

    // get one record from the database
    $country = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $country['Name'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body class="p-3">
<h1><?= $country['Name'] ?></h1>
<p><?= $country['Continent'] ?></p>
<p>...</p>

<?php
// query to get cities
$query = "SELECT * FROM City WHERE CountryCode = '$id'";

// execute query
$result = mysqli_query($db, $query) or die("Error loading cities.");

// if rows are returned, display table
if(mysqli_num_rows($result)):
?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>District</th>
                <th>Population</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<tr>
                           <td><a href=\"city.php?id={$row['ID']}\">{$row['Name']}</a></td>
                           <td>{$row['District']}</td>
                           <td>{$row['Population']}</td>
                           </tr>";
                }
            ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No cities found.</p>
<?php

endif;

// close database connection (put in footer to avoid doing multiple times)
mysqli_close($db);
?>
</body>
</html>
