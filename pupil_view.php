<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?php echo $_COOKIE["fName"]; ?>'s Results</h1>
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
        <div class="col-lg-6">

          <div id="accordion">

            <?php
            $data3 = mysqli_query($conn, "SELECT * FROM results WHERE userId = " . $_COOKIE["userId"] . " ORDER BY resultsId DESC");
            if (mysqli_num_rows($data3) != 0) {
              while ($result2 = mysqli_fetch_assoc($data3)) {


                echo '<div class="card">
                  <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapse' . $result2["resultsId"] . '">
                    <b>Subject:</b> ' . $result2["subject"] . ' <i>(' . $result2["publishType"] . ')</i> 
                    </a>
                  </div>
                  <div id="collapse' . $result2["resultsId"] . '" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <b>Percentage:</b> ' . $result2["percentage"] . ' %
                      <br>';

                $data4 = mysqli_query($conn, "SELECT * FROM chats WHERE resultsId = " . $result2["resultsId"] . " ORDER BY chatId DESC");
                if (mysqli_num_rows($data4) != 0) {
                  while ($result4 = mysqli_fetch_assoc($data4)) {
                    echo '<br><b>' . $result4["userType"] . '\'s Comment:</b> ' . $result4["comment"] . '';
                  }
                }

                echo '<br>
                      <form class="form-group m-5 replayForm">
                        <p class="text-center m-0 p-0 feedbackMsg"></p>
                        <textarea class="form-control" name="comment" placeholder="Type reply here"></textarea>
                        <input type="hidden" name="userType" value="Parent">
                        <input type="hidden" name="resultsId" value="' . $result2["resultsId"] . '">
                        <input type="hidden" name="userId" value="' . $_COOKIE["userId"] . '">
                        <button type="submit" class="btn btn-light btn-block">Reply</button>
                      </form>
                    </div>
                  </div>
                </div>';
              }
            } else {
              echo 'No results uploaded yet';
            }
            ?>

          </div>





        </div>

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

  <!-- The Modal -->
  <form class="modal fade" id="addNewUserForm">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <p class="text-center m-0 p-0 feedbackMsg"></p>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label>First Name:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="fName" class="form-control">
          </div>
          <div class="form-group">
            <label for="sel1">User Type</label>
            <select class="form-control" name="userType">
              <option>-Select-</option>
              <option value="Pupil">Pupil</option>
              <option value="Teacher">Teacher</option>
            </select>
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