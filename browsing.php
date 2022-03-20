
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="browsing.php" method="post" id="form">
    <input type="search" id="query" name="search" placeholder="Search...">
    <input type="submit">
</form>

<a href="BookDisplay.php?id='1'">Cooking book</a> <br>
<a href="BookDisplay.php?id='2'">Parenting book</a>
</body>
</html>


<?php
global $name, $author, $year, $photo;

$search = $_POST['search'];
search($search);

function search($search){
    // Connecting to server
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "Bookster";

// Create connection
    $conn = new mysqli($servername, $username, $password, $db);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    // Go through all book names
    $result = mysqli_query($conn,"SELECT * FROM Books WHERE Name LIKE '%$search%' UNION SELECT * FROM Books WHERE Description LIKE '%$search%'");
        while ($res = mysqli_fetch_array($result)) {
        $name[] = $res['Name'];
        $author[] = $res['Author'];
        $year[] = $res['Year'];
        $photo[] = $res['img_URL'];
        $id[] = $res['ID'];
    }

    for($i = 0; $i < count($name); $i++){
        echo $name[$i];
        print "<a href=\"BookDisplay.php?id='$id[$i]'\"/>Cooking book</a> <br>";

    }


}

?>


