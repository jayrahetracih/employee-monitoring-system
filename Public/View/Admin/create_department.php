<?php
 include_once '../../../Controller/Class/Validator.php';
 include_once '../../../Controller/Information/Department.php';

 $dept = new Department();

 if(isset($_POST['btn_add']))
 {
     if($dept->create())
     {
         echo 'success!';
     }
 }

?>



<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">
   
    <div class ="container"> 

        <!-- row -->
        <div class="row ">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
                <!-- form Add Department -->
                <form class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

                    <p class="h4 mb-4 text-center">Add Department</p>

                        <div class="form-group">
                            <input type="text" class="form-control" name="dept_name" placeholder="Department Name" autocomplete="off">
                            <span class="invalid-feedback" ></span>
                        </div>

                    <button type="submit" class="btn btn-info  btn-block" name="btn_add">Submit</button>

                </form><!-- Add Department -->
                
            </div>
         
        </div> <!-- row -->
    </div><!-- container -->

<?php include_once '../../../Public/layouts/footer.php'; ?>

  