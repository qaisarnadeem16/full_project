<?php
 if( $_SESSION['user_role']=='0'){
 

   header("location: http://localhost/PHP%20Practice/project_01_News_site/admin/post.php");}  
include "config.php";

$user_id=$_GET["id"];

$sql="DELETE FROM user WHERE user_id='{$user_id}'";
$result=mysqli_query($conn , $sql);
 if($result){
    header('location: http://localhost/PHP%20Practice/project_01_News_site/admin/users.php');
 }else{
    echo "failed";
 };



?>