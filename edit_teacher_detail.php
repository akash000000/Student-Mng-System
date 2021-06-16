<?php
 
include 'dbconnect.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Managment System</title>
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
            <i class="fa fa-"></i>Edit Teacher</a>
            <a href="logout.php" class="list-group-item list-group-item-action">
            <i class="fa fa-sign-out"></i>Logout</a>
     </ul>
</div>
<div class="main-body">
    <button class="btn btn-outline-light bg-danger mt-3" id="toggler">
        <i class="fa fa-bars"></i>
    </button>
    <section id="main-form">

        <h2 class="text-center text-danger pt-3 font-weight-bold">Student Management System</h2>
        <div class="container bg-danger" id="formsetting">
            <h3 class="text-center text-white pb-2 pt-2W font-weight-bold">Edit Teacher Detail</h3>
            <?php
             if(isset($_GET['edit_teacher'])){

             $edit_teach_id = $_GET['edit_teacher'];
             $query = "select * from teacher_detail where teach_id ='$edit_teach_id'";
             $run = mysqli_query($conn,$query);
             while($row = mysqli_fetch_assoc($run))
             {
             
             ?>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-5 col-sm-5 col-12 m-auto">
                   <div class="form-group">
                  <label class="text-white">First Name</label>
                  <input type="text" name="fname" placeholder="Enter your First Name" class="form-control" required="required" value="<?php echo      $row['fname'];    ?>">  
                 </div>
                  <div class="form-group">
                  <label class="text-white">Age</label>
                  <input type="text" name="age" placeholder="Enter your Age" class="form-control" required="required" value="<?php echo $row['age']; ?>">    
                 </div>
                  <div class="form-group">
                  <label class="text-white">Email</label>
                  <input type="text" name="email" placeholder="Enter your Email" class="form-control"required="required" value="<?php echo $row['email'];    ?>">  
                 </div>
                 <div class="form-group">
                <label class="text-white">Mobile No</label>
                  <input type="text" name="mobileno" placeholder="Enter your Mobile No" class="form-control" required="required" value="<?php echo      $row['mobile_no'];    ?>">   
                 </div>
                  <div class="form-group">
                  <label class="text-white">City</label>
                  <input type="text" name="city" placeholder="Enter your City" class="form-control" required="required" value="<?php echo $row['city'];    ?>">  
                 </div>
              </div>
              <div class="col-md-5 col-sm-5 col-12 m-auto">
               <div class="form-group">
                <label class="text-white">Last Name</label>
                  <input type="text" name="lname" placeholder="Enter your Last Name" class="form-control" required="=required" value="<?php echo $row['lname'];    ?>"> 
                 </div>
                 <div class="form-group">
                  <label class="text-white">Skills</label>
                  <input type="text" name="skills" placeholder="Enter your Skills" class="form-control" required="required" value="<?php echo $row['skills'];    ?>">   
                 </div>
                  <div class="form-group">
                  <label class="text-white">Degree</label>
                  <input type="text" name="degree" placeholder="Enter your Degree" class="form-control" required="required" value="<?php echo $row['degree'];    ?>">    
                 </div>
                 <div class="form-group">
                  <label class="text-white">Experience</label>
                  <input type="text" name="experience" placeholder="Enter your Experience" class="form-control" required="required" value="<?php echo $row['experience'];    ?>">   
                 </div>
                 <div class="input-group">
                 
                  <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describeby="inputGroupFileAddon01" name="image">
                    <label class="custom-file-label" for="inputGroupFile01">Choose File/Teacher photo</label>
                  </div>   
                  <?php   }} ?>
                 </div>
                 <input type="submit" name="update" value="Update Detail" class="btn btn-success px-4 mt-2">
              </div>      

      </div>  
      </form> 
</div> 
</section>

</div>
</div>
</body>
</html> 


<?php
if(isset($_POST['update'])){
  $edit_teach_id = $_GET['edit_teacher'];
  $fname = mysqli_real_escape_string($conn,$_POST['fname']);
  $lname = mysqli_real_escape_string($conn,$_POST['lname']);
  $age = mysqli_real_escape_string($conn,$_POST['age']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $experience = mysqli_real_escape_string($conn,$_POST['experience']);
  $skills = mysqli_real_escape_string($conn,$_POST['skills']);
  $degree = mysqli_real_escape_string($conn,$_POST['degree']);
  $city = mysqli_real_escape_string($conn,$_POST['city']);
  $mobileno = mysqli_real_escape_string($conn,$_POST['mobileno']);
  $image = $_FILES['image']['name'];
  $image_type = $_FILES['image']['type'];
  $image_size = $_FILES['image']['size'];
  $image_tmp = $_FILES['image']['tmp_name'];

  $image_query = "select * from teacher_detail where teach_id = '$edit_teach_id'";
  $run = mysqli_query($conn,$image_query);
  while($row=mysqli_fetch_assoc($run)){
    $img = $row['teacher_photo'];
  }
  unlink('teach_image/'.$img);


  if(!$image_type == 'image/jpg' or !$image_type == 'image/png' ){
      $match_err ="Invalid image format";
    }

    else if ($image_size <= 2000){
      $size_error ="Image size is larger. Image size should be less than 2mb";

    }

    else{
       move_uploaded_file($image_tmp, "teach_image/$image");
       $sql = "update teacher_detail set fname ='$fname',lname = '$lname', age = '$age',email = '$email',experience= '$experience',skills ='$skills',degree='$degree',city = '$city',mobile_no ='$mobileno',teacher_photo ='$image' where teach_id = '$edit_teach_id'";

       $run = mysqli_query($conn,$sql);
       if($run){
        echo "<script>window.open('view_teacher.php?update_success=Teacher data updated successfully','_self')</script>";
       }
       else{
        echo "<script>window.open('view_teacher.php?update_error=Unable to update data. Please try again','_self')</script>";
       }
  }
}
?>