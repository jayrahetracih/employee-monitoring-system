<?php
require_once '../../../Controller/User/Admin.php';

$admin = new Admin();
$result = $admin->tempReadInfo('employee');
/* echo '<pre>';
             print_r($condition_query);
echo '</pre>'; */
?>

<?php include_once '../../../Public/layouts/header.php'; ?>

    <div class ="container-fluid"> 

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
                        <td><?php echo $value['status'] ?></td>
                        <td><?php echo date('m/d/y', strtotime($value['date_hire'])) ?></td>
                        <td>

                          <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">View</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div>

                        </td>
                      </tr>                
                  <?php  endforeach; ?>
                  </tbody>
                </table> <!-- "table table-hover mt-4 -->
         
    </div><!-- container -->

<?php include_once '../../../Public/layouts/footer.php'; ?>
