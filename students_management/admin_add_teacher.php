<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']== 'student')
{
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password ="";
$db = "school_project";

$data = mysqli_connect($host, $user,$password, $db);

if (isset($_POST['add_teacher'])) {
    $t_name =$_POST['name'];
    $t_description =$_POST['description'];
    $file =$_FILES['image']['name'];
    $dst = "./image/".$file;
    $dst_db = "./image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst_db);
    $sql= "INSERT INTO teacher (name, Description, image)
    VALUES('$t_name','$t_description','$dst_db' )";

    $result =mysqli_query($data,$sql);

    if ($result==1)
     {
        header('location:admin_add_teacher.php');
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css" />
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
    ?>
    <style>
    label {
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;

    }

    .div_deg {
        background-color: skyblue;
        width: 400px;
        padding-top: 70px;
        padding-bottom: 70px;

    }
    </style>

    <title>Admin Dashboard</title>
</head>

<body>
    <?php
include 'aside_bar.php'
?>
    <div>
        <center>
            <h1>Add Teacher</h1>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">Teacher Name</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="">Image</label>
                        <input type="file" name="image">
                    </div>


                    <div>

                        <input class="btn btn-primary" type="Submit" name="add_teacher">
                    </div>

                </form>
            </div>
        </center>

    </div>
</body>

</html>