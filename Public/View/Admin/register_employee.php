<?php

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

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><?php echo $placeholder[$key]; ?></label>
                                </div>
                                <select name="<?php echo $name[$key]; ?>" class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            
                        <?php else: ?>

                        <div class="form-group">
                            <input type="text" class="form-control" name="<?php echo $name[$key]; ?>" placeholder="<?php echo $placeholder[$key]; ?>">
                            <span class="invalid-feedback" ></span>
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
