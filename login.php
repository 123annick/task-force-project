<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Force COA- Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">Login</h5>
            <p class="card-subtitle mb-2 text-muted">provide our secrete word</p>
            <?php
            
            if(isset($_POST['submit'])){

                
                $hash = "$2y$10\$o9b.ae2c/1KebX2Hb.2NEujOOwfIRIb.6WhqSKvM7qZ8JNsAIVMD6";
                
                if(password_verify($_POST['password'], $hash) && $_POST['email'] == "someone@mail.com"){
                    session_start();
                    $_SESSION['name'] = 'Eric';
                    header("Location: index.php");
                }else{
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Incorrect password Try again
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    
                }
            }
            
            ?>
                <form method="post"  class="needs-validation" novalidate>
                    <!-- Email input -->
                    <!-- <div class="form-outline mb-4">
                        <input type="email" id="form1Example1" class="form-control" />
                        <label class="form-label" for="form1Example1">Email address</label>
                    </div> -->

                    <!-- Password input -->
                    <div class="form-outline mb-4">

                    
                        <input type="email"  id="validationCustom01" name="email" placeholder="example@mail.com" class="form-control" required/> <br> 
                        <input type="password"  id="validationCustom01" name="password" placeholder="Password" class="form-control" required/>
                        <!-- <label class="form-label" for="validationCustom01">magic word</label> -->
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        
                        </div>

                        <div class="col">
                        <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
                    <!-- <button type="submit" class="btn btn-primary btn-block">Sign in</button> -->
                </form>
            </div>
    </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="assets/js/dashboard.js"></script>
<script>
   var forms = document.querySelectorAll('.needs-validation');
            
            Array.prototype.slice.call( forms ).forEach( function( form )
            {
                form.addEventListener( 'submit', function ( event )
                {
                    if ( !form.checkValidity( ) )
                    {
                        event.preventDefault( )
                        event.stopPropagation( );
                    }

                    form.classList.add( 'was-validated' );
              }, false );
            } );
</script>
</body>
</html>