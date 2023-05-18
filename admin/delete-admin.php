<?php
//include constants.php file here
include('../config/constants.php');
//1.get the Id of admin to be deleted
$id = $_GET['id'];
//2. create sql query to delete Admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";
//Execute the Query
$res = mysqli_query($conn,$sql);
//check with the query executed successfully or not
if($res==true)
{
    //Query executed Successfully and admin deleted
    //echo "Admin deleted";
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";
    header ('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    //Failed to delete admin
    //echo "failed to delete Admin";
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin.Try again later.</div>";
    header ('location:'.SITEURL.'admin/manage-admin.php');
}
//3. Redirect to manage admin page with message(success/error)
?>