<?php include("includes/header.php")?>

<h1 class="h2">Accounts</h1>
<a href="accounts.php?new=1" class="btn btn-primary"><span data-feather="plus"></span> New Account</a>
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
      <div class="col-md-6">
      <?php
      if (isset($_GET['new'])) {
        ?>
<h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zM704 536c0 4.4-3.6 8-8 8H544v152c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8V544H328c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h152V328c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v152h152c4.4 0 8 3.6 8 8v48z"></path></svg>
                Add Account</h4>
            <?php
            
            if (isset($_POST['add_account'])) {
                $account_name = $_POST['account_name'];
                $account_name = mysqli_real_escape_string($connection, $account_name);
                
                $query = mysqli_query($connection, "INSERT INTO account VALUES('', '$account_name', now())");

            if($query){
                echo"<script>
                setTimeout(function() {
                window.location.href = 'accounts.php';
                }, 2000);
                </script>";
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Account Added successfuly
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
                }
            }    
        ?>
            <form method="post">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Account:</label>
                    <input type="text" class="form-control mb-2" name="account_name" id="inlineFormInput" placeholder="Account name" required>
                    </div>
                    <div class="col-auto">
                        <input type="submit" name="add_account" class="btn btn-primary mb-2" value="+">
                    <!-- <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
                    </div>
                </div>
            </form>
    <?php } ?>
    </div>
    <hr>
      <h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M912 192H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zM104 228a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0z"></path></svg> All Acounts</h4>
        <?php
        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            $delete_query = mysqli_query($connection, "DELETE FROM account WHERE id = $delete");
        
            if($delete_query){
                echo"<script>
                    setTimeout(function() {
                    window.location.href = 'accounts.php';
                    }, 2000);
                    </script>";  
            ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Account Deleted
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
            <th>Delete</th>
        </tr>
        <?php
        
        $select_query = mysqli_query($connection, "SELECT * FROM account ORDER BY id DESC");
            while($row = mysqli_fetch_array($select_query)){
                $id = $row['id'];
                $name = $row['account_name'];
                $created_at = $row['created_at'];
            ?>
            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $created_at; ?></td>
            <td><a href="accounts.php?delete=<?php echo $id; ?>" class="text-danger" onclick="return confirmDelete();"><span data-feather="trash"></span></a></td>
            </tr>
<?php   }  ?>
      </table>
    </main>
  </div>
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete This Account");
}
</script>
<?php include"includes/footer.php";?>