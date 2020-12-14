<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Admin</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registered Users</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewUserForm">Add New User</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>User Type</th>
                    <th>User ID</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $data = mysqli_query($conn, "SELECT * FROM users WHERE userType != 'admin'");
                  if (mysqli_num_rows($data) != 0) {
                    $count = 0;
                    while ($result = mysqli_fetch_assoc($data)) {
                      $count++;
                      echo '<tr class="row' . $result["userId"] . '">
                              <td>' . $count . '.</td>
                              <td>' . $result["fName"] . ' ' . $result["lName"] . '</td>
                              <td>' . $result["contact"] . '</td>
                              <td>' . $result["userType"] . '</td>
                              <td>' . $result["userNumber"] . '</td>
                              <td>' . $result["password"] . '</td>
                              <td>
                                <button class="btn btn-sm btn-dark m-0 editUserBtn" data-toggle="modal" data-target="#editUserModel' . $result["userId"] . '">Edit</button>
                              </td>
                              <td>
                                <button value="' . $result["userId"] . '" class="btn btn-sm btn-danger m-0 deleteUserBtn">Delete</button>
                              </td>
                            </tr>';
                    }
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>User Type</th>
                    <th>User ID</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->


  <?php
  $data = mysqli_query($conn, "SELECT * FROM users WHERE userType != 'admin'");
  if (mysqli_num_rows($data) != 0) {
    while ($result = mysqli_fetch_assoc($data)) {
      include 'editUserModel.php';
    }
  }
  ?>

  <!-- [Add New] The Modal -->
  <form class="modal fade" id="addNewUserForm">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <p class="text-center feedbackMsg"></p>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fName" class="form-control">
          </div>
          <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lName" class="form-control">
          </div>
          <div class="form-group">
            <label for="sel1">User Type</label>
            <select class="form-control userTypeSelect" name="userType">
              <option value="">-Select-</option>
              <option value="Pupil">Pupil</option>
              <option value="Teacher">Teacher</option>
            </select>
          </div>
          <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" disabled name="contact" class="form-control contactInput">
          </div>
          <div class="form-group">
            <label>User ID:</label>
            <input type="number" name="userNumber" class="form-control">
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control">
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-lg btn-block">Add</button>
        </div>

      </div>
    </div>
  </form>

</div>
<!-- /.content-wrapper -->