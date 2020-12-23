<?php
require_once '../../../Controller/User/Admin.php';
require_once '../../../Controller/Class/Helpers.php';

$admin = new Admin();
$post_data = $admin->addInfo('employee',$_POST);

$option_values =  ['Gender'=>'','male'=>'male','female'=>'female'] ; 
$fields = array('name' => array(
                    'first_name',
                    'middle_name',
                    'last_name',
                    'gender',
                    'age',
                    'address',
                    'mobile_number',
                    'email'),
                'placeholder' => array(
                    'First Name',
                    'Middle Name',
                    'Last Name',
                    'Gender',
                    'Age',
                    'Address',
                    'Mobile Number',
                    'Email')
                );
$option_values =  ['Gender'=>'','male'=>'male','female'=>'female'] ; 

extract($fields);

?>

<?php include_once '../../../Public/layouts/header.php'; ?>
   
<div class="container-fluid">
  <div class="row">

     <?php include_once '../../../Public/layouts/sidebar.php'; ?>

    <div class="col-10">

            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto mt-5">
                <!-- form Register Employee -->
                <form class="justify-content-center border border-secondary p-4 " action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

                    <p class="h4 mb-4 text-center">Create Employee</p>

                    <?php echo (!is_array($post_data)) ? $post_data : '' ;?>

                    <?php foreach ($placeholder as $key => $value): ?>

                        <?php if ($name[$key] == 'gender'): ?>

                            <!-- Gender -->
                             <div class="form-group ">
                                <select  name="<?php echo $name[$key]; ?>"  class="custom-select form-control <?php echo (!empty($post_data[$name[$key]])) ? 'is-invalid' : '' ; ?>" >

                                    <?php foreach( $option_values as $option_key =>$option_value):  ?>

                                        <option value="<?php echo $option_value ?>"
                                            <?php if(isset($_POST[$name[$key]])){
                                                if ($_POST[$name[$key]] == $option_value) {
                                                    echo 'selected';
                                                }
                                            }?>>
                                            <?php echo $option_key ?>
                                        </option>

                                    <?php  endforeach; ?>
                                </select> 
                                <span class="invalid-feedback" ><?php echo $post_data[$name[$key]] ?? '' ?></span>
                            </div>

                        <?php else: ?>

                        <div class="form-group">
                            <input type="text" class="form-control <?php echo (!empty( $post_data[$name[$key]])) ? 'is-invalid' : '' ; ?>" 
                            name="<?php echo $name[$key]; ?>" placeholder="<?php echo $placeholder[$key]; ?>" 
                            value="<?php  echo Helpers::displayInput($name[$key]); ?>">
                            <span class="invalid-feedback" ><?php echo $post_data[$name[$key]] ?? '' ?></span>
                        </div>

                        <?php endif; ?>

                    <?php endforeach; ?>

                    <!-- Sign up button -->
                    <button type="submit" class="btn btn-info  btn-block" name="btn_register">Submit</button>

                </form><!-- Register Employee -->      
            </div> 

    </div>
  </div>
</div>

<?php include_once '../../../Public/layouts/footer.php'; ?>
