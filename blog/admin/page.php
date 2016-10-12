﻿<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<style>
    
    
.actiondel > a {
    background: #ddd none repeat scroll 0 0;
    font-size: 16px;
    font-weight: normal;
    padding: 8px 20px;
}
</style>
<?php 
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
      
    }
    else {
      $id = $_GET['pageid'];
    }

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Page</h2>
                <?php
                
                 if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = mysqli_real_escape_string($db->link, $_POST['name']);
                    $body = mysqli_real_escape_string($db->link, $_POST['body']);
                    
                    
                    if($name == "" || $body == ""){
                        echo  "<span style = 'color:red'>Filed Must Not Be Empty... !!</span>";
                    }
                     else{
                         
                    $query = "UPDATE tbl_page
                                  SET
                                  name = '$name',
                                  body = '$body'
                                  WHERE id = '$id'";
                        $updated_row = $db->update($query);
                    if ($updated_row) {
                        echo "<span class='success'>Page Updated Successfully.</span>";
                   }else {
                        echo "<span class='error'>Page Not Updated !</span>";
                   }
                   }
                    
                 }
                ?>
                <div class="block">
                    <?php
                        $pagequery = "SELECT * FROM tbl_page where id = '$id'";
                        $page = $db->select($pagequery);
                        if($page){
                            while ($result = $page->fetch_assoc()){
                     ?>
                    <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
                                    <?php echo $result['body']; ?>
                                </textarea>
                            </td>
                        </tr>
                        
                        
			<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                
                                <span class="actiondel"><a onclick="return confirm('are you sure to delete !');" href="deletepage.php?delpage=<?php echo $result['id'] ?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                        <?php } } ?>
                </div>
            </div>
        </div>
         <?php include 'inc/footer.php' ?>

<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    <!-- /TinyMCE -->
