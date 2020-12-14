<?php
echo '<form class="modal fade editUserModelForm" id="editUserModel' . $result["userId"] . '">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <p class="text-center feedbackMsg"></p>
            <div class="modal-body">
              <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="fName" value="' . $result["fName"] . '" class="form-control">
              </div>
              <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="lName" value="' . $result["lName"] . '" class="form-control">
              </div>'; ?>

<div class="form-group">
  <label for="sel1">User Type</label>
  <select class="form-control userTypeSelect" name="userType">
    <option value="">-Select-</option>
    <option <?php if ($result["userType"] == 'Pupil') {
              echo 'selected';
            } ?> value="Pupil">Pupil</option>
    <option <?php if ($result["userType"] == 'Teacher') {
              echo 'selected';
            } ?> value="Teacher">Teacher</option>
  </select>
</div>

<?php
if ($result["userType"] == 'Teacher') {
  $disabled = "disabled";
} else {
  $disabled = "";
}
echo '
<div class="form-group">
                <label>Phone Number:</label>
                <input type="text" ' . $disabled . ' name="contact" value="' . $result["contact"] . '" class="form-control contactInput">
              </div>
<div class="form-group">
                <label>User ID:</label>
                <input type="number" name="userNumber" value="' . $result["userNumber"] . '" class="form-control">
              </div>
              <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" value="' . $result["password"] . '" class="form-control">
              </div>
            </div>

            <input type="hidden" name="userId" value="' . $result["userId"] . '">
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
            </div>

          </div>
        </div>
      </form>';
