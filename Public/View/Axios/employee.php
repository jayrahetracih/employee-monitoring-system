

<?php include_once '../../../Public/layouts/header.php'; ?>

<div class="container-fluid ">

  <div class="row">

      <?php include_once '../../../Public/layouts/sidebar.php'; ?>

    <div class="col-11 ">

      <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Add New&nbsp;&nbsp;<span class="oi oi-plus" title="person" aria-hidden="true"></span></button>
      <!-- Add New Employee Modal  -->
      <div class="modal fade bd-example-modal-lg" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" >
          <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div><!-- modal-header -->
              <div class="modal-body">

                <form method="POST" id="add_employee" >
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control first_name" id="first_name"  name="first_name"placeholder="First Name">
                      <span class="invalid-feedback" ></span>
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control middle_name" id="middle_name" name="middle_name" placeholder="Middle Name">
                      <span class="invalid-feedback" ></span>
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control last_name" id="last_name" name="last_name" placeholder="Last Name">
                       <span class="invalid-feedback" ></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control address" id="address" name="address" placeholder="Address">
                     <span class="invalid-feedback" ></span>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control mobile_number" id="mobile_number" name="mobile_number" placeholder="Mobile Number">
                      <span class="invalid-feedback" ></span>
                    </div>
                    <div class="form-group col-md-6">
                      <select id="gender" class="form-control gender" name="gender" >
                        <option value="" >Gender...</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                      </select>
                       <span class="invalid-feedback" ></span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input type="email" class="form-control email" id="email" name="email" placeholder="Email">
                       <span class="invalid-feedback" ></span>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control age" id="age" name="age" placeholder="Age">
                       <span class="invalid-feedback" ></span>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" >Save</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
              </div><!-- modal-body -->
          </div>
        </div>
      </div>
      <!-- Update Employee Modal  -->
      <div class="modal fade bd-example-modal-lg" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" >
          <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div><!-- modal-header -->
              <div class="modal-body">

                <form method="POST" id="update_employee" >
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control first_name" id="first_name"  name="first_name" placeholder="First Name">
                      <span class="invalid-feedback" ></span>
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control middle_name" id="middle_name" name="middle_name" placeholder="Middle Name">
                      <span class="invalid-feedback" ></span>
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control last_name" id="last_name" name="last_name" placeholder="Last Name">
                       <span class="invalid-feedback" ></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control address" id="address" name="address" placeholder="Address">
                     <span class="invalid-feedback" ></span>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control mobile_number" id="mobile_number" name="mobile_number" placeholder="Mobile Number">
                      <span class="invalid-feedback" ></span>
                    </div>
                    <div class="form-group col-md-6">
                      <select id="gender" class="form-control gender" name="gender" >
                        <option value="" >Gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                      </select>
                       <span class="invalid-feedback" ></span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input type="email" class="form-control email" id="email" name="email" placeholder="Email">
                       <span class="invalid-feedback" ></span>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control age" id="age" name="age" placeholder="Age">
                       <span class="invalid-feedback" ></span>
                    </div>
                  </div>
                  <input type="hidden" id="employee_id" name="employee_id" >

                  <button type="submit" class="btn btn-primary" >Save</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
              </div><!-- modal-body -->
          </div>
        </div>
      </div>

      <h2 class="text-center pt-5 mb-5">Employee Page</h2>

      <span id="alert"></span>
      <!-- Table -->
       <table class="table table-hover ">
     
        <thead>
          <tr>
          <th scope="col">Full Name</th>
          <th scope="col">ID Number</th>
          <th scope="col">Department</th>
          <th scope="col">Age</th>
          <th scope="col">Gender</th>
          <th scope="col">Address</th>
          <th scope="col">Contact No.</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
          <th scope="col">Date Hire</th>
          <th scope="col">Actions</th>
          </tr>
        </thead>
        
        <tbody id="output">

        </tbody>

      </table> <!-- "table table-hover mt-4 -->

    </div>
  </div>
</div>
<?php include_once '../../../Public/layouts/footer.php'; ?>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

  window.addEventListener('load', (event) => {
    displayTable();
  });

  $('#add_employee').on('submit', function(event)
  {
    event.preventDefault();
    const formData = new FormData(this);
    createData(formData);
  });

  $('#update_employee').on('submit', function(event)
  {
    event.preventDefault();
    const formData = new FormData(this);
    updateData(formData);
  
  });

  $(document).on('click', '.dd_parent .dropdown-menu .update', function (event)
  {
    event.preventDefault();
    let data_id = this.getAttribute('data-id');
    readOneData(data_id);
    $('#update_modal').modal('show');
    
  });

  $('#update_modal').on('hidden.bs.modal', function() {
    let form = document.getElementById('update_employee').elements;
    clearInput(form);
  })

  $('#add_modal').on('hidden.bs.modal', function() {
    let form = document.getElementById('add_employee').elements;
    $("#add_employee").trigger("reset");
    clearInput(form);
  })

  const loadTimer = () => {

    let is_loading = true;

    return new Promise(resolve => {

      setTimeout(() => {
        is_loading = false;
          resolve(is_loading);
        }, 1500);
    });
      
  }

  const displayTable = () => {

    axios.post('../../../Controller/Class/router.php', {
    type : 'employee', action : 'read'
    })
    .then(async function ({data}) {

      let loader = `<tr>
                      <td colspan="11" class="text-center p-5" >
                        <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                      </td>
                    </tr> `;

      document.getElementById('output').innerHTML = loader;
      const is_loading = await loadTimer();
     
      if (is_loading == false) { 
        document.getElementById('output').innerHTML = await readData(Object.values(data));
      }
       
    })
    .catch(function (error) {
      console.log(error);
    });

  }

  const createData = (formData) => {

    axios.post('../../../Controller/Class/router.php', {
      type: 'employee',
      action : 'create', 
      fields_values : Object.fromEntries(formData.entries())
    })
    .then(async function (response) {

      const { result , result_data } = response.data;

      let fields_id = ['first_name','middle_name','last_name','age','gender','address','email','mobile_number'];
      let parent_element = document.querySelector('#add_employee');
      let field = [];

        if (result == 'failed') {

          field = result_data.map(function (d) {
            return d.field
          });

          setInput(fields_id,field,parent_element);
          setErrorMessage(result_data,parent_element);

        } else {

          $('#add_modal').modal('hide');
          $("#add_employee").trigger("reset");
          displayTable();
          await displayAlertMessage(result_data);

        } 

    })
    .catch(function (error) {
      console.log(error);
    });
      
  }

  const readData = async (employees) => {

      let result = '';

      for (const employee of employees) {
        
        result +=`<tr>
                      <td>${employee.first_name} ${employee.middle_name[0].toUpperCase()}. ${employee.last_name}</td>
                      <td>${employee.emp_id_number}</td>
                      <td>${employee.department}</td>
                      <td>${employee.age}</td>
                      <td>${employee.gender}</td>
                      <td>${employee.address}</td>
                      <td>${employee.mobile_number}</td>
                      <td>${employee.email}</td>
                      <td>${employee.status}</td>
                      <td>${employee.date_hire}</td>
                      <td>

                        <div class="btn-group dd_parent">
                          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                          </button>
                          <div class="dropdown-menu">
                          <a class="dropdown-item view" href="#">view</a>
                          <a class="dropdown-item update" id="update" data-id="${employee.employee_id}" href="#" >update </a>
                          <a class="dropdown-item delete" href="#">archive</a>
                          </div>
                        </div>
                     
                      </td>
                  </tr>`

      }
      
   return  document.getElementById('output').innerHTML = result;

  }

  const readOneData = (data_id) => {

    axios.post('../../../Controller/Class/router.php', {
    type : 'employee', action : 'readOne' , data_id : data_id
    })
    .then(function ({data}) {

        let name = [];

        let form = document.getElementById('update_employee').elements;

        // assigning value to name array
        for(let i = 0; i < form.length; i++)
        { 
            let form_name = form[i].getAttribute('name');

            if (form_name != null) {
              name[i] = form_name;
            }

        } 
        // assigning value to each field
        Object.entries(data).forEach(([k, v]) => {
        
          if (name.includes(k)) {
            form[k].value = v;
          }

        });

       
    })
    .catch(function (error) {
      console.log(error);
    });

  }

  const updateData = (formData) => {

    axios.post('../../../Controller/Class/router.php', {
      type: 'employee',
      action : 'update', 
      fields_values : Object.fromEntries(formData.entries())
    })
    .then(async function (response) {

      const { result , result_data } = response.data;

      let fields_id = ['first_name','middle_name','last_name','age','gender','address','email','mobile_number'];
      let parent_element = document.querySelector('#update_employee');
      let field = [];

      if (result == 'failed') {

        field = result_data.map(function (d) {
          return d.field
        });

        setInput(fields_id,field,parent_element);
        setErrorMessage(result_data,parent_element);

      } else {

        $('#update_modal').modal('hide');
        displayTable();
        await displayAlertMessage(result_data);

      } 

    })
    .catch(function (error) {
      console.log(error);
    });

  }
   /**
  * Set inputs validation status after submition
  */
  const setInput = (fields_id,field,parent_element) => {

    for (const content of fields_id) {

      let input_field = parent_element.querySelector(`.${content}`); 

      if (field.includes(content)) {

        if (input_field.classList.contains("is-valid")) {

          input_field.classList.replace('is-valid','is-invalid'); 

        } else {
          
          input_field.classList.add('is-invalid'); 
          
        }

      } else {

        if (input_field.classList.contains("is-invalid")) {

          input_field.classList.replace('is-invalid','is-valid'); 

        } else {

          input_field.classList.add('is-valid'); 
          
        }

      } 
    }

  }
  /**
  * Clear inputs validation 
  */
  const clearInput = (form) => {

    for(let i = 0; i < form.length; i++)
    { 
      if (form[i].classList.contains('is-invalid')) {
        form[i].classList.toggle('is-invalid');
      } 
      if (form[i].classList.contains('is-valid')) {
        form[i].classList.toggle('is-valid');
      } 
    } 

  }
   /**
  * Set Error Message for each field
  */
  const setErrorMessage = (result_data,parent_element) => {

    Object.entries(result_data).forEach(([key, value]) => {
          
      let input_error = parent_element.querySelector(`.${value.field}`);    
      let form_control = input_error.parentElement;
      let span = form_control.querySelector('span');
      span.innerText = value.error_message;

    });

  }

  const displayAlertMessage = (result_data) => {

    return new Promise(resolve => {

      setTimeout(() => {
          let span = document.querySelector('#alert');
          span.innerHTML = result_data;  
        }, 1500);
    });

  }

</script>

