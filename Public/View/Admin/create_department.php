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
    <tbody id="output">
    </tbody>
    <tfoot>
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
                <button type="button" id="add_department" class="btn btn-primary  btn-block" name="btn_addDepartment" >Submit</button>
                </form><!--Form Add Department -->
            </td>
        </tr>
    </tfoot>
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
                <button type="button" id="modalClose" class="btn btn-default" data-dismiss="modal" onclick="document.location.href = 'create_department.php';">Close</button>
                </div>
            </div>

        </div>
    </div><!--Alert Modal-->

<?php include_once '../../../Public/layouts/footer.php'; ?>
<script>
    

</script>

