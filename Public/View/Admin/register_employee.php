<?php
require_once '../../../Controller/Class/Validator.php';

$validator = new Validator();

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

extract($fields);

        if (isset($_POST['btn_register'])) {

            $validation = $validator->checkInput($_POST, array(
                'first_name' => array(
                    'name' => 'First Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 30
                ),
                'middle_name' => array(
                    'name' => 'Middle Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 30
                ),
                'last_name' => array(
                    'name' => 'Last Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 30
                ),
                'gender' => array(
                    'name' => 'Gender',
                    'required' => true
                ),            
                'age' => array(
                    'name' => 'Age',
                    'required' => true
                ),         
                'address' => array(
                    'name' => 'Address',
                    'required' => true,
                    'min' => 10,
                    'max' => 50
                ),           
                'mobile_number' => array(
                    'name' => 'Mobile Number',
                    'required' => true
                ),                 
                'email' => array(
                    'name' => 'Email',
                    'required' => true
                )           
            )); 

            if($validation->passed()) {

                /* $execute_register['query_result'] =  parent::executeRegister($this->post);
            
                return $execute_register; */

                print_r($_POST);

            } else {
              
                $user_validation  =  $validation->errors(); 
                //print_r($validation->errors());
            } 

        }


//print_r($_POST);

?>

<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">
   
    <div class ="container"> 
        <!-- row -->
        <div class="row ">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
                <!-- form Register Employee -->
                <form class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

                    <p class="h4 mb-4 text-center">Register Employee</p>

                    <?php foreach ($placeholder as $key => $value): ?>

                        <?php if ($name[$key] == 'gender'): ?>

                             <div class="form-group ">
                                <select  name="<?php echo $name[$key]; ?>"  class="custom-select form-control <?php echo (!empty( $user_validation[$name[$key]])) ? 'is-invalid' : '' ; ?>" >
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select> 
                                <span class="invalid-feedback" ><?php echo $user_validation[$name[$key]] ?? '' ?></span>
                            </div>

                        <?php else: ?>

                        <div class="form-group">
                            <input type="text" class="form-control <?php echo (!empty( $user_validation[$name[$key]])) ? 'is-invalid' : '' ; ?>" 
                            name="<?php echo $name[$key]; ?>" placeholder="<?php echo $placeholder[$key]; ?>">
                            <span class="invalid-feedback" ><?php echo $user_validation[$name[$key]] ?? '' ?></span>
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
