<?php include("includes/header.php")?>

<h1 class="h2">Transactions</h1>
<a href="transaction.php?new=1" class="btn btn-primary"><span data-feather="plus"></span> Record Transaction</a>
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
      <?php
      if (isset($_GET['new'])) {
        ?>
            
            <h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zM704 536c0 4.4-3.6 8-8 8H544v152c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8V544H328c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h152V328c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v152h152c4.4 0 8 3.6 8 8v48z"></path></svg>Record Transaction</h4>

            <?php
                if(isset($_POST['add_transaction'])){   
                    $name = $_POST['name'];
                    $type = $_POST['type'];
                    $payment_by = $_POST['payment_by'];
                    $sub_category_id = $_POST['sub_category_id'];
                    $total_paid = $_POST['total_paid'];
                    $description = $_POST['description'];

                    if($type == "in"){
                        $new_budget = $_SESSION['balance'] + $_POST['total_paid'];
    
                    }else if($type == "out"){
                        $new_budget = $_SESSION['balance'] - $_POST['total_paid'];
                    }
            $transaction_query = mysqli_query($connection, "INSERT INTO transaction VALUES ('', '$name', '$type', '$payment_by', '$sub_category_id', NOW(), $total_paid, '$description')");
            $update_balance_query = mysqli_query($connection, "UPDATE budget SET budget = $new_budget WHERE month_year = date_format(now(), '%Y-%m')");            

        if($transaction_query){
                echo"<script>
                    setTimeout(function() {
                    window.location.href = 'transaction.php';
                    }, 2000);
                    </script>";  
            ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Transaction recorded. I updated your Balance too.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
             }
            }
            ?>
            <form method="post">
            <div class="row">
                <div class="col-md-6">
                        <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Transaction Title:</label>
                        <input type="text" class="form-control mb-2" name="name" id="inlineFormInput" placeholder="Account name">
                        </div>
                        <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Type:</label>
                        <select name="type" class="form-control md-2" id="">
                            <option value="out">--SELECT TYPE --</option>
                            <option value="in">In</option>
                            <option value="out">Out</option>
                        </select>
                        </div>
                        <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Total:</label>
                        <input type="number" class="form-control mb-2" name="total_paid" id="inlineFormInput" placeholder="Total Amount">
                        </div>
                        <div class="col-auto">
                            <input type="submit" name="add_transaction" class="btn btn-primary mb-2" value="+">
                        <!-- <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Account used:</label>
                        <select name="payment_by" class="form-control md-2" id="" required>
                            <option value="">--SELECT ACCOUNT --</option>
                            <?php
            
                                $select_query = mysqli_query($connection, "SELECT * FROM account ORDER BY id DESC");
                                    while($row = mysqli_fetch_array($select_query)){
                                        $id = $row['id'];
                                        $name = $row['account_name'];
                                        $created_at = $row['created_at'];
                                    ?>
                            <option value="<?php echo $id?>"><?php echo $name?></option>
                            <?php   }  ?>
                        </select>
                        </div>
                        <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Sub Category:</label>
                        <select name="sub_category_id" class="form-control md-2" id="" required>
                            <option value="">--SELECT CATEGORY --</option>
                            <?php
            
                                $select_query = mysqli_query($connection, "SELECT * FROM SUBCATEGORY ORDER BY id DESC");
                                    while($row = mysqli_fetch_array($select_query)){
                                        $id = $row['id'];
                                        $sub_category_name = $row['sub_category_name'];
                                        $main_category = $row['main_category'];
                                        $created_at = $row['created_at'];
                                    ?>
                            <option value="<?php echo $id?>"><?php echo $sub_category_name?></option>
                            <?php   }  ?>
                        </select>
                        </div>
                        <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Description:</label>
                            <textarea name="description" class="form-control" id="" cols="3" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </form>
    <?php } ?>
    <hr>


      <h4><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M912 192H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zM104 228a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0z"></path></svg> All Transactions</h4>

      <table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>I/O</th>
            <th>Total</th>
            <th>Date</th>
            <!-- <th>Delete</th> -->
        </tr>
        <?php
        
        $select_query = mysqli_query($connection, "SELECT * FROM transaction ORDER BY date DESC");
            while($row = mysqli_fetch_array($select_query)){
                $id = $row['id'];
                $name = $row['name'];
                $type = $row['type'];
                $date = $row['date'];
                $payment_by = $row['payment_by'];
                $sub_category_id = $row['sub_category_id'];
                $total_paid = $row['total_paid'];
                $description = $row['description'];
            ?>
            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $sub_category_id; ?></td>
            <td><?php echo $total_paid; ?></td>
            <td><?php echo $date; ?></td>
            <td><a href="view-transaction.php?view=<?php echo $id; ?>"><span data-feather="eye"></span>View</a></td>
            <!-- <td><a href="accounts.php?delete=<?php echo $id; ?>" class="text-danger" onclick="return confirmDelete();"><span data-feather="trash"></span></a></td> -->
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