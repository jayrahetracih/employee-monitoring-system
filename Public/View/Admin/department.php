<?php include_once '../../../Public/layouts/header.php'; ?>
  
<div class ="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="d-flex">
                    <th class="col-12"><input type="text" class="form-control" id="search" placeholder="Search Department"/></th>
                </tr>
                <tr class="d-flex">
                    <th class="col-7">Department Name</th>
                    <th class="col-3">Status</th>
                    <th class="col-2"> Action</th>
                </tr>
            </thead>
            <tbody id="output">
            </tbody>
            <tfoot>
                <tr class="d-flex">
                    <td class="col-12 btn btn-outline-primary" style="cursor:pointer" data-toggle="modal" data-target="#department_form">Add Department</td>
                </tr>
            </tfoot>
        </table>   
</div><!-- container -->


<!-- Modals -->

<!--Alert Modal-->
    <div class="modal fade" id="alertModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div id="message"class="modal-body font-weight-bold">
                </div>
                <div class="modal-footer">
                <button type="button" id="modalClose" class="btn btn-default" data-dismiss="modal" onclick="$('#message').empty()">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--Alert Modal-->

    <!--Form Add Department -->
    <div class="modal fade" id="department_form" tabindex="-1" role="dialog" aria-labelledby="addNewDepartment" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="addNewDepartment">Add New Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="justify-content-center p-4 form-color" id="add_department" method ="POST">
                <div class="form-group" id="dept_name">
                    <input type="text" class="form-control" 
                    name="dept_name" placeholder="Department Name" autocomplete="off">
                    <span class="invalid-feedback" ></span>
                </div>
                <button type="submit" class="btn btn-primary  btn-block" name="btn_addDepartment" >Submit</button>
            </form>
            </div>
        </div>
    </div>
    <!--Form Add Department -->

<?php include_once '../../../Public/layouts/footer.php'; ?>