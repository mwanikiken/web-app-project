<?php 

//Register Student
if (isset($_POST['regs'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {

   $sql = "INSERT INTO `student`(`Fullname`, `Email_Address`, `Password`) VALUES ('$fname','$email',md5('$password'))";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: index.php?studentregistration=success");
 }
 else{
  echo "Passwords do not match.";
 }
}

//Add Grades
if (isset($_POST['addm'])) {
 $sid = $_POST['sid'];
 $sub = $_POST['sub'];
 $marks = $_POST['marks'];

 require_once 'dbconnection.inc.php';

   $sql = "INSERT INTO `grades`(`Student_ID`, `Subject`, `Marks`) VALUES ('$sid','$sub','$marks')";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: index.php?addmark=success");
 }

//Delete Functions

        if($_REQUEST['action'] == 'deleteS' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `student` WHERE `Student_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        $sql1 = "DELETE FROM `grades` WHERE `Student_ID` = '$deleteItem'";
        mysqli_query($conn, $sql1);
        header("Location: index.php?deletestudent=success");
        }

        if($_REQUEST['action'] == 'deleteM' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `grades` WHERE `Grade_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index.php?deletmark=success");
        }

//Update Administrator
if (isset($_POST['upa'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $aid = $_POST['aid'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {

   $sql = "UPDATE `admin` SET `Fullname`='$fname',`Email_Address`='$email',`Password`=md5('$password') WHERE `Administrator_ID`='$aid'";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: logout.php ");
}else{
  echo "Passwords do not match.";
 }
}

//Update Student
if (isset($_POST['ups'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $sid = $_POST['sid'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {
   $sql = "UPDATE `student` SET `Fullname`='$fname',`Email_Address`='$email',`Password`=md5('$password') WHERE `Student_ID`='$sid'";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: logout.php ");
 }else{
  echo "Passwords do not match.";
 }
}

 ?>