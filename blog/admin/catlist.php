<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <?php
            if(isset($_GET['delcat'])){
               $delid = $_GET['delcat'];
               $delquery = "DELETE FROM tbl_category WHERE id = '$delid'";
               $deldata = $db->delete($delquery);
                if($deldata){
                    echo  "<span style = 'color:green'>Data Deleted Successfully</span>";
                    }else{
                   echo  "<span style = 'color:red'>Data Not Deleted Successfully</span>";
                    }
            }
        ?>
        <div class="block">        
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $query = "SELECT * FROM tbl_category ORDER BY ID DESC";
                        $category = $db->select($query);
                        if($category){
                            $i =0;
                            while ($result = $category->fetch_assoc()){
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['name']; ?></td>
                        <td>
                            <a href="editcat.php?catid=<?php echo $result['id'] ?>">Edit</a> || 
                            <a onclick="return confirm('are you sure to delete !');" href="?delcat=<?php echo $result['id'] ?>">Delete</a>
                        </td>
                    </tr>
                   <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>

    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
