<?php
require_once 'Core/Db.php';
require_once 'Controller/Employee.php';

$employee = new Employee();
$employee->display_awesome();

?>
<?php include 'View/layouts/header.php'; ?>



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

    
<?php include 'View/layouts/footer.php'; ?>