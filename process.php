<?php

require_once('config.php');
include "reservations.php";


if(isset($_POST['submit'])) {

    if(!empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['phonenumber']) ) {

        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        //var_dump($fullname,$email,$phonenumber);

        //Insert Data to database 
        $query = "insert into customers(firstname,email,phonenumber) values('$firstname' , '$email', '$phonenumber')";
     
       //run query
       $run = mysqli_query($conn, $query) or die('Error: ' . mysqli_error($conn));;

       //check if our query runs
       if ($run) {
        echo 'Reservation Made Successfully';
       }
       else {
        echo 'Data not  submitted';
       }


    }

    else {
        echo 'All fields are required';
       

    }

}

?>