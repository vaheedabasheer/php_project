<?php
include 'connection.php';
session_start();


if(isset($_POST['submit']))
 {
    $sel=$_POST['subject'];
    if($sel=="admin")
    {
       $type="admin";
    }
    elseif($sel=="staff")
    {
        $type="Doctor/staff";
    }
    elseif($sel=="patient")
    {
        $type="Patient";
    }
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $phone=$_POST['phone'];
  
    $email=$_POST['email'];
    $pass=$_POST['password'];
  
    mysqli_query($con,"INSERT INTO `login`(`email`, `password`, `user_role`) VALUES ('$email','$pass','$type')");
    $id=mysqli_insert_id($con);
    mysqli_query($con,"INSERT INTO `register`(`id`, `name`, `phone`, `dob`) VALUES ('$id','$name','$phone','$dob')");
    echo "<script>alert ('registered successfully'); </script>";
 }
 if(isset($_POST['login']))
 {
    
    //  var_dump($type);
    // exit();

    $email=$_POST['email'];
   
    $pass=$_POST['password'];
   
$data=mysqli_query($con,"SELECT * FROM `login`  WHERE email='$email' AND password='$pass'");
$ses=mysqli_fetch_assoc($data);

$_SESSION['id']=$ses['id'];
$id=$_SESSION['id'];
$name_get=mysqli_query($con,"select * FROM register where id='$id'");
$name_get1=mysqli_fetch_assoc($name_get);

$_SESSION['name']=$name_get1['name'];
// $name=$_SESSION['name'];
// var_dump($name);
// exit();

$id=$_SESSION['id'];

if(mysqli_num_rows($data)>0)
{
    $user=$ses['user_role'];
//     var_dump($type);
// exit();
if($user=="admin")
{
     header("location:admin.php");
 }
 elseif($user=="Doctor/staff")
 {
     header("location:doctor.php");
 }
 elseif($user=="Patient")
{
    header("location:patient.php");
}
    // header("location:index.php");
  


   
}
else{
   echo "<script>alert ('incorrect email or password' );</script> ";
}



 }
//  $data1=mysqli_query($con,"SELECT * FROM `login` INNER JOIN `register` ON register.id=login.id WHERE login.id='$id'");

// $ses1=mysqli_fetch_assoc($data1);
// $user=ses1['user_role'];


?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <title>Medic | Medical HTML Template</title>

  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- FancyBox -->
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  
  <!-- Stylesheets -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- <script>
      alert ("I am an alert box!");
    </script> -->
</head>


<body>

<!-- nav bar  -->
<?php
 include 'navbar.php';
 

 ?>
 <!-- nav bar  -->
 <!--End Main Header -->

<!--Page Title-->
<section class="page-title text-center" style="background-image:url(images/background/3.jpg);">
    <div class="container">
        <div class="title-text">
            <h1>Login</h1>
            <ul class="title-menu clearfix">
                <li>
                    <a href="index.html">home &nbsp;/</a>
                </li>
                <li>Login</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<section class="service-overview section">
    <div class="container">
        <div class="row">
          
            <div class="col-md-12">
                <div class="accordion-section">
                    <div class="accordion-holder">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" id="R" class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Login
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <!-- <div class="panel-body">
                                      
                                    </div> -->
                                </div>
                            </div>
                            <div class="panel panel-default" >
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                          <span style="color:red"> New User?</span>  Register Now 
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                     
                                

<!-- Contact Section -->
<section class="blog-section section style-three pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="contact-area style-two">
                    <div class="section-title">
                        <h3>Request <span>Registration</span></h3>
                    </div>
                    <form name="contact_form" class="default-form contact-form"  method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone" required="">
                                </div>
                                                      
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                    <input type="password" name="password" id="txtPassword"  placeholder="Enter new password" required="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="txtConfirmPassword" placeholder="Confirm password" required="">
                                </div>
                               
                                <div class="form-group">
                                    <input type="date" name="dob" placeholder="Date of birth" required="" >
                                    
                                    <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
                                </div> 
                               
                                  
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                    <select name="subject" required>
                                        <option>User Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Doctor/staff</option>
                                        <option value="patient">Patient</option>
                                    </select>
                                </div>   
                                <div class="form-group text-center">
                                    <button type="submit" name="submit" class="btn-style-one" onclick="return Validate()">Register now</button>
                                </div>                            
                            </div>
                        </div>
                    </form>
                </div>                      
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="appointment-image-holder">
                    <figure>
                        <img src="images/background/appoinment.jpg" alt="Appointment">
                    </figure>
                </div>                       
            </div>
        </div>                    
    </div>
</section>

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                         <span style="color:red">Already Existing user?</span>  Login Now
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                    <section class="blog-section section style-three pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="contact-area style-two">
                    <div class="section-title">
                        <h3>Request <span>Login</span></h3>
                    </div>
                    <form name="contact_form" class="default-form contact-form"  method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="password" required="">
                                </div>
                                
                                <div class="form-group text-center">
                                    <button type="submit" name="login" class="btn-style-one">Login now</button>
                                </div>  
                                                         
                            </div>
                          
                        </div>
                    </form>
                </div>                      
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="appointment-image-holder">
                    <figure>
                        <img src="images/background/appoinment.jpg" alt="Appointment">
                    </figure>
                </div>                       
            </div>
        </div>                    
    </div>
</section>
                             
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<br><br>

            
            <div class="service-box col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-responsive" src="images/services/service-one.jpg" alt="service-image">
                    </div>
                    <div class="col-md-6">
                        <div class="contents">
                            <div class="section-title">
                                <h3>pulmonary</h3>
                            </div>
                            <div class="text">
                                <p>The implant fixture is first placed, so that it ilikely to osseointegrate, then a dental prosthetic is added.
                                    then a dental prosthetic is added.then a dental pros- thetic is added.</p>
                                <p>The implant fixture is first placed, so that it ilikely to osseointegrate, then a dental prosthetic is added.
                                    then a dental prosthetic is added.then a dental pros- thetic is added.</p>
                            </div>
                            <ul class="content-list">
                                <li>
                                    <i class="fa fa-check-circle-o"></i>Whitening is among the most popular dental</li>
                                <li>
                                    <i class="fa fa-check-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                <li>
                                    <i class="fa fa-check-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                            </ul>
                            <a href="#" class="btn btn-style-one">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-section" style="background: url(images/testimonials/1.jpg);">
            <?php
        $data3=mysqli_query($con,"SELECT * FROM `review`");
        ?>
    <div class="container">
        <div class="section-title text-center">
            <h3>What Our
                <span>Patients Says</span>
            </h3>
        </div>
       
        <div class="testimonial-carousel">
        <?php
                    while($row3=mysqli_fetch_assoc($data3))
                    {
                    ?>
            <!--Slide Item-->
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                        <img src="review/<?php echo $row3['photo'];?>" alt="">
                        </figure>
                    </div>
                    <h6><?php echo $row3['name'];?></h6>
                    <p><?php echo $row3['email'];?></p>
                    <p><?php echo $row3['message']; ?></p>
                </div>
            </div>
            <?php
                    }
                    ?>
        </div>
       
</div>
</section>

<!--Service Section-->
<section class="service-section bg-gray section">
    <div class="container">
        <div class="section-title text-center">
            <h3>Provided
                <span>Services</span>
            </h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. qui suscipit atque <br>
                fugiat officia corporis rerum eaque neque totam animi, sapiente culpa. Architecto!</p>
        </div>
        <div class="row items-container clearfix">
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/1.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Dormitory</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/2.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Germs Protection</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/3.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Psycology</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/1.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Dormitory</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/2.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Germs Protection</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/3.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Psycology</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Service Section--> 

<!--footer-main-->
<footer class="footer-main">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="about-widget">
            <div class="footer-logo">
              <figure>
                <a href="index.html">
                  <img src="images/logo-2.png" alt="">
                </a>
              </figure>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, temporibus?</p>
            <ul class="location-link">
              <li class="item">
                <i class="fa fa-map-marker"></i>
                <p>Modamba, NY 80021, United States</p>
              </li>
              <li class="item">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <a href="#">
                  <p>Support@medic.com</p>
                </a>
              </li>
              <li class="item">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p>(88017) +123 4567</p>
              </li>
            </ul>
            <ul class="list-inline social-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <h6>Services</h6>
          <ul class="menu-link">
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Orthopadic Liabilities</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Dental Clinic</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Dormamu Clinic</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Psycological Clinic</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Gynaecological Clinic</a>
            </li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="social-links">
            <h6>Recent Posts</h6>
            <ul>
              <li class="item">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="images/blog/post-thumb-small.jpg" alt="post-thumb">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">Post Title</a></h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem.</p>
                  </div>
                </div>
              </li>
              <li class="item">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="images/blog/post-thumb-small.jpg" alt="post-thumb">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">
                      <a href="#">Post Title</a>
                    </h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem.</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container clearfix">
      <div class="copyright-text">
        <p>&copy; Copyright 2018. All Rights Reserved by
          <a href="index.html">Medic</a>
        </p>
      </div>
      <ul class="footer-bottom-link">
        <li>
          <a href="index.html">Home</a>
        </li>
        <li>
          <a href="about.html">About</a>
        </li>
        <li>
          <a href="contact.html">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</footer>
<!--End footer-main-->

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".header-top">
  <span class="icon fa fa-angle-up"></span>
</div>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
<script src="plugins/jquery.js"></script>
<script src="plugins/bootstrap.min.js"></script>
<script src="plugins/bootstrap-select.min.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- FancyBox -->
<script src="plugins/fancybox/jquery.fancybox.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="plugins/google-map/gmap.js"></script>

<script src="plugins/validate.js"></script>
<script src="plugins/wow.js"></script>
<script src="plugins/jquery-ui.js"></script>
<script src="plugins/timePicker.js"></script>
<script src="js/script.js"></script>
</body>

</html>
