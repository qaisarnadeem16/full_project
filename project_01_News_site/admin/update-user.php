<?php include "header.php"; 
 if( $_SESSION['user_role']=='0'){
 

    header("location: http://localhost/PHP%20Practice/project_01_News_site/admin/post.php");}  ?>
<?php
$id = $_GET['id'];
include "config.php";

if(isset($_POST['submit'])){

   $userid=mysqli_real_escape_string($conn ,$_POST['user_id']);
   $fname=mysqli_real_escape_string($conn ,$_POST['fname']);
   $lname=mysqli_real_escape_string($conn ,$_POST['lname']);
   $user=mysqli_real_escape_string($conn ,$_POST['username']);
    // $password=mysqli_real_escape_string($conn ,md5($_POST['password']));
   $role=mysqli_real_escape_string($conn ,$_POST['role']);

    $sql="UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`username`='$user',`role`='$role' WHERE user_id='$userid'";

     $result1=mysqli_query($conn , $sql) or die("failed query");

    
   
    if($result1['username']>0){
        echo "User Already exist";
    }else{
        // $sql1="INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$role}')";

        if(mysqli_query($conn,$sql)){
            header("location: http://localhost/PHP%20Practice/project_01_News_site/admin/users.php");
        }
    }

 }




?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">user_id
                  <!-- Form Start -->

                  <?php
                  include "config.php";
                  $user_id=$_GET['id'];
                  $sql="SELECT * FROM user WHERE user_id='{$user_id}'";
                  $result=mysqli_query($conn ,$sql);
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                  
                  
                  ?>
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                          <?php if($row['role']==1){
                                echo " <option value='0'>normal User</option>
                                <option value='1' selected>Admin</option>";
                              }else{
                                echo  ' <option value="0">normal User</option>
                                <option value="1" selected>Admin</option>';
                              };?>
                          
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php
                    }
                }
                ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
