<?php
require_once '../../../Controller/User/Admin.php';

$admin = new Admin();
$post_result = $admin->addInfo('employee',$_POST);

$fields = array('name' => array(
                    'first_name',
                    'middle_name',
                    'last_name',
                    'gender',
                    'age',
                    'address',
                    'mobile_number',
                    'email',
                    'password'),
                'placeholder' => array(
                    'First Name',
                    'Middle Name',
                    'Last Name',
                    'Gender',
                    'Age',
                    'Address',
                    'Mobile Number',
                    'Email',
                    'Password')
                );

extract($fields);
if(is_array($post_result))
{
    foreach($post_result as $error)
    {
        $errors[$error['field']] = $error['message'];
        print_r($error);
        extract($error);
    }
    
}

?>

<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">

    <div class="sidebar">
        <a href="#home">Home</a>
        <button class="emp-btn">Employee
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="employee-dropdown-container">
            <a href="#">Register Employee</a>
            <a href="#">Edit Employee</a>
            <a href="#">Past Employee</a>
        </div>
        <a href="#department">Department</a>
        <a href="#attendance">Attendance</a>
        <a href="#leave">Leave</a>
        <a href="#attendance">Report</a>
        <a href="#leave">User Management</a>
    </div>

    <div class ="container"> 
        <!-- row -->
        <div class="row ">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
                <!-- form Register Employee -->
                <form class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

                    <p class="h4 mb-4 text-center">Register Employee</p>

                    <?php echo (!is_array($post_result)) ? $post_result : '' ;?>

                    <?php foreach ($placeholder as $key => $value): ?>

                        <?php if ($name[$key] == 'gender'): ?>

                            <!-- Gender -->
                             <div class="form-group ">
                                <select  name="<?php echo $name[$key]; ?>"  class="custom-select form-control <?php echo (!empty( $errors[$name[$key]])) ? 'is-invalid' : '' ; ?>" >
                                    <option value="">Gender</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select> 
                                <span class="invalid-feedback" ><?php echo $Gender ?? '' ?></span>
                            </div>

                        <?php elseif ($name[$key] == 'password'): ?>

                                <!-- Password -->
                                 <div class="form-group">
                                    <input type="password" class="form-control <?php echo (!empty( $errors[$name[$key]])) ? 'is-invalid' : '' ; ?>" 
                                    name="<?php echo $name[$key]; ?>" placeholder="<?php echo $placeholder[$key]; ?>">
                                    <span class="invalid-feedback" ><?php echo $errors[$name[$key]] ?? '' ?></span>
                                </div>

                        <?php else: ?>

                        <div class="form-group">
                            <input type="text" class="form-control <?php echo (!empty( $errors[$name[$key]])) ? 'is-invalid' : '' ; ?>" 
                            name="<?php echo $name[$key]; ?>" placeholder="<?php echo $placeholder[$key]; ?>">
                            <span class="invalid-feedback" ><?php echo $errors[$name[$key]] ?? '' ?></span>
                        </div>

                        <?php endif; ?>

                    <?php endforeach; ?>

                    <!-- Sign up button -->
                    <button type="submit" class="btn btn-info  btn-block" name="btn_register">Submit</button>

                </form><!-- Register Employee -->
                
            </div>
         
        </div> <!-- row -->
    </div><!-- container -->
    
</section>

<?php include_once '../../../Public/layouts/footer.php'; ?>