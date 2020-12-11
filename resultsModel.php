<div class="modal fade" id="resultsModel<?php echo $result5["userId"]; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $result5["fName"]; ?>'s Results</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div id="accordion">

          <?php
          $data3 = mysqli_query($conn, "SELECT * FROM results WHERE userId = " . $result5["userId"]);
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
                      <form class="form-group m-3 replayForm">
                        <p class="text-center m-0 p-0 feedbackMsg"></p>
                        <textarea class="form-control" name="comment" placeholder="Type reply here"></textarea>
                        <input type="hidden" name="userType" value="Teacher">
                        <input type="hidden" name="resultsId" value="' . $result2["resultsId"] . '">
                        <input type="hidden" name="userId" value="' . $_COOKIE["userId"] . '">
                        <button type="submit" class="btn btn-light btn-block">Reply</button>
                      </form>';








              echo '</div>
                  </div>
                </div>';
            }
          } else {
            echo 'No results uploaded yet';
          }
          ?>

        </div>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
      </div> -->

    </div>
  </div>
</div>