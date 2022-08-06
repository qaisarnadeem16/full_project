<?php
 include 'config.php';


 if(isset($_POST['submit'])){
//  php code for file upload

    if(isset($_FILES['fileToUpload'])){

    $error=array();

    $file_name=$_FILES['fileToUpload']['name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
      
    $tmp=explode('.', $file_name);
    $file_ext=end($tmp);

    $extension=array('jpg','png','jpeg');
    if(in_array($file_ext,$extension)===false){
        $error[]="<div class=''alert alert-danger>Wrong Extension!! PLease enter Correct extension </div>";

    }
    if($file_size>5000000 ){
        $error[]="<div class=''alert alert-danger>Your file is greater then 4MB</div>";

    }
    if(empty($error)==true){
        move_uploaded_file($file_tmp , "upload/".$file_name);

    }else{
        print_r($error);
        die();
    }
}
 




     session_start();
 $title=mysqli_real_escape_string($conn , $_POST['post_title']);
 $post_desc=mysqli_real_escape_string($conn , $_POST['postdesc']);
 $category=mysqli_real_escape_string($conn , $_POST['category']);
 $date=date("d,M, Y");
 $author=$_SESSION['user_id'];


 $sql="INSERT INTO post(`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('{$title}','{$post_desc}','{$category}','{$date}','{$author}','{$file_name}');";

  $sql .="UPDATE category SET post=post + 1 WHERE category_id={$category}";

 IF($result=mysqli_multi_query($conn ,$sql)){
    header("location: http://localhost/PHP%20Practice/project_01_News_site/admin/post.php");
 }else{
    echo "<div class=''alert alert-danger>Query failed </div>";
 }
}
?>