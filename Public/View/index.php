<?php
/* require_once '../../Controller/Information/Employee.php';
require_once '../../Controller/User/User.php';

$user = new User(); */
//$user->login();
?>
<?php include_once '../../Public/layouts/header.php'; ?>

<section id="cover">
<div class="main-container">
<div class ="container"> 
        <!-- row -->
        <div class="row ">
          
            <!-- form register -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

                <!-- <p class="h4 mb-4 text-center">Sign In</p> -->
            
                <?php  //echo $user_validation_alert ?? '' ?>
                <?php // echo $user_validation['query_result'] ?? '' ?>
                <img src="../../Public/resources/img/kubocoders.jpg" alt="kubocoders">

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


<?php include_once '../../Public/layouts/footer.php'; ?>