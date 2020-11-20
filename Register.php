<?php
require_once 'Helper/Inputs.php';
?>
<form action="" method="POST">
    <div class="form-control">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname">
    </div><div class="form-control">
        <label for="mname">Middle Name</label>
        <input type="text" name="mname" id="mname">
    </div><div class="form-control">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname">
    </div>
    <div class="form-control">
        <label for="des">Designation</label>
        <select id="des">
            <option selected>-----------</option>
        </select>
    </div>
    <div class="form-control">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo isset(Inputs::get('username')) ?>">
    </div>
    <div class="form-control">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="form-control">
        <label for="cpassword">Confirm Password</label>
        <input type="password" name="cpassword" id="cpassword">
    </div>
    <input type="submit" name="submit">
</form>