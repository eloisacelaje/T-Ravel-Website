<?php
require_once "config/database.php";
if(isset($_POST["booking"])){
    $user = $_SESSION['user_id'];
    if(empty($_POST["place"])){
        $place_err = "Place is required.";
        $place = $_POST["place"];
    } else {
        $place = $_POST["place"];
        $place_err = "";
    }
    if(empty($_POST["numOfgue"])){
        $numOfgue_err = "Number Of Guest is required.";
        $numOfgue = $_POST["numOfgue"];
    } else {
        $numOfgue = $_POST["numOfgue"];
        $numOfgue_err = "";
    }
    if(empty($_POST["arrival"])){
        $arrival_err = "arrival is required.";
        $arrival = $_POST["arrival"];
    } else {
        $arrival = $_POST["arrival"];
        $arrival_err = "";
    }
    if(empty($_POST["leaving"])){
        $leaving_err = "leaving is required.";
        $leaving = $_POST["leaving"];
    } else {
        $leaving = $_POST["leaving"];
        $leaving_err = "";
    }
    if((empty($place_err) && empty($numOfgue_err)) && (empty($arrival_err) && empty($leaving_err))){
        $booking = "INSERT INTO booking(place, numOfGuest, arrival, leaving, userID) VALUES ('$place', '$numOfgue', '$arrival', '$leaving', '$user')";
        // echo $booking;
        if ($link->query($booking) === TRUE) {
            $_SESSION['status'] = "Booking Successful";
            echo $_SESSION['status'];
            header('Location: index.php');
           
          } else {
            $_SESSION['statusF'] = "Booking Unsuccessful";
            echo $_SESSION['statusF'];
            header('Location: index.php');
          }
    }else{
        $_SESSION['statusF'] = "Missing Input";
        header('Location: index.php');
    }
}
if(isset($_GET["id"])){
    Echo "HIELO";
    $ID = $_GET["id"];
    $query = "SELECT * FROM packages WHERE ID='$ID' ";
    $result = $link->query($query);
    while($row = $result->fetch_assoc()){
        $_SESSION['place'] = $row["name"];
        $_SESSION['guest'] = 1;
    }
    header('Location: index.php#book');
       
}
?>