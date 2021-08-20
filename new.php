<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    //A) 
    $sql = "CREATE DATABASE BOE";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $db = mysqli_select_db($conn, "BOE");

    //A) i)
    $sql = "CREATE TABLE Students (
        `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `regno` VARCHAR(30) NOT NULL,
        `name` VARCHAR(30) NOT NULL,
        `program` VARCHAR(30) NOT NULL,
        `branch` VARCHAR(30) NOT NULL,
        `course_code` VARCHAR(30) NOT NULL,
        `sem` INT(1) NOT NULL)";
        
        if ($conn->query($sql) === TRUE) {
          echo "Table Students created successfully";
        } else {
          echo "Error creating table: " . $conn->error;
        }

    //same for remaining two tables
    
    //B)
    $sql = "INSERT into Students (`regno`,`name`,`program`,`branch`,`course_code`,`sem`) values('1','name1','btech','IT','ITE1008','1')";
    mysqli_query($conn,$sql);
    $sql = "INSERT into Students (`regno`,`name`,`program`,`branch`,`course_code`,`sem`) values('2','name2','btech','IT','ITE1008','1')";
    mysqli_query($conn,$sql);
    $sql = "INSERT into Students (`regno`,`name`,`program`,`branch`,`course_code`,`sem`) values('3','name3','btech','IT','ITE1008','1')";
    mysqli_query($conn,$sql);
    //same for remaining two tables

    //C)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="new.php" method="post">
        <label for="reg">Enter the regno : </label>
        <input type="text" name="reg">
        <input type="submit" value="search">
    </form>
</body>
</html>

<?php  
    //D)
    if(isset($_POST['search'])){
        $key = $_POST['reg'];
        $std_search = "SELECT * FROM Students where `regno`== $key";
        $row = mysqli_num_rows($std_search);
        if($row == 1){
            //print all the students details
        }elseif($row == 0){
            echo "Sorry no data found";
        }
    }

    //E
    $sql = "ALTER TABLE Students ADD column_name datatype";
    mysqli_query($conn,$sql);

    //repeat for other tables

    $sql = "DROP Table Students";
    mysqli_query($conn,$sql);
    $sql = "DROP DATABASE BOE";
    mysqli_query($conn,$sql);
?>