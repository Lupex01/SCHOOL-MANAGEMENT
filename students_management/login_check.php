<?php
error_reporting(0);
session_start ();

$host = "localhost";
$user = "root";
$password ="";
$db = "school_project";
$data = mysqli_connect($host, $user,$password, $db);

if ($data ===false)
{
    die("connection error");
}

if ($_SERVER['REQUEST_METHOD'] =="POST")
{
        $name = $_POST['username'];
        $pass = $_POST['password'];

        $sql= "select * from user where username='".$name."' AND password = '".$pass."'   ";

        $result=mysqli_Query($data,$sql);

        $row= mysqli_fetch_array($result);

        if($row ["usertype"]=="student")
        {
         $_SESSION['usertype'] ="student";

            $_SESSION['username'] =$name;
            header("location:studenthome.php");
        }

        elseif($row ["usertype"]=="admin")

        {
         $_SESSION['usertype'] ="admin";
         $_SESSION['username'] =$name;

            header("location:adminhome.php");
        }

        else {
            $message = "username or password do no match";
            $_SESSION['loginMessage']=$message;
            header("location:login.php");
        }

}

?>