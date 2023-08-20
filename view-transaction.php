<?php include("includes/header.php")?>
  
      <?php 
      if(isset($_GET['view'])){
                    $theid = $_GET['view'];
                    $select_query = mysqli_query($connection, "SELECT * FROM transaction WHERE id = $theid");
                    $row = mysqli_fetch_array($select_query);

                    $id = $row['id'];
                    $payment_by = $row['payment_by'];
                    $sub_category_id = $row['sub_category_id'];

                    $select_all_query = mysqli_query($connection, "SELECT transaction.id, transaction.name, transaction.type, transaction.payment_by, transaction.sub_category_id, transaction.date, transaction.total_paid, transaction.description, subcategory.id, subcategory.sub_category_name, subcategory.main_category, subcategory.created_at, account.id, account.account_name, account.created_at, category.category_name FROM transaction, subcategory, account, category WHERE transaction.id = $id AND subcategory.id = $sub_category_id AND account.id = $payment_by AND category.id = subcategory.main_category;");
                    $data = mysqli_fetch_array($select_all_query);

                    $id = $data['id'];
                    $name = $data['name'];
                    $type = $data['type'];
                    $payment_by = $data['payment_by'];
                    $sub_category_id = $data['sub_category_id'];
                    $date = $data['date'];
                    $total_paid = $data['total_paid'];
                    $description = $data['description'];
                    $sub_category_name = $data['sub_category_name'];
                    $account_name = $data['account_name'];
                    $main_category = $data['main_category'];
                    $created_at = $data['created_at'];
                    $category_name = $data['category_name'];
                    
        ?>
      <h1 class="h2"><?php echo $name?></h1>
      </div>

    <h4>Details</h4>
      <div>
        <ul>
            <li><b>Trancaction type: </b><span class="badge bg-primary"><?php echo $type; ?></span></li>
            <li><b>Trancaction type: </b><span class="badge bg-primary"><?php echo $account_name; ?></span></li>
            <li><b>Exepence Category: </b><span class="badge bg-primary"><?php echo $category_name; ?></span></li>
            <li><b>Exepence Sub-Category: </b><span class="badge bg-primary"><?php echo $sub_category_name; ?></span></li>
            <li><b>Done On: </b><span class="badge bg-primary"><?php echo $date; ?></span></li>
            <li><b>Amount: </b><span class="badge bg-primary"><?php echo $total_paid; ?>Frw</span></li>
            <b>Description:</b> <p> <?php echo $description; ?></p>
        </ul>
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