<?php
require_once 'Core/Db.php';
require_once 'Controller/Employee.php';

$employee = new Employee();
$employee->display_awesome();

?>
<?php include 'View/layouts/header.php'; ?>

<h1>horray</h1>
    
<?php include 'View/layouts/footer.php'; ?>