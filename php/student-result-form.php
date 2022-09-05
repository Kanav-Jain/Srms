<!doctype html>
<html lang="en">

<head>
    <title>Check Your Results Here</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/navbar.css">

    <link rel="stylesheet" href="../css/common-navbar-style.css">

    <link rel="stylesheet" href="../css/student-result.css">

    <link rel="stylesheet" href="../css/footer.css">

</head>

<body>

<nav class="navbar navbar-expand-lg" style="background-color: #1545b3 !important;">
    <a class="navbar-brand mainTitle" href="../index.php">
      Student Result Management System
    </a>
    <button class="navbar-toggler toggle-button" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon tog-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../php/scoreboard.php">Scoreboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../service-pages/result-form.html">Result</a>
        </li>

        

        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact Us</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link btn btn-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span>Login Here</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../service-pages/admin-login.html">As Admin</a>
            <a class="dropdown-item" href="../php/logout.php">Logout</a>

          </div>
        </li>
      </ul>
    </div>
  </nav>


    <h1 class="head text-center">
        Here is Your Result
    </h1>

    <?php
    session_start();
    if (isset($_POST['submit'])) {
        $emailid = $_POST['emailid'];
        $regno = $_POST['regno'];

        $con = mysqli_connect('localhost', 'student', 'root', 'srms', 3307);
        if ($con == false) {
            echo "Error in connection";
        } else {
            $select = "SELECT * FROM `student_info` WHERE `emailid`='$emailid'  AND `regno`='$regno'";
            $query = mysqli_query($con, $select);
            $row = mysqli_num_rows($query);
            if ($row == 1) {
                $data = mysqli_fetch_assoc($query);

                $_SESSION['name'] = $data['name'];
                if ($_SESSION['name']) {
                    echo '<script>alert("Hello ' . $_SESSION['name'] . '");</script>';
                } else {
                    echo "Error";
                }

                echo "<div class='container jumbotron' style='padding: 8%;'>";

                echo "<div class='row'>";
                echo " <div class='col-lg-6 content'>";
                echo "<h6><b>Name</b> - " . $data["name"] . "</h6>";
                echo "<h6><b>Section</b> - " . $data["section"] . "</h6>";
                echo "<h6><b>Email address</b> - " . $data["emailid"] . "</h6>";
                echo "<h6><b>RollNo</b> - " . $data["rollno"] . "</h6>";
                echo "<h6><b>Year</b> - " . $data["year"] . "</h6>";
                echo "<h6><b>Reg No</b> - " .$data['regno'] . "</h6>";
                echo "</div>";
                echo "</div>";

                echo "<br /><br />";

                echo "<table class='table'>";

                echo " <thead class='thead-dark'>";
                echo "<tr>";
                echo " <th scope='col'>#</th>";
                echo " <th scope='col'>Subject</th>";
                echo " <th scope='col'>Mark Obtained</th>";
                echo " <th scope='col'>Total Mark</th>";
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";

                echo "<tr>";
                echo "<th scope='row'>1</th>";
                echo "<td>Subject I</td>";
                echo "<td>" . $data['s1'] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>2</th>";
                echo "<td>Subject I</td>";
                echo "<td>" . $data["s2"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>3</th>";
                echo "<td>Subject III</td>";
                echo "<td>" . $data["s3"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>4</th>";
                echo "<td>Subject IV</td>";
                echo "<td>" . $data["s4"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>5</th>";
                echo "<td>Subject V</td>";
                echo "<td>" . $data["s5"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'></th>";
                echo "<td><b>Subtotal</b></td>";
                echo "<td>" . $data["total"] . "</td>";
                echo "<td><b>/ 250</b></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th scope='row'></th>";
                echo "<td><b>Attendance</b></td>";
                echo "<td>" . $data["attendance"] . "</td>";
                echo "<td><b>%</b></td>";
                echo "</tr>";

                echo "</tbody>";
                echo "</table>";

                if ($data["status"] == 'Pass')
                    echo "<h3><b>Status</b> - <span style='color: #21bf73;'>Pass</span></h3>";
                else
                    echo "<h3><b>Status</b> - <span style='color: #ff0000;'>Fail</span></h3>";

                echo "</div>";
            } else {
    ?>
                <script>
                    alert('Wrong Emailid or Regno!!Please Try Again');
                    window.open('../service-pages/result-form.html', '_self');
                </script>
    <?php
            }
        }
    }

    ?>



<footer id="contact">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <p class="content1">
              Smartknower Major Project <br>
              Student Result Management System
              <br /><br />

              -Kanav Jain
            </p>
          </div>

          <div class="col-lg-6 col-md-6">
            <h6 class="content2">CONTACT ME</h6>
            <div class="social-icons">
              <a class="icon-link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a class="icon-link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a class="icon-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a class="icon-link" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              <a class="icon-link" href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
              <a class="icon-link" href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>


              <br /><br />
              <p class="contact-details">
                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;
                <a href="#" style="color:#fff; text-decoration: none;">srms@gmail.com</a>
                <br /><br />
                <i class="fa fa-phone" aria-hidden="true"></i> &nbsp;
                +91 95308 02878, 56851 56869 <br /><br />
                <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;
                Chandigarh
              </p>
            </div>
          </div>


        </div>
      </div>

      <div class="footer2">
        Kanav Jain&nbsp;&copy;&nbsp;2022 All Rights Reserved.
      </div>
    </div>
  </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="../javascript/index.js"></script>
</body>

</html>