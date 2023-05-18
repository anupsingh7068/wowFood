<?php include('partials/menu.php');?>
       <div class="main-content">
       <div class="wrapper">
        <h1>Manage Category</h1>

        <br>
       <br>
       <?php
        if(isset($_SESSION['add']))  //checking whether the session is set or not
        {
            echo $_SESSION['add'];  //Removing session message
          unset($_SESSION['add']); //Removing session message

        }
        if(isset($_SESSION['remove']))  //checking whether the session is set or not
        {
            echo $_SESSION['remove'];  //Removing session message
          unset($_SESSION['remove']); //Removing session message

        }
        if(isset($_SESSION['delete']))  //checking whether the session is set or not
        {
            echo $_SESSION['delete'];  //Removing session message
          unset($_SESSION['delete']); //Removing session message

        }
        if(isset($_SESSION['no-category-found']))  //checking whether the session is set or not
        {
            echo $_SESSION['no-category-found'];  //Removing session message
          unset($_SESSION['no-category-found']); //Removing session message

        }
        if(isset($_SESSION['update']))  //checking whether the session is set or not
        {
            echo $_SESSION['update'];  //Removing session message
          unset($_SESSION['update']); //Removing session message

        }
        if(isset($_SESSION['upload']))  //checking whether the session is set or not
        {
            echo $_SESSION['upload'];  //Removing session message
          unset($_SESSION['upload']); //Removing session message

        }
        if(isset($_SESSION['failed-remove']))  //checking whether the session is set or not
        {
            echo $_SESSION['failed-remove'];  //Removing session message
          unset($_SESSION['failed-remove']); //Removing session message

        }

        ?>
        <br>
        <br>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

        <br>
        <br>
        <table class="tbl-full">
            <tr>
     <th>S.N.</th>
      <th>Title</th>
      <th>Image</th>
      <th>Featured</th>
      <th>Active</th>
      <th>Actions</th>

            </tr>
            <?php 
            $sql ="SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn=1;
            if($count>0)
            {
              while($row=mysqli_fetch_assoc($res))
              {
                $id = $row['id'];  
                $title = $row['title'];  
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

                ?>
                 <tr>  
              <td><?php echo $sn++; ?></td>
              <td><?php echo $title; ?></td>

              <td>
                <?php 
                 if($image_name!="")
                 {
                   ?>
                   <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                   <?php
                 }
                 else
                 {
                 echo "<div class='error'>Image not Added.</div>";
                 }
                 ?>
            </td>
              <td><?php echo $featured; ?></td>
              <td><?php echo $active; ?></td>
           <td>
              <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
              <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
              </td>
              
            </tr>

                <?php
              }
            }
            else
            {
              ?>
              <tr>
                <td colspan="6"><div class="error">No Category Added.</div></td>
              </tr>
              <?php
            }
            
            
            
            
            ?>
           
        </table>
</div>
</div>
<?php include('partials/footer.php');?>