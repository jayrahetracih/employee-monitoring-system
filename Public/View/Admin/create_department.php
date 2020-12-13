<?php
 include_once '../../../Controller/User/Admin.php';
 
 $admin = new Admin();
 $post_result = $admin->addInfo('department', $_POST);
 $read_result = $admin->readInfo('department'); 

?>

<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">
   
    <div class ="container"> 

    <table class="table table-striped table-bordered">
    <thead>
      <tr class="d-flex">
        <th class="col-10">Department Name</th>
        <th class="col-2"> Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($read_result)): ?>
                <tr class="d-flex">
                    <td class="col-12">No Departments Yet</td>
                </tr>
            <?php endif; ?>

            <?php foreach($read_result as $value): ?>
                
                <tr class="d-flex" >
                    <td class="col-<?php echo $value['department'] == 'Unassigned' ? '12' : '10' ?> edit" id="<?php echo $value['department_id']; ?>"><?php echo $value['department']; ?></td>
                    <?php if($value['department'] != 'Unassigned'): ?>
                    <td class="col-2 btn btn-primary btn-sm dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" onClick="$('#<?php echo $value['department_id']; ?>').attr('contenteditable', 'true');$('#<?php echo $value['department_id']; ?>').focus();">Rename</a>
                            <a class="dropdown-item archive" href="#" id="<?php echo $value['department_id']; ?>">Archive
                            </a>
                        </div>
                    
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
                <tr class="d-flex">
                    <td class="col-12 btn btn-outline-primary" style="cursor:pointer" onClick="$('#add').toggleClass('d-none');">Add Department</td>
                </tr>
                <tr class="<?php echo (empty( $post_result['dept_name'])) ? 'd-none' : '' ; ?> bg-white" id="add">
                    <td class="col-12">
                        <form class="justify-content-center p-4 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
                        <!-- <p class="h4 mb-4 text-center">Add Department</p> -->
                        <div class="form-group">
                            <input type="text" class="form-control <?php echo (!empty( $post_result['dept_name'])) ? 'is-invalid' : '' ; ?>" 
                            name="dept_name" placeholder="Department Name" autocomplete="off">
                            <span class="invalid-feedback" ><?php echo $post_result['dept_name'] ?? '' ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary  btn-block" name="btn_addDepartment" >Submit</button>
                        </form><!--Form Add Department -->
                    </td>
                </tr>
    </tbody>
  </table>
                
    </div><!-- container -->


<!-- Modals -->

<div class="modal fade" id="alertModal" role="dialog"><!--Alert Modal-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div id="message"class="modal-body font-weight-bold">
                <?php echo $post_result['alert_message']?? ''; ?>
                <?php echo $update_result['alert_message']?? ''; ?>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="document.location.href = 'create_department.php';">Close</button>
                </div>
            </div>

        </div>
    </div><!--Alert Modal-->

<?php include_once '../../../Public/layouts/footer.php'; ?>
<script>
   $('.edit').on('keydown', function(event) {
        
        switch(event.keyCode){
           case 13:
            event.preventDefault();
            var formData = { 
                'set_fields'        :   'department',
                'set_values'        :   $(this).text(),
                'condition_field'   :   'department_id',
                'operator'          :   '=',
                'condition_value'   :   $(this).attr('id')
            };
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : '../../../Controller/Handler/Department_handler.php', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                            encode          : true,
                success     : function(data){console.log(data);},
                error       : function(data){console.log(data);}
            }).done(function(data) {

                // log data to the console so we can see
                console.log(data);
                var res = (data['success'] === false ? data['errors'] : data['message']);
                
                $('#message').text(res);
                $('#alertModal').modal('show');

                // here we will handle errors and validation messages
            });
    
           break;
        }
     });

     $('.archive').on('click', function()
     {
        var formData = { 
                'set_fields'        :   'status',
                'set_values'        :   'Inactive' ,
                'condition_field'   :   'department_id',
                'operator'          :   '=',
                'condition_value'   :   $(this).attr('id')
            };
            console.log(formData);
        $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : '../../../Controller/Handler/Department_handler.php', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                            encode          : true,
                success     : function(data){console.log(data);},
                error       : function(data){console.log(data);}
            }).done(function(data) {

                // log data to the console so we can see
                console.log(data);
                var res = (data['success'] === false ? data['errors'] : data['message']);
                
                $('#message').text(res);
                $('#alertModal').modal('show');

                // here we will handle errors and validation messages
            });

     });
</script>

