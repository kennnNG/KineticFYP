<?php
    #get img from html code to backend server
	$FileName = $_FILES['img']['name'];
	$TmpName = $_FILES['img']['tmp_name'];
    move_uploaded_file($TmpName,$FileName);
    #check if image upload success
    echo("Image Uploaded Successfully");

    #connect with database
    $host = "localhost";
    $dbnamne = "imgdb";
    $username = "root";
    $pssword = "";


    #make connection
   $conn = mysqli_connect(
    hostname: $host,
    database:$dbnamne,
    username:$username,
    password:$pssword);

    #check if connect success
    if(mysqli_connect_errno()){
        die("Connection error: " . mysqli_connect_error());
    }
    echo "Connectection successful.";

    #insert data to database
    $name = "test123";
    $location = "test location";
    $image = $FileName;

    #insert sql to dataase
    $sql = "INSERT INTO restaurant (Name, Location, Images) VALUES ('$name', '$location', '$image')";

    #check if success inserted
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

   







































    #close sql connecttion
    mysqli_close($conn);
?>