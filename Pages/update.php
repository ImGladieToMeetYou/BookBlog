<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
            <title>To the database</title>
    </head>

    <body>
        <?php
            $serverName = "localhost";
            $username = "root";
            $password = "";
            $dbName = "books";

            $conn = mysqli_connect($serverName, $username, $password, $dbName);

            // Take values from the form
            $bTitle = $_REQUEST['bTitle'];
            $FNAuthor = $_REQUEST['FNAuthor'];
            $SNAuthor = $_REQUEST['SNAuthor'];

            // Insert query execution
            $sql = "INSERT INTO recommendations VALUES ('$bTitle', '$FNAuthor', '$SNAuthor')";

            if(mysqli_query($conn, $sql)){
                echo "successful";
                echo nl2br("\n$bTitle\n $FNAuthor\n $SNAuthor");
            }
            else{
                echo "ERROR: $sql." .mysqli_error($conn);
            }

            header("location: home.php");
        ?>
    </body>
</html>