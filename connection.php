<?php

$user = "a30061691_scpuser";
$pw = "Toiohomai1234";
$db = "a30061691_scp";

// database connection
$connection = new mysqli('localhost',  $user, $pw, $db);
    
if (
    isset($_POST["delete"]) ||
    isset($_POST["id"]) ||
    isset($_POST["submit"])
) { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SCP Foundation</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <style>
        body{font-family: sans-serif;
            background: linear-gradient(130deg, rgba(2,0,36,1) 0%, rgba(17,17,69,1) 0%, rgba(19,19,73,1) 0%, rgba(9,9,33,1) 0%, rgba(0,0,0,1) 0%, rgba(5,16,50,1) 50%, rgba(43,142,227,1) 100%, rgba(0,144,10,1) 100%);
            min-height: 100vh;
        }
        a {
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        h1 {
            color: red;
            text-align: center;
        }
        p {
            text-align: center;
        }
    </style>
  </head>
   <body>
  <?php }

if (isset($_POST["delete"])) {
    $id = mysqli_real_escape_string($connection, $_POST["delete"]);
    $delete = "delete from scp where id='$id'";

    if ($connection->query($delete) === true) {
        echo "
                <h1>Record deleted successfully</h1>
                <p><a href='index.php'>Return to index page.</a></p>
            ";
    } else {
        echo "
                <h1>Record did not delete</h1>
                <p>{$connection->error()}</p>
                <p><a href='index.php'>Return to index page.</a></p>
            ";
    }
} elseif (isset($_POST["id"])) {

    // Create variables from our form post data
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    // using escape method (procedule Style) to allow certain characters to be inserted into DB
    $item = mysqli_real_escape_string($connection, $_POST["item"]);
    $class = mysqli_real_escape_string($connection, $_POST["class"]);
    $containment = mysqli_real_escape_string(
        $connection,
        $_POST["containment"]
    );
    $description = mysqli_real_escape_string(
        $connection,
        $_POST["description"]
    );
    $image = mysqli_real_escape_string($connection, $_POST["image"]);

    // create a sql update command
    $update = "update scp set item='$item', class='$class', containment='$containment', description='$description', image='$image' where id='$id'";

    if ($connection->query($update) === true) {
        echo "<h1>Record updated successfully</h1>
    <p><a href='index.php'>Return to index page.</a></p>";
    } else {
        echo "
                <h1>Record did not update</h1>
                <p>{$connection->error()}</p>
                <p><a href='index.php'>Return to index page.</a></p>
            ";
    }
    ?>
          </body>
</html>
<?php
} elseif (isset($_POST["submit"])) {
    // create variables from our form post data

    $item = $connection->real_escape_string($_POST["item"]);
    $class = $connection->real_escape_string($_POST["class"]);
    $containment = $connection->real_escape_string($_POST["containment"]);
    $description = $connection->real_escape_string($_POST["description"]);
    $image = $connection->real_escape_string($_POST["image"]);

    // create a sql insert command
    $insert = "insert into scp(item, class, containment, description, image) 
        values('$item', '$class', '$containment', '$description', '$image')";

    if ($connection->query($insert) === true) {
        echo "
                <h1>Record added succesfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
    } else {
        echo "
                <h1>Error submitting data</h1>
                <p>{$connection->error}</p>
                <p><a href='form.php'>Return to form</a></p>
            ";
    }
} // end isset post

if (
    isset($_POST["delete"]) ||
    isset($_POST["id"]) ||
    isset($_POST["submit"])
) { ?>
        </body>
        </html>
        <?php }

?>
