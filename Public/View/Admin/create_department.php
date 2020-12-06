<?php
 include_once '../../../Controller/Class/Validator.php';
 include_once '../../../Controller/Information/Department.php';
 

 $dept = new Department();

 if(isset($_POST['btn_add']))
 {
     $data = array();
     if($dept->create())
     {
        $data['success'] = true;
        $data['message'] = 'Success!';
        echo json_encode($data);
     }
     else
     {
        $data['success'] = true;
        $data['message'] = 'Failed!';
        echo json_encode($data);
     }
 }

?>




<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">


    <div class="modal fade" id="alertModal" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                <p id="error"></p>
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
                <!-- form Add Department -->
                <form class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

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

    // get the form data
    // there are many ways to get this data using jQuery (you can use the class or id also)
    var formData = {
        'dept_name'              : $('input[name=dept_name]').val(),
        'btn_add'             : $('input[name=btn_add]').val()
    };
    
    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'create_department.php', // the url where we want to POST
        data        : formData, // our data object
        success     : function(data){$('#alertModal').modal("show");},
        dataType    : 'json', // what type of data do we expect back from the server
                    encode          : true
    }).done(function(data) {
            console.log(formData);
            alert('AJAX successful');
            // log data to the console so we can see
            console.log(data);

            // here we will handle errors and validation messages
            if(data.success)
            {
                $('#alertModal').modal("show");
            }
            else
            {
                $('#alertModal').modal("show");
            }
        });  
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
});

});
</script>
  