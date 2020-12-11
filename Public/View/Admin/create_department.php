<?php
 include_once '../../../Controller/Class/Validator.php';
 include_once '../../../Controller/Information/Department.php';
 include_once '../../../Controller/User/Admin.php';
 
 $admin = new Admin();
 $post_result = $admin->addInfo('department', $_POST);
 $read_result = $admin->readInfo('department');
 
 if(isset($_GET['department_id']))
 {
     $admin->updateInfo('department', $_GET['department_id']);
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
      <?php if(empty($read_result)): ?>
                <tr class="d-flex">
                    <td class="col-12">No Departments Yet</td>
                </tr>
            <?php endif; ?>

            <?php foreach($read_result as $value): ?>
                
                <tr class="d-flex" >
                    <td class="col-<?php echo $value['department'] == 'Unassigned' ? '12' : '8' ?>"><?php echo $value['department']; ?></td>
                    <td class="col-4"><button class="btn btn-warning btn-sm <?php echo $value['department'] == 'Unassigned' ? 'd-none' : ''; ?>" onclick="
                                                                            $('#deptId').val(<?php echo $value['department_id']; ?>);
                                                                            $('#Modal').val(true);
                                                                            $('#message').append('<?php echo $value['department']; ?> Updated');
                                                                            $('#changeStatusForm').submit();
                                                                            ">
                    Archive</button></td>
                </tr>
            <?php endforeach; ?>
                <tr class="d-flex">
                    <td class="col-12"><a href="#" onClick="$('#add').toggleClass('d-none');">Add Department</a></td>
                </tr>
                <tr class="<?php echo (empty( $post_result['dept_name'])) ? 'd-none' : '' ; ?>" id="add">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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



