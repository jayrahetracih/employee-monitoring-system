<?php include_once '../../../Public/layouts/header.php'; ?>

  <section id="cover">

    <?php include_once '../../../Public/layouts/sidebar.php'; ?>

    <h2 class="text-center pt-5 mb-5">Employee Page</h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#form">
    Add New
  </button>  

    <!-- Modal -->
    
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="email1">Email address</label>
            <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="password1">Confirm Password</label>
            <input type="password" class="form-control" id="password2" placeholder="Confirm Password">
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

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

  </section><!-- #cover -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

    // GET Request.
    fetch('../../../Controller/Handler/read_employee.php')
    // Handle success
    .then(res => res.json())  // convert to json
    .then((data) => {
  
    let output = '';
    data.forEach(function(result){
        output +=`<tr>
                    <td>${result.first_name}</td>
                    <td>${result.emp_id_number}</td>
                    <td>${result.department}</td>
                    <td>${result.age}</td>
                    <td>${result.gender}</td>
                    <td>${result.address}</td>
                    <td>${result.mobile_number}</td>
                    <td>${result.email}</td>
                    <td>${result.status}</td>
                    <td>${result.date_hire}</td>
                    <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">view</a>
                        <a class="dropdown-item" href="#">delete</a>
                        <a class="dropdown-item" href="#">update</a>
                        </div>
                    </div>

                    </td>
                </tr>`
        });
    
    document.getElementById('output').innerHTML = output;
    
    })
    .catch(err => console.log('Request Failed', err)); // Catch errors

    </script>
</body>
</html>

