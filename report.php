<?php include("includes/header.php")?>

<h1 class="h2">Report</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar">
            This week
          </button>
        </div> -->
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <h2>Make your Choice</h2>
      <form>
  <div class="row">
    <form action="" method="get">
    <div class="col">
    <select name="period" class="form-control md-2" id="" required>
                            <option value="">--SELECT A PERIOD --</option>
                            <?php
            
                                $select_query = mysqli_query($connection, "SELECT * FROM budget ORDER BY month_year DESC");
                                    while($row = mysqli_fetch_array($select_query)){
                                        $id = $row['id'];
                                        $month_year = $row['month_year'];
                                        $budget = $row['budget'];
                                        // $_SESSION['choosen_period_balance'] = $budget;
                                        // $_SESSION['month_year'] = $month_year;
                                    ?>
                            <option value="<?php echo $id?>"><?php echo $month_year?></option>
                            <?php   }  ?>
                        </select>
    </div>
    
    <div class="col">
      <input type="submit" class="btn btn-primary" placeholder="Last name">
    </div>
    </form>
  </div>
</form><hr>
        <?php

        if(isset($_GET['period'])){
            $period = $_GET['period'];
            $select_query = mysqli_query($connection, "SELECT * FROM budget WHERE id = $period");
            $row = mysqli_fetch_array($select_query);
                $id = $row['id'];
                $month_year = $row['month_year'];
                $budget = $row['budget'];

        
        ?>
        <h2 class="text-center" style="font-family: 'Times New Roman';">Expence Report of <?php echo $month_year; ?></h2><br>
            <?php
                $total_spent = 0;
                $final_query = mysqli_query($connection, " SELECT * FROM budget JOIN transaction ON DATE_FORMAT(date, '%Y-%m') = '$month_year' JOIN account ON transaction.payment_by = account.id JOIN subcategory ON transaction.sub_category_id = subcategory.id JOIN category ON category.id = subcategory.main_category WHERE budget.month_year = '$month_year';");
                while($final = mysqli_fetch_array($final_query)){
                    $id = $final['id'];
                    $month_year = $final['month_year'];
                    $budget = $final['budget'];
                    $name = $final['name'];
                    $type = $final['type'];
                    $date = $final['date'];
                    $account_name = $final['account_name'];
                    $total_paid = $final['total_paid'];
                    $description = $final['description'];
                    $sub_category_name = $final['sub_category_name'];
                    $category_name = $final['category_name'];
                ?>

                    <div id="contentToPrint" class="text-left"  style="font-family: 'Times New Roman';">
                        <?php if($type =='in'){ 
                            
                            $total_spent += $total_paid; 

                            ?>

                        
                        <h5><?php echo $name; ?></h5>
                        Transaction: <?php echo $type; ?>
                        on <?php echo $date; ?>,
                        Paid: <?php echo $total_paid; ?>Frw 
                        On: <?php echo $sub_category_name; ?>Frw 
                        Of: <?php echo $category_name; ?>Frw 
                        Using: <?php echo $account_name; ?>Frw Account <br>
                        <p><b>Descriptions:</b> <?php echo $description; ?></p>

                    <?php }else if($type =='out'){ 
                        $total_spent -= $total_paid; 

                        ?>

                        <h5><?php echo $name; ?></h5>
                        Transaction: <?php echo $type; ?>
                        on <?php echo $date; ?>,
                        Paid: <?php echo $total_paid; ?>Frw 
                        On: <?php echo $sub_category_name; ?>Frw 
                        Of: <?php echo $category_name; ?>Frw
                        Using: <?php echo $account_name; ?>Frw Account <br>
                        <p><b>Descriptions:</b> <?php echo $description; ?></p>

                    <?php } ?>
                    </div>
                    <hr>
                <?php }    ?>
                <h3 class="h3"  style="font-family: 'Times New Roman';">Total Spent: <?php echo $total_spent; ?>Frw</h3>
      <?php } ?>
    </main>
  </div>
</div>
<script>
    const printButton = document.getElementById("printButton");
const contentToPrint = document.getElementById("contentToPrint");

printButton.addEventListener("click", () => {
    // Hide other content that you don't want to print (if needed)
    // ...

    // Print the specific content
    window.print();

    // Show the hidden content again (if needed)
    // ...
});

</script>
<?php include"includes/footer.php"; ?>