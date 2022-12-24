<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']== 'admin')
{
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password ="";
$db = "school_project";

$data = mysqli_connect($host, $user,$password, $db);

$name = $_SESSION['username'];

$sql = "SELECT * FROM user where username='$name'";
$result = mysqli_query($data,$sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['Update_profile']))
 {
    $s_email =$_POST['email'];
    $s_phone =$_POST['phone'];
    $s_password =$_POST['password'];

    $sql2="UPDATE user SET  email='$s_email', phone ='$s_phone', password = '$s_password' where username ='$name'";
    $result2= mysqli_query($data, $sql2);
    
    
    if ($result2) {
        echo "update success";
    }


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
include 'student_sidebar_css.php'
?>
    <style>
    label {
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-buttom: 10px;

    }

    .content {
        background-color: skyblue;
        width: 500px;
        padding-top: 70px;
        padding-bottom: 70px;

    }
    </style>
</head>

<body>
    <?php
    include 'student_sidebar.php'
    ?>
    <center>

        <div class="content">
            <h1>Student Update</h1>
            <br>
            <form action="#" method="POST">

                <div>
                    <label for="">Email</label>
                    <input type="email" name="email" value=" <?php
                        echo "{$info['email']}";
                        ?>">
                </div>
                <div>
                    <label for="">Phone</label>
                    <input type="phone" name="phone" value=" <?php
                        echo "{$info['phone']}";
                        ?>">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="text" name="password" value=" <?php
                        echo "{$info['password']}";
                        ?>">
                </div>
                <div>

                    <input class="btn btn-primary" type="Submit" name="Update_profile" value="update">
                </div>
            </form>
        </div>
    </center>

</body>

</html>