<?php
/* require_once '../../Controller/Information/Employee.php';
require_once '../../Controller/User/User.php';

$user = new User();
$user->login();
 */
?>
<?php include_once '../../Public/layouts/header.php'; ?>

<section id="cover">
   
    <div class ="container"> 
        <!-- row -->
        <div class="row ">
          <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
            <!-- form register -->
            <form class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

                <p class="h4 mb-4 text-center">Sign In</p>
            
                <?php  //echo $user_validation_alert ?? '' ?>
                <?php // echo $user_validation['query_result'] ?? '' ?>
            
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
            <button type="submit" class="btn btn-info btn-block my-4" name="btn_login">Submit</button>

            </form>
            <!-- form login -->
          </div>
          <!-- row -->
        </div>
    </div><!-- container -->
    
</section>

   <!-- main container -->
    <div class="main-container">
            <!-- container -->
            <div class="container">
                <img src="View/resources/img/microsoft.png" alt="Placeholder image">
                <!-- Employee ID  -->
                <div class="form-group">
                    <label for="EmployeeId">Employee ID:</label>
                    <input type=text class="form-control" name="employeeId"  >
                </div>
                <!-- Password -->
                <div class="form-group"> 
                    <label for="Password">Password:</label>       
                    <input type=password class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block my-4" name="btn_login" >Login</button>   
                <a href=#>Forgot your password?</a>   
            </div><!-- container -->   
            <div class="img-container"></div>
    </div><!-- main container -->   


<?php include_once '../../Public/layouts/footer.php'; ?>