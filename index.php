<?php
require_once 'dbconnection.inc.php';
session_start();

if (!isset($_SESSION['Email']) && !isset($_SESSION['adminname'])) {
    header("Location: index.html");
}else{
  $email = $_SESSION['Email'];
  $query=mysqli_query($conn,"SELECT * FROM `admin` WHERE `Email_Address`='$email'")or die(mysqli_error());
  $row=mysqli_fetch_array($query);
  $filter = $_SESSION['adminname'];
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Management - Administrator Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<style type="text/css">
        
tbody th {
  background-color: #36c;
  color: #fff;
  text-align: left;
  padding: 25px;
}

tbody tr:nth-child(even) th {
  background-color: #25c;
  padding: 25px;
}
    </style>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <span class="text-primary">Student Management</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="#" class="nav-item nav-link active">Home</a>
                    <a href="#about" class="nav-item nav-link">About</a>
                    <a href="#database" class="nav-item nav-link">My Module</a>
                    <a href="#contact" class="nav-item nav-link">Contact</a>
                </div>
                <a href="logout.php" class="btn btn-primary px-4">Logout</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="display-3 font-weight-bold text-white">Welcome Administrator, <?php echo $row['Fullname']; ?></h1>
                <a href="#about" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="img/hero.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div id="about" class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="img/about.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">Learn About Us</span></p>
                    <h1 class="mb-4">Best School Management System For You</h1>
                    <p>Our commitment to excellence extends beyond the classroom. We work closely with parents, community leaders, and local businesses to create a collaborative learning community that benefits everyone. We believe that education is a lifelong journey, and we are proud to be a part of our students' journey to success.</p>
                    <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

     <!-- Database Start -->
         <!-- Database Start -->
    <div id="databasea" class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Database</span></p>
                <h1 class="mb-4">My Details</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <div class="card-footer bg-transparent py-4 px-5">
                         <table>
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Email Address</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "student_management");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Fullname`, `Email_Address` FROM `admin` WHERE `Administrator_ID` = '$filter'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Email_Address"]); ?></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="text-center pb-2">
                <h1 class="mb-4">Students</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <div class="card-footer bg-transparent py-4 px-5">
                         <table>
<tr style="text-align: left;
  padding: 8px;">
  <th style="text-align: left;
  padding: 8px;">Student ID</th>
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Email Address</th>
<th style="text-align: left;
  padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "student_management");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Student_ID`,`Fullname`, `Email_Address` FROM `student`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Student_ID"]); ?></td>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Email_Address"]); ?></td>
<td><button class="btn btn-primary" onclick="return confirm('Are you sure to delete this student?')?window.location.href='insertion.inc.php?action=deleteS&id=<?php echo ($row['Student_ID']);?>':true;" title='Delete Student'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                        <div class="text-center pb-2">
                <h1 class="mb-4">Marks</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <div class="card-footer bg-transparent py-4 px-5">
                         <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Mark ID</th>
  <th style="text-align: left;
  padding: 8px;">Student ID</th>
<th style="text-align: left;
  padding: 8px;">Subject </th>
  <th style="text-align: left;
  padding: 8px;">Marks </th>
  <th style="text-align: left;
  padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "student_management");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Grade_ID`, `Student_ID`, `Subject`, `Marks` FROM `grades`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Grade_ID"]); ?></td>
<td><?php echo($row["Student_ID"]); ?></td>
<td><?php echo($row["Subject"]); ?></td>
<td><?php echo($row["Marks"]); ?></td>
<td><button class="btn btn-primary" onclick="return confirm('Are you sure to delete this mark?')?window.location.href='insertion.inc.php?action=deleteM&id=<?php echo ($row['Grade_ID']);?>':true;" title='Delete Mark'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- Database End -->

     <!-- Module Start -->
    <div id="action" class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Update My Details</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form action="insertion.inc.php" method="post">
                              <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Fullname" required="required" name="fname" id="fname"/>
                                    <input type="hidden" value="<?php echo $filter; ?>" required="required" name="aid"/>
                              </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Email Address" required="required" name="email" id="email"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control border-0 p-4" placeholder="Password" required="required" name="password" id="password"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control border-0 p-4" placeholder="Confirm Password" required="required" name="cpassword" id="password"/>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit" name="upa">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                    <div class="col-lg-12">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Register Student</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form action="insertion.inc.php" method="post">
                              <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Fullname" required="required" name="fname" id="fname"/>
                              </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Email Address" required="required" name="email" id="email"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control border-0 p-4" placeholder="Password" required="required" name="password" id="password"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control border-0 p-4" placeholder="Confirm Password" required="required" name="cpassword" id="password"/>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit" name="regs">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="col-lg-12">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Add Marks</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form action="insertion.inc.php" method="post">
                              <div class="form-group">
                                <label>Student ID : </label>
                                <select class="form-control border-0" required name="sid">
                                 <option selected disabled value="0">Kindly Select A Student ID</option>
                                     <?php
                                      $con = mysqli_connect("localhost","root","","student_management");
                                      $sql = "SELECT * FROM `student`";
                                      $all_categories = mysqli_query($con,$sql);
                                      while ($category = mysqli_fetch_array(
                                              $all_categories,MYSQLI_ASSOC)):;
                                  ?>
                                  <option value="<?php echo $category["Student_ID"];?>"><?php echo $category["Student_ID"];?></option>
                                  <?php
                                      endwhile;
                                  ?>
                                </select>
                              </div>
                                <div class="form-group">
                                    <label>Subject : </label>
                                    <select class="form-control border-0" required name="sub">
                                      <option value="" disabled selected>Kindly Select A Subject</option>
                                      <option value="English">English</option>
                                      <option value="Maths">Maths</option>
                                      <option value="Science">Science</option>
                                      <option value="Swahili">Swahili</option>
                                      <option value="ICT">Information Computer Technology</option>
                                      <option value="Social Studies">Social Studies</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="" max="100" min="0" placeholder="Enter Marks" required="required" name="marks" id="marks"/>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit" name="addm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Module End -->

    <!-- Footer Start -->
    <div id="contact" class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Get In Touch</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Address</h5>
                        <p>Nairobi, KENYA.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>student.management@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Phone</h5>
                        <p>+254 756 677878</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#about"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                    <a class="text-white mb-2" href="#database"><i class="fa fa-angle-right mr-2"></i>Database</a>
                    <a class="text-white mb-2" href="#action"><i class="fa fa-angle-right mr-2"></i>My Module</a>
                    <a class="text-white" href="#contact"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-primary font-weight-bold" href="#">Student Management</a>.
            </p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>