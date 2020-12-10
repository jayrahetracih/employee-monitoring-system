<?php
 include_once '../../../Controller/Class/Validator.php';
 include_once '../../../Controller/Information/Department.php';
 include_once '../../../Controller/User/Admin.php';
 
 $admin = new Admin();
 $post_result = $admin->addInfo('department', 'tbl_department', $_POST);
 

 if(isset($_GET['department_id']))
 {
     $admin->updateInfo('department', 'tbl_department', 
     array(
        'status' => 'Inactive'
     ), 
     array(
        'department_id', '=', $_GET['department_id']
     ));
 }





 

?>

<?php include_once '../../../Public/layouts/header.php'; ?>

<section id="cover">
   
    <div class ="container"> 

    <table class="table table-striped table-bordered">
    <thead>
      <tr class="d-flex">
        <th class="col-8">Department Name</th>
        <th class="col-4"> Archive</th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($results)): ?>
                <tr class="d-flex">
                    <td class="col-12">No Departments Yet</td>
                </tr>
            <?php endif; ?>

            <?php foreach($results as $id => $dept): ?>
                
                <tr class="d-flex" >
                    <td class="col-<?php echo $dept == 'Unassigned' ? '12' : '8' ?>"><?php echo $dept; ?></td>
                    <td class="col-4"><button class="btn btn-warning btn-sm <?php echo $dept == 'Unassigned' ? 'd-none' : '' ?>" onclick="
                                                                            $('#deptId').val(<?php echo $id; ?>);
                                                                            $('#Modal').val(true);
                                                                            $('#message').append('<?php echo $dept; ?> Updated');
                                                                            $('#changeStatusForm').submit();
                                                                            ">
                    Archive</button></td>
                </tr>
            <?php endforeach; ?>
                <tr class="d-flex">
                    <td class="col-12"><a href="#" onClick="$('#add').toggleClass('d-none');">Add Department</a></td>
                </tr>
                <tr class="d-none" id="add">
                    <td class="col-12">
                        <form class="justify-content-center border border-secondary p-5 mt-5 form-color" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
                        <p class="h4 mb-4 text-center">Add Department</p>
                        <div class="form-group">
                            <input type="text" class="form-control <?php echo (!empty( $post_result['dept_name'])) ? 'is-invalid' : '' ; ?>" 
                            name="dept_name" placeholder="Department Name" autocomplete="off">
                            <span class="invalid-feedback" ><?php echo $post_result['dept_name'] ?? '' ?></span>
                        </div>
                        <button type="submit" class="btn btn-info  btn-block" name="btn_addDepartment" >Submit</button>
                        </form><!--Form Add Department -->
                    </td>
                </tr>
    </tbody>
  </table>
                <!-- Hidden Form For Change Employee Status -->

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="changeStatusForm" method="GET">
                <input type="hidden" id="deptId" name="department_id">
                <input type="hidden" id="Modal" name="Modal">
                </form>

                <!-- Hidden Form For Change Employee Status -->
                
    </div><!-- container -->


<!-- Modals -->

<div class="modal fade" id="alertModal" role="dialog"><!--Alert Modal-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div id="message"class="modal-body bg-success text-white font-weight-bold">
                </div>
                <div class="modal-footer bg-success">
                <button type="button" class="btn btn-default text-white" data-dismiss="modal" onclick="location.header('create_department.php');">Close</button>
                </div>
            </div>

        </div>
    </div><!--Alert Modal-->

<?php include_once '../../../Public/layouts/footer.php'; ?>
<script>
$(document).ready(function(){

    var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    };

    var modal = $.trim(getUrlParameter('Modal')); 
    console.log(modal);
    if(modal == "true")
    {
        $("#alertModal").modal("show");
    }

})
</script>



