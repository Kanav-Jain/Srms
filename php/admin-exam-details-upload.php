<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $emailid = $_POST['emailid'];
    $section = $_POST['section'];
    $rollno = $_POST['rollno'];
    $regno = $_POST['regno'];
    $year = $_POST['year'];
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];
    $s4 = $_POST['s4'];
    $s5 = $_POST['s5'];
    $subtotal = $_POST['subtotal'];
    $status = $_POST['status'];
    $attendance = $_POST['attend'];

    $con = mysqli_connect('localhost', 'student', 'root', 'srms', 3307);
    if ($con == false) {
        echo "Error in database connection!!";
    } else {
        $select = "SELECT * FROM `student_info` WHERE `regno`='$regno'";
        $result = mysqli_query($con, $select);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
?>
            <script>
                alert("Reg No. Already Exists");
                window.open('../service-pages/admin-exam-details-upload.html', '_self');
            </script>
            <?php
        } else {

            $insert = "INSERT INTO `student_info`(`name`, `emailid`,`section`,`rollno`,`regno`,`year`,`s1`,`s2`,`s3`,`s4`,`s5`,`total`, `attendance`,`status`) VALUES ('$name','$emailid','$section','$rollno','$regno', '$year','$s1','$s2','$s3','$s4','$s5','$subtotal', '$attendance', '$status')";
            $row = mysqli_query($con, $insert);
            if ($row == true) {

            ?>
                <script>
                    alert('Details Added Successfully!');
                    window.open('../service-pages/admin-exam-details-upload.html', '_self');
                </script>
<?php

            } else {
                echo "error";
            }
        }
    }
}
?>