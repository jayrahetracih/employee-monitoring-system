<?php
require_once '../../../Controller/User/Admin.php';

$admin = new Admin();
$result = $admin->readInfo('employee');

?>

<?php include_once '../../../Public/layouts/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    
    <?php include_once '../../../Public/layouts/sidebar.php'; ?>
    
    <div class="col-10">

      <h2 class="text-center pt-5 mb-5">Employee Page</h2>

      <!-- Table -->
         <!-- Table -->
                <table class="table table-hover mt-4">
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
                  <tbody>
                  <?php foreach( $result as $value):  ?>
                      <tr>
                        <td><?php echo ucfirst($value['first_name']) .' '. ucfirst($value['middle_name'][0]).'. '. ucfirst($value['last_name'])?></td>
                        <td><?php echo $value['emp_id_number'] ?></td>
                        <td><?php echo $value['department'] ?></td>
                        <td><?php echo $value['age'] ?></td>
                        <td><?php echo $value['gender'] ?></td>
                        <td><?php echo $value['address'] ?></td>
                        <td><?php echo $value['mobile_number'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['employee_status'] ?></td>
                        <td><?php echo date('m/d/y', strtotime($value['date_hire'])) ?></td>
                        <td>

                          <a  class="dropdown-item"  href="update_employee.php?id=<?php echo $value['employee_id'] ?>"
                          title='View Record' data-toggle='tooltip'>View</a>
                          <a class="dropdown-item" href="#">Update</a>
                          <a class="dropdown-item" href="#">Delete</a>

                        </td>
                      </tr>                
                  <?php  endforeach; ?>
                  </tbody>
                </table> <!-- "table table-hover mt-4 -->

    </div>
  </div>
</div>
  <?php include_once '../../../Public/layouts/footer.php'; ?>
  <script>test();</script>


