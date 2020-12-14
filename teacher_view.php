<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Teacher</h1>
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
              <h2 class="card-title">Registered Pupils</h2>

              <div class="card-tools">
                <button type="button" class="btn btn-primary publishSMSBtn">Send Results to Parents via SMS</button>
                <p class="text-center m-0 p-0 feedbackMsg"></p>
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
                    <th>Upload</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $data = mysqli_query($conn, "SELECT * FROM users WHERE userType LIKE 'pupil'");
                  if (mysqli_num_rows($data) != 0) {
                    $count = 0;
                    while ($result = mysqli_fetch_assoc($data)) {
                      $count++;
                      echo '<tr>
                              <td>' . $count . '.</td>
                              <td>' . $result["fName"] . ' ' . $result["lName"] . '</td>
                              <td>' . $result["contact"] . '</td>
                              <td>' . $result["userType"] . '</td>
                              <td>' . $result["userNumber"] . '</td>
                              <td>
                                <button class="btn btn-sm btn-dark m-0 uploadResultsBtn" data-id="' . $result["userId"] . '" data-fname="' . $result["fName"] . '" data-lname="' . $result["lName"] . '">Upload Results</button>
                              </td>
                              <td>
                                <button class="btn btn-sm btn-dark m-0 viewResultsBtn" data-toggle="modal" data-target="#resultsModel' . $result["userId"] . '">View Results</button>
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
                    <th>Upload</th>
                    <th>View</th>
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
  $data2 = mysqli_query($conn, "SELECT * FROM users WHERE userType LIKE 'pupil'");
  if (mysqli_num_rows($data2) != 0) {
    while ($result5 = mysqli_fetch_assoc($data2)) {
      include "resultsModel.php";
    }
  }
  ?>

  <!-- The Modal -->
  <form class="modal fade" id="uploadResultsModelForm">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <p class="text-center m-0 p-0 feedbackMsg"></p>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="sel1">Subject</label>
            <select class="form-control" name="subject">
              <option value="">-Select-</option>
              <option value="Math">Math</option>
              <option value="English">English</option>
              <option value="Science">Science</option>
              <option value="Computer Science">Computer Science</option>
            </select>
          </div>

          <div class="form-group">
            <label>Percentage:</label>
            <div class="input-group mb-3">
              <input type="number" min="0" step="0.1" name="percentage" class="form-control" placeholder="Eg: 75" title="Do not type in the percentage (%) symbol">
              <div class="input-group-append">
                <span class="input-group-text bg-white">%</span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Results For:</label>
            <input type="text" name="publishType" placeholder="E.g Exam, End of Term Test, Assignment" class="form-control">
          </div>
          <div class="form-group">
            <label class="label-color" for="price">Comment</label>
            <textarea class="form-control" name="comment" placeholder="Type comment here"></textarea>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <input type="hidden" name="fName" id="fName">
            <input type="hidden" name="lName" id="lName">
            <input type="hidden" name="userId" id="userId">
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
          </div>

        </div>
      </div>
    </div>
  </form>

  <!-- The Modal -->
  <div class="modal fade" id="sentSMSModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-success">Results Sent Successfully via SMS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <ul class="list-group">
            <?php
            $data2 = mysqli_query($conn, "SELECT * FROM users WHERE userType LIKE 'pupil'");
            if (mysqli_num_rows($data2) != 0) {
              while ($result5 = mysqli_fetch_assoc($data2)) {
                if (!empty($result5["contact"])) {
                  echo '<li class="list-group-item">SENT TO: (' . $result5["fName"] . ' ' . $result5["lName"] . ') ' . $result5["contact"] . ' <span><i class="fas fa-envelope"></i></span></li>';
                }
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->