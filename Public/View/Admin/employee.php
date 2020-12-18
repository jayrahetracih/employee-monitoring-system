

<?php include_once '../../../Public/layouts/header.php'; ?>

  <section id="cover">

    <?php include_once '../../../Public/layouts/sidebar.php'; ?>

    <h2 class="text-center pt-5 mb-5">Employee Page</h2>


<!-- Large modal -->
<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Add New&nbsp;&nbsp;<span class="oi oi-plus" title="person" aria-hidden="true"></span></button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- modal-header -->
        <div class="modal-body">

          <form>
            <div class="form-row">
              <div class="form-group col-md-4">
                <input type="text" class="form-control" id="first_name" placeholder="First Name">
              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control" id="middle_name" placeholder="Middle Name">
              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control" id="last_name" placeholder="Last Name">
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="inputAddress" placeholder="Address">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="inputCity" placeholder="Mobile Number">
              </div>
              <div class="form-group col-md-6">
                <select id="inputState" class="form-control" >
                  <option selected>Gender...</option>
                  <option>male</option>
                  <option>female</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="email" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
            </div>
            <button type="button" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div><!-- modal-body -->
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

  <?php include_once '../../../Public/layouts/footer.php'; ?>
  <script>test();</script>


