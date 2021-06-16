<?php
include 'dbconnect.php';
session_start();
if(!$_SESSION['email']){
  $_SESSION['login_first']="Please login first";
  header('Location:index_teach.php');
}
if(isset($_POST['add'])){
  $fname = mysqli_real_escape_string($conn,$_POST['fname']);
  $lname = mysqli_real_escape_string($conn,$_POST['lname']);
  $age = mysqli_real_escape_string($conn,$_POST['age']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $experience = mysqli_real_escape_string($conn,$_POST['experience']);
  $skills = mysqli_real_escape_string($conn,$_POST['skills']);
  $degree= mysqli_real_escape_string($conn,$_POST['degree']);
  $city = mysqli_real_escape_string($conn,$_POST['city']);
  $mobileno = mysqli_real_escape_string($conn,$_POST['mobileno']);
  $image = $_FILES['image']['name'];
  $image_type = $_FILES['image']['type'];
  $image_size = $_FILES['image']['size'];
  $image_tmp = $_FILES['image']['tmp_name'];
  
  if(!$image_type == 'image/jpg' or !$image_type == 'image/png' ){
      $match_err ="Invalid image format";
    }

    else if ($image_size <= 2000){
      $size_error ="Image size is larger. Image size should be less than 2mb";

    }

    else{
        move_uploaded_file($image_tmp, "teach_image/$image");
       $sql = "insert into teacher_detail (fname,lname,age,email,experience,skills,degree,city,mobile_no,teacher_photo) values('$fname','$lname','$age','$email','$experience','$skills','$degree','$city','$mobileno','$image')";

       $run = mysqli_query($conn,$sql);
       if($run){
        $success ="Teacher data submitted successfully";
       }
       else{
        $error ="Unable to submit data. Please try again";
       }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management System</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="Style.css">
<script>
    jQuery(document).ready(function($){
        $('#toggler').click(function(event){
            {
                event.preventDefault();
                $('#wrap').toggleClass('toggled');
            }
        });
   });
</script>
</head>
<body>
<div class="d-flex" id="wrap">
    <div class="sidebar bg-light border-light">
        <div class="sidebar-heading">
            <p class="text-center">Manage Students</p>
    </div>
    <ul class="list-group list-group-flush">
            <a href="main.php" class="list-group-item list-group-item-action">
            <i class="fa fa-vcard-o"></i>DashBoard</a>
            <a href="add_student.php" class="list-group-item list-group-item-action">
            <i class="fa fa-user"></i>Add Student</a>
            <a href="view_student.php" class="list-group-item list-group-item-action">
            <i class="fa fa-eye"></i>View Student</a>
            <a href="view_student.php" class="list-group-item list-group-item-action">
            <i class="fa fa-pencil"></i>Edit Student</a>

            <a href="add_teacher.php" class="list-group-item list-group-item-action">
            <i class="fa fa-user"></i>Add Teacher</a>
            <a href="view_teacher.php" class="list-group-item list-group-item-action">
            <i class="fa fa-eye"></i>View Teacher</a>
            <a href="view_student.php" class="list-group-item list-group-item-action">
            <i class="fa fa-pencil"></i>Edit Teacher</a>
            <a href="logout.php" class="list-group-item list-group-item-action">
            <i class="fa fa-sign-out"></i>Logout</a>

        </ul>
</div>
<div class="main-body">
    <button class="btn btn-outline-light bg-danger mt-3" id="toggler">
        <i class="fa fa-bars"></i>
    </button>
    <section id="main-form">
      <span class="text-center text-success font-weight-bold"><?php echo @$size_error; echo @$match_err    ?></span>
        <h2 class="text-center text-danger pt-3 font-weight-bold">Student Management System</h2>
        <div class="container bg-danger" id="formsetting">
            <h3 class="text-center text-white pb-2 pt-2 font-weight-bold">Add Teacher Detail</h3>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-5 col-sm-5 col-12 m-auto">
                 <div class="form-group">
                  <label class="text-white">First Name</label>
                  <input type="text" name="fname" placeholder="Enter your First Name" class="form-control" required="required">  
                 </div>
                  <div class="form-group">
                  <label class="text-white">Age</label>
                  <input type="text" name="age" placeholder="Enter your Age" class="form-control " required="required">  
                 </div>
                  <div class="form-group">
                  <label class="text-white">Email</label>
                  <input type="text" name="email" placeholder="Enter your Email" class="form-control" required="required">  
                 </div>
                  <div class="form-group">
                  <label class="text-white">Experience</label>
                  <input type="text" name="experience" placeholder="Enter your Experience" class="form-control" required="required">  
                 </div>
                  <div class="form-group">
                  <label class="text-white">Skills</label>
                  <input type="text" name="skills" placeholder="Enter your Skills" class="form-control" required="required">  
                 </div>
               </div>
              <div class="col-md-5 col-sm-5 col-12 m-auto">
               <div class="form-group">
                <label class="text-white">Last Name</label>
                  <input type="text" name="lname" placeholder="Enter your Last Name" class="form-control" required="=required">  
                 </div>
                  <div class="form-group">
                <label class="text-white">Mobile No</label>
                  <input type="text" name="mobileno" placeholder="Enter your Mobile No" class="form-control" required="required">  
                 </div>
                 <div class="form-group">
                  <label class="text-white">City</label>
                  <input type="text" name="city" placeholder="Enter your City" class="form-control" required="required">  
                 </div>
                 <div class="form-group">
                  <label class="text-white">Degree</label>
                  <input type="text" name="degree" placeholder="Enter your Degree" class="form-control" required="required">  
                 </div>
                 <div class="input-group">
                 
                  <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describeby="inputGroupFileAddon01" name="image">
                    <label class="custom-file-label" for="inputGroupFile01">Choose File/Teacher photo</label>
                  </div>   
                 </div>
                 <input type="submit" name="add" value="Add Detail" class="btn btn-success px-4 mt-2">
                 <span class="text-center text-success font-weight-bold"><?php echo @$success; echo @$error    ?></span>
              </div>      
      </div>
      </form>
</div> 
</section>

</div>
</div>
</body>
</html> 