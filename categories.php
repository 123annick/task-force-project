<?php include("includes/header.php")?>

        <h1 class="h2">Categories</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div> -->
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
        <div class="row">
            <div class="col-md-6">
            <h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zM704 536c0 4.4-3.6 8-8 8H544v152c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8V544H328c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h152V328c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v152h152c4.4 0 8 3.6 8 8v48z"></path></svg>
                Add Category</h2>
                <hr>
            <?php
                if(isset($_POST['add_category'])){
                    $category_name = $_POST['category_name'];
                    $category_name = mysqli_real_escape_string($connection, $category_name); 
                    
                    $query = mysqli_query($connection, "INSERT INTO category VALUES('', '$category_name', now())");

                    if($query){
                        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Category Added successfuly
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
            <!-- <div class="col-md-6">
            <?php
                if(isset($_GET['theid'])){
                    $id = $_GET['theid'];
                    $select_query = mysqli_query($connection, "SELECT * FROM category WHERE id = $id");
                    $row = mysqli_fetch_array($select_query);
                    $category_name = $row['category_name'];
            ?>
            <h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M13 7L11 7 11 11 7 11 7 13 11 13 11 17 13 17 13 13 17 13 17 11 13 11z"></path><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z"></path></svg>
                Add Sub-Category for <?php echo $category_name; ?></h2>
                <hr>
            <?php
                
                if(isset($_POST['add_sub_category'])){
                    $category_name = $_POST['category_name'];
                    $category_name = mysqli_real_escape_string($connection, $category_name); 
                    
                    $query = mysqli_query($connection, "INSERT INTO subcategory VALUES('', '$category_name', $id, now())");

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
                    <label class="sr-only" for="inlineFormInput">Sub-Category:</label>
                    <input type="text" class="form-control mb-2" name="category_name" id="inlineFormInput" placeholder="Category name">
                    </div>
                    <div class="col-auto">
                        <input type="submit" name="add_sub_category" class="btn btn-primary mb-2" value="+">
                    <!-- <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
                    </div>
                </div>
            </form>
            <?php } ?>
            </div> -->
        </div><br>
      <div class="row">
      <h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M912 192H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zM104 228a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0z"></path></svg>
                All Categories</h2>
                <?php
            
            if(isset($_GET['delete'])){
                $delete = $_GET['delete'];
                $delete_query = mysqli_query($connection, "DELETE FROM category WHERE id = $delete");
                $delete_sub_query = mysqli_query($connection, "DELETE FROM subcategory WHERE main_category = $delete");

            if($delete_query){
                echo"<script>
                    setTimeout(function() {
                    window.location.href = 'categories.php';
                    }, 1500);
                    </script>";  
            ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Category Deleted
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
             }
            }
            ?>
                <table class="table table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php
                        $select_query = mysqli_query($connection, "SELECT * FROM category ORDER BY id DESC");
                        while($row = mysqli_fetch_array($select_query)){
                            $id = $row['id'];
                            $category = $row['category_name'];
                            $created_at = $row['created_at'];
                    ?>
                    <tr>
                        <td><?php echo $id ;?></td>
                        <td><?php echo $category ;?></td>
                        <td><?php echo $created_at ;?></td>
                        <!-- <td><a href="categories.php?theid=<?php echo $id; ?>" class=""><span data-feather="list"></span>All-Sub-Categories</a></td> -->
                        <td><a href="view-category.php?id=<?php echo $id?>" class="plus-cat text-info" ><span data-feather="eye"></span>View</a></td>
                        <td><a href="categories.php?delete=<?php echo $id; ?>" class="text-danger"><span data-feather="trash" onclick="return confirmDelete();"></span></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <div class="bd-example tooltip-demo">
                
                </div>
      </div>
    </main>
  </div>
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete This Categroy. Becouse if you do it will delete it's all sub-categories!!");
}
</script>

<?php include"includes/footer.php";?>