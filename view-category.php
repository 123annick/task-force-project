<?php include("includes/header.php")?>
  
      <?php 
      if(isset($_GET['id'])){
                    $theid = $_GET['id'];
                    $select_query = mysqli_query($connection, "SELECT * FROM category WHERE id = $theid");
                    $row = mysqli_fetch_array($select_query);
                    $category_name = $row['category_name'];
        ?>
      <h1 class="h2"><?php echo $category_name?></h1>
      </div>

        <div class="row">
            <div class="col-md-6">
            <h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zM704 536c0 4.4-3.6 8-8 8H544v152c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8V544H328c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h152V328c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v152h152c4.4 0 8 3.6 8 8v48z"></path></svg>
                Add Sub-Category</h2>
                <hr>
            <?php
                if(isset($_POST['add_category'])){
                    $category_name = $_POST['category_name'];
                    $category_name = mysqli_real_escape_string($connection, $category_name); 
                    
                    $query = mysqli_query($connection, "INSERT INTO subcategory VALUES('', '$category_name', $theid, now())");

                    if($query){
                        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Sub-Category Created successfuly
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                    }
                }    
            ?>
            <form method="post">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Category:</label>
                    <input type="text" class="form-control mb-2" name="category_name" id="inlineFormInput" placeholder="Category name" required>
                    </div>
                    <div class="col-auto">
                        <input type="submit" name="add_category" class="btn btn-primary mb-2" value="+">
                    <!-- <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
                    </div>
                </div>
            </form>
            </div>
             <div class="col-md-6">
            <h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M912 192H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zM104 228a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0z"></path></svg> List</h4>
            <?php
            
            if(isset($_GET['delete'])){
                $delete = $_GET['delete'];
                $delete_query = mysqli_query($connection, "DELETE FROM subcategory WHERE id = $delete");

            if($delete_query){
                echo"<script>
                    setTimeout(function() {
                    window.location.href = 'view-category.php?id=$theid';
                    }, 1500);
                    </script>";
                        
                   
            ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Sub-Category Deleted
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
             }
            }
            ?>
            <hr>  
            <table class="table table-hover table-borders">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                        </tr>
                        <?php
                        $select_query = mysqli_query($connection, "SELECT * FROM subcategory WHERE main_category = $theid");
                        if(mysqli_num_rows($select_query)>0){
                        while($row = mysqli_fetch_array($select_query)){
                            $id = $row['id'];
                            $sub_category_name = $row['sub_category_name'];
                            $created_at = $row['created_at'];
                    ?>
                    <tr>
                        <td><?php echo $id ;?></td>
                        <td><?php echo $sub_category_name ;?></td>
                        <td><?php echo $created_at ;?></td>
                        <td><a href="view-category.php?id=<?php echo $theid?>&delete=<?php echo $id ?>" class="text-danger" onclick="return confirmDelete();"><span data-feather="trash"></span></a></td>
                    </tr>
                    <?php
                        }
                    }else{
                        echo"<tr><th colspan='4'>No sub category yet</th></tr>";
                    }
                        
                    ?>

            </table> 

        </div>
            </div><br>
      
      <?php }else{
        echo"<h2>You not are made to be here</h2>";
      } ?>
    </main>
  </div>
</div>


<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this record?");
}
</script>

<?php include"includes/footer.php";?>