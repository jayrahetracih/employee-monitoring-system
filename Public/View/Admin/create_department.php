<?php
 include_once '../../../Controller/Class/Validator.php';
 include_once '../../../Controller/Information/Department.php';
 

 $dept = new Department();

 $dept_obj = $dept->read('department', 'department', array('department_status','=','Active'));

?>


<link href="css/simple-sidebar.css" rel="stylesheet">
<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">
   
    <div class ="container"> 

        <!-- row -->
        <div class="row">

            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4 border border-secondary">
            
            <p class="h4 mb-4 text-center border-bottom">Active Departments</p>
            
            <?php if(empty($dept_obj)): ?>
                <div class="row border-bottom border-secondary justify-content-center p-1">No Departments Yet</div>
            <?php endif; ?>

            <?php foreach($dept_obj as $obj => $value): ?>
                
                <div class="row border-bottom border-secondary justify-content-center p-1"><?php echo $value; ?></div>

            <?php endforeach; ?>
                <div class="row border-bottom border-secondary justify-content-center p-1"><a href="#" onClick="$('#addDepartmentModal').modal('show');">Add Department</a></div>
            </div>
         
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

    <div class="modal fade" id="addDepartmentModal" role="dialog"><!--Add Department Modal-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Form Add Department -->
                    <form id="frm" class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
                        <p class="h4 mb-4 text-center">Add Department</p>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dept_name" placeholder="Department Name" autocomplete="off">
                            <span class="invalid-feedback" ></span>
                        </div>
                        <input type="submit" class="btn btn-info  btn-block" name="btn_add" value="Submit" onClick="$('#addDepartmentModal').modal('hide');">
                    </form><!--Form Add Department -->
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div><!--Add Department Modal-->



<?php include_once '../../../Public/layouts/footer.php'; ?>
<script>
$(document).ready(function() {

// process the form
$('form').submit(function(event) {
    event.preventDefault();
    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'Process_Department.php', // the url where we want to POST
        dataType    : 'json', // define data type
        data        : $("#frm").serialize(), // our data object
        success     : function(data) //execute this function if success
        {
            console.log(data);
            $("#message").html(data.message);
            $("#alertModal").modal("show");
        }
    });

});

});
</script>


