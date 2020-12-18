<?php
require_once '../../Controller/User/User.php';

$user = new User($_POST);
$user_validation  = $user->login();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"  href="../resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/login.css">
    <title>Employee Monitoring System</title>
  </head>

  <body>

    <section id="cover">
      <div class="main-container">
      <div class ="container"> 
              <!-- row -->
              <div class="row ">
                
                <!-- form register -->
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

                  <img src="../../Public/resources/img/kubocoders.jpg" alt="kubocoders">

                  <?php echo (!is_array($user_validation)) ? $user_validation : '' ;?>

                  <!-- Email -->
                  <div class="form-group ">
                    <input type="text" class="form-control <?php  echo (!empty($user_validation['tb_id_number'])) ? 'is-invalid' : ''; ?>" 
                    name="tb_id_number" placeholder="ID Number" 
                    value ="<?php echo  (isset($_POST['tb_id_number'])) ? htmlspecialchars($_POST['tb_id_number']) : '' ?>">
                    <span class="invalid-feedback" ><?php echo $user_validation['tb_id_number'] ?? '' ?></span>
                  </div>

                  <!-- Password -->
                  <div class="form-group ">
                    <input type="password" class="form-control <?php  echo (!empty($user_validation['tb_password'])) ? 'is-invalid' : ''; ?>" 
                    name="tb_password" placeholder="Password" >
                    <span class="invalid-feedback" ><?php echo $user_validation['tb_password'] ?? '' ?></span>
                  </div>
                  <!-- Sign in button -->
                  <button type="submit" class="btn btn-primary btn-block my-4" name="btn_login">Submit</button>
                  <a href="#">Forgot your password?</a>
                </form>
                  <!-- form login -->
              
                <!-- row -->
              </div>
          </div><!-- container -->
          <div class="img-container"></div>
      </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>