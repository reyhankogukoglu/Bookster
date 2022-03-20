<?php

$bookID = $_GET['id'];
getBookInformation($bookID);
function getBookInformation($bookID)
{
    global $name, $author, $year, $photo;

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

    $result = mysqli_query($conn, "SELECT * FROM Books WHERE ID=$bookID");
    while ($res = mysqli_fetch_array($result)) {
        $name = $res['Name'];
        $author = $res['Author'];
        $year = $res['Year'];
        $photo = $res['img_URL'];
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<?php print "<img src=\"$photo\" alt=\"$name\"/>"; ?>


<h1>Book Title:
    <?php
    echo $name;
    ?>
</h1>

<h2>Author:
    <?php
    echo $author;
    ?>
</h2>

<p>Published:
    <?php
    echo $year;
    ?>
</p>

</body>
</html>
