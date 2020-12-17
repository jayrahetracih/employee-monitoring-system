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
    $(document).ready(function(){
        let params = {status : 'Active'};
        getData(params);
    });
    function getData(params)
    {
        fetch('../../../Controller/Handler/Department/read.php', {
            method : 'POST',
            headers: {
                        'Content-Type': 'application/json'
                    },
            body : JSON.stringify(params)
            })
            .then((res) => res.json())
            .then((data) => {

            alterTable(data);

            }).catch((e) => console.log(e));
    }
    
    function updateData(params)
    {
        
        fetch('../../../Controller/Handler/Department/update.php', {
            method : 'POST',
            headers: {
                        'Content-Type': 'application/json'
                    },
            body : JSON.stringify(params)
            })
            .then((res) => res.json())
            .then((data) => {

                console.log(data);
                let params = {status : 'Active'};
                getData(params);
                $('#message').text(data.alert_message);
                $('#alertModal').modal('show');
                $('#modalClose').focus();

            }).catch((e) => console.log(e));
    }

    function alterTable(data)
    {
        let output = '';
        data.forEach(function(result)
        {
                output += `
                    <tr class="d-flex" >
                        <td class="col-10 fields" id="${result.department_id}">${result.department}</td>
                        
                        <td class="col-2 btn btn-primary btn-sm dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" onClick="$('#${result.department_id}').attr('contenteditable', 'true');$('#${result.department_id}').focus();">Rename</a>
                                <a class="dropdown-item archive" href="#" onclick="updateData({id : '${result.department_id}', field : 'status', value : 'Inactive'});">Archive
                                </a>
                            </div>
                        
                        </td>
                    </tr>
                `;
        });
        document.getElementById('output').innerHTML = output;
        let el = document.getElementsByClassName('fields');
        Array.from(el).forEach(function(el) 
        {
                el.addEventListener('keydown', function(event)
                {
                        switch(event.keyCode)
                        {
                            case 13:
                            event.preventDefault();
                            let data = {
                                value   :   this.innerHTML,
                                id      :   this.id
                            };
                            updateData(data);
                            break;
                        }
                });
        });
    }

</script>

