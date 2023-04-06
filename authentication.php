<?php
require_once "dbconnection.inc.php";

session_start();

if(isset($_POST['login'])){

    $id = $_POST['email'];
    $password = $_POST['password'];

         $sql = "SELECT * FROM `admin` WHERE `Email_Address`='$id'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);

            $pass = $row['Password'];

if(md5($password) == $pass){

                $_SESSION['adminname'] = $row['Administrator_ID'];
                $_SESSION['Email'] = $row['Email_Address'];

                echo "Login Succesful.";
                header("Location: index.php");
            }else{
                echo "Incorrect Password.";
            }
        }else{

         $sql = "SELECT * FROM `student` WHERE `Email_Address`='$id'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);

            $pass = $row['Password'];

if(md5($password) == $pass){

                $_SESSION['studname'] = $row['Student_ID'];
                $_SESSION['Email1'] = $row['Email_Address'];

                echo "Login Succesful.";
                header("Location: index1.php");
            }else{
                echo "Incorrect Password.";
            }
        }else{
            echo "User does not exist.";
        }
}
}
           
?>
