<?php
 include_once '../../../Controller/Class/Validator.php';
 include_once '../../../Controller/Information/Department.php';
 include_once '../../../Controller/User/Admin.php';
 
 $admin = new Admin();
 $post_result = $admin->addInfo('department', 'tbl_department', $_POST);
 print_r($post_result);
 $dept_obj = $admin->readInfo('department', 'department_id, department', 'tbl_department', array('status','=','Active'));

 if(isset($_GET['department_id']))
 {
     if($admin->updateInfo('department', 'tbl_department', 
     array(
        'status' => 'Inactive'
     ), 
     array(
        'department_id', '=', $_GET['department_id']
     )))
     {
         echo "Info Successfully Updated!";
     }
 }



 $results = array();
 //Extract array data from array object $dept_obj and store to respective columns
 $array_dept    = array_column($dept_obj, 'department');
 $array_id      = array_column($dept_obj, 'department_id');

 $x=0;
 //Merge those two arrays
 foreach($array_id as $id)
 {
     $results[$id] = $array_dept[$x];
     $x++;
 }

 

?>

<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">
   
    <div class ="container"> 

        <!-- row -->
        <div class="row">

            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4 border border-secondary">
            
            <p class="h4 mb-4 text-center border-bottom">Active Departments</p>
            
            <?php if(empty($results)): ?>
                <div class="row border-bottom border-secondary justify-content-center p-1">No Departments Yet</div>
            <?php endif; ?>

            <?php foreach($results as $id => $dept): ?>
                
                <div class="row border-bottom border-secondary justify-content-center p-1"><?php echo $dept; ?> 
                    <button class="btn btn-warning btn-sm <?php echo $dept == 'Unassigned' ? 'd-none' : '' ?>" onclick="
                                                                            $('#deptId').val(<?php echo $id; ?>);
                                                                            $('#showChangeStatusModal').val(true);
                                                                            $('#changeStatusForm').submit();
                                                                            ">
                    Archive</button>
                </div>
            <?php endforeach; ?>
                <div class="row border-bottom border-secondary justify-content-center p-1"><a href="#" onClick="$('#add').css('display','block');">Add Department</a></div>
            </div>
                
                <!-- Hidden Form For Change Employee Status -->

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="changeStatusForm" method="GET">
                <input type="hidden" id="deptId" name="department_id">
                <input type="hidden" id="showChangeStatusModal" name="showChangeStatusModal">
                </form>

                <!-- Hidden Form For Change Employee Status -->

        </div> <!-- row -->

        <!-- row -->
        <div class="row" id="add" style="display:<?php echo isset($post_result['dept_name'])? 'block' : 'none'; ?>">

            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4 border border-secondary">
            
            <form class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
                <p class="h4 mb-4 text-center">Add Department</p>
                <div class="form-group">
                    <input type="text" class="form-control <?php echo (!empty( $post_result['dept_name'])) ? 'is-invalid' : '' ; ?>" 
                    name="dept_name" placeholder="Department Name" autocomplete="off">
                    <span class="invalid-feedback" ><?php echo $post_result['dept_name'] ?? '' ?></span>
                </div>
                <button type="submit" class="btn btn-info  btn-block" name="btn_addDepartment" >Submit</button>
            </form><!--Form Add Department -->
         
        </div> <!-- row -->

    </div><!-- container -->


<!-- Modals -->

<div class="modal fade" id="alertModal" role="dialog"><!--Alert Modal-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div id="message"class="modal-body bg-success text-white font-weight-bold">
                </div>
                <div class="modal-footer bg-success">
                <button type="button" class="btn btn-default text-white" data-dismiss="modal" onclick="location.reload()">Close</button>
                </div>
            </div>

        </div>
    </div><!--Alert Modal-->

<?php include_once '../../../Public/layouts/footer.php'; ?>
<script>
$(document).ready(function(){

    if($('#showChangeStatusModal').val === "true")
    {
        $('#message').html('Successfully Updated!');
        $("#alertModal").modal("show");
    }

})
</script>



