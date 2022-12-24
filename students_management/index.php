 <?php
error_reporting(0);
session_start();
// session_destroy();

if ($_SESSION['message']) 
{
  $message=$_SESSION['message'];
  echo "<script type='text/javascript'> 
  alert ('$message')
  </script>";
}
$host = "localhost";
$user = "root";
$password ="";
$db = "school_project";

$data = mysqli_connect($host, $user,$password, $db);
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data,$sql);
?>



 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Student management</title>
     <link rel="stylesheet" type="text/css" href="styles.css" />
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
         integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

     <!-- Optional theme -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
         integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />

     <!-- Latest compiled and minified JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
         integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
     </script>
 </head>

 <body>
     <nav>
         <label class="logo">W School</label>
         <ul>
             <li><a href="">Home</a></li>
             <li><a href="">Contact</a></li>
             <li><a href="">Admission</a></li>
             <li><a href="login.php" class="btn btn-success">Login</a></li>
         </ul>
     </nav>
     <div class="section1">
         <label class="img_text" for="">We Teach students with care</label>
         <img class="main_img" src="school_management.jpg" alt="" />
     </div>

     <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <img class="welcome_img" src="school2.jpg" alt="" />
             </div>
             <div class="col-md-8">
                 <h1>Welcome to our School</h1>
                 <p>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum,
                     excepturi ea, omnis, tempore sapiente necessitatibus incidunt
                     laboriosam eius fugit quos quas quia quasi eum! Itaque, praesentium!
                     Similique asperiores voluptatibus eaque? Lorem ipsum dolor sit amet
                     consectetur adipisicing elit. Doloribus sed itaque tempore aperiam
                     autem doloremque suscipit possimus alias repellendus quis impedit,
                     corrupti aliquam nihil cupiditate excepturi, quia sunt reprehenderit
                     libero. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                     Omnis odit et expedita molestiae quidem a cupiditate ex sint
                     temporibus voluptatibus consequatur labore nisi similique iure,
                     sapiente voluptate minima repellendus architecto. Lorem ipsum dolor
                     sit amet consectetur adipisicing elit. Voluptatem delectus deserunt
                     consectetur adipisci ipsum quia quas a omnis nemo vitae ea at magnam
                     tenetur, quam ab cum quis, dolor voluptate!
                 </p>
             </div>
         </div>
     </div>
     <center>
         <h1>Our Teachers</h1>
     </center>
     <div class="container">
         <div class="row">

             <?php 
            while ($info=$result->fetch_assoc()) {

            ?>
             <div class="col-md-4">
                 <img class="teacher" src="<?php echo "{$info['image']}"?>" alt="" />
                 <h3>
                     <?php
                    echo "{$info['name']}"
                    ?>
                 </h3>
                 <h5>
                     <?php
                    echo "{$info['Description']}"
                    ?>
                 </h5>
             </div>
             <?php
            }
            ?>
         </div>
     </div>

     <center>
         <h1>Our Courses</h1>
     </center>
     <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <img class="teacher" src="graphic.jpg" alt="" />
                 <h3>Graphic Designs</h3>
             </div>
             <div class="col-md-4">
                 <img class="teacher" src="web.jpg" alt="" />
                 <h3>Web Development</h3>
             </div>
             <div class="col-md-4">
                 <img class="teacher" src="marketing.png" alt="" />
                 <h3>Marketing</h3>
             </div>
         </div>
     </div>

     <center class="adm">
         <h2>Admission Form</h2>
     </center>
     <div align="center" class="admission_form">
         <form action="data_check.php" method="post">
             <div class="adm_int">
                 <label class="label_text" for="">Name</label>
                 <input class="input_deg" type="text" name="name" />
             </div>
             <div class="adm_int">
                 <label class="label_text" for="">Email</label>
                 <input class="input_deg" type="email" name="email" />
             </div>
             <div class="adm_int">
                 <label class="label_text" for="">Phone</label>
                 <input class="input_deg" type="tel" name="phone" />
             </div>
             <div class="adm_int">
                 <label class="label_text" for="">Message</label>
                 <textarea class="input_txt" name="message" id="" cols="30" rows="5"></textarea>
             </div>
             <div>
                 <input class="btn btn_primary" id="submit" type="submit" value="apply" name="apply" />
             </div>
         </form>
     </div>
     <footer>
         <h3 class="footer_text">All @copywrite reserves by Lupex code</h3>
     </footer>
 </body>

 </html>