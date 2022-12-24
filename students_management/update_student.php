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
$id = $_GET['student_id'];

$sql = "SELECT* FROM user where id=$id ";
$result = mysqli_query($data,$sql);
$info = $result->fetch_assoc();

if (isset($_POST['update']))
 {
    $name =$_POST['name'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $password =$_POST['password'];

    $squery="UPDATE user SET username = '$name', email='$email', phone ='$phone',password = '$password' where id ='$id'";
    $result2= mysqli_query($data, $squery);

    if ($result2=1) {
        header("location:view_student.php");
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
    <style type="text/css">
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
    <div class="content">
        <center>
            <h1>Update Students</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="name" value="
                        <?php
                        echo"{$info['username']}";
                        ?>">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" value=" <?php
                        echo "{$info['email']}";
                        ?>">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="tel" name="phone" value="
                        <?php
                        echo"{$info['phone']}";
                        ?>">>
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password" value="
                        <?php
                        echo"{$info['password']}";
                        ?>">>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="update" value="Update student">
                    </div>
                </form>
            </div>

        </center>

    </div>
</body>

</html>