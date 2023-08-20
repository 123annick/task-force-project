
<div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Monthly Budget</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class=" mb-3">
                <label>Amount</label>
                <input type="number" name="budget" class="form-control" placeholder="10000000" required>
            </div>
        
      </div>
      <div class="modal-footer">
        <input type="submit" name="update-budget" class="btn btn-primary" value="Update">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var popup = document.getElementById("popup");
    var closeButton = document.getElementById("close-popup");

    popup.style.display = "flex";

    closeButton.addEventListener("click", function() {
        popup.style.display = "none";
    });
});

</script>
<script defer>
        document.addEventListener("DOMContentLoaded", function () {
    var popup = document.querySelector(".popup-overlay");
    var closeButton = document.getElementById("close-popup");

    closeButton.addEventListener("click", function () {
        popup.style.display = "none";
    });
});

    </script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="/assets/js/dashboard.js"></script>
</body>
</html>
