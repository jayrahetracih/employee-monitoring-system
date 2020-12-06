<?php
 include_once '../../../Controller/Class/Validator.php';
 include_once '../../../Controller/Information/Department.php';
 

 $dept = new Department();

 $dept_obj = $dept->read('department', 'department', array('department_status','=','Active'));
 
?>




<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">


    <div class="modal fade" id="alertModal" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                <p id="message"></p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
   
    <div class ="container"> 

        <!-- row -->
        <div class="row ">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
                
            <?php foreach($dept_obj as $obj): ?>
                
                    <?php foreach($obj as $arr => $value): ?>
                    
                        <div class="row-lg border border-secondary justify-content-center p-1"><?php echo $value ?? ''; ?></div>

                    <?php endforeach;?>
                
            <?php endforeach; ?>
            </div>
         
        </div> <!-- row -->

        <!-- row -->
        <div class="row ">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
                <!-- form Add Department -->
                <form id="frm" class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

                    <p class="h4 mb-4 text-center">Add Department</p>

                        <div class="form-group">
                            <input type="text" class="form-control" name="dept_name" placeholder="Department Name" autocomplete="off">
                            <span class="invalid-feedback" ></span>
                        </div>

                    <input type="submit" class="btn btn-info  btn-block" name="btn_add" value="Submit">

                </form><!-- Add Department -->
                
            </div>
         
        </div> <!-- row -->
    </div><!-- container -->

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
        dataType    : 'json',
        data        : $("#frm").serialize(), // our data object
        success     : function(data)
        {
            console.log(data);
            $("#message").html(data.message);
            $("#alertModal").modal("show");
        }
    });

});

});
</script>
  