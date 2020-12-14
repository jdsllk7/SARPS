$(document).ready(function () {
  $(".userTypeSelect").on("change", function () {
    if (this.value == "Pupil") {
      $(".contactInput").attr("disabled", false);
    } else {
      $(".contactInput").attr("disabled", true);
      $(".contactInput").val("");
    }
  });

  $(document).on("click", ".publishSMSBtn", function () {
    let btn = $(this);
    let prev = $(this).html();
    btn.html('<i class="fas fa-spinner fa-spin text-white"></i>');
    setTimeout(function () {
      btn.html(prev);
      $("#sentSMSModal").modal("show");
    }, 2000);
  });
  $(document).on("click", ".uploadResultsBtn", function () {
    $("#uploadResultsModelForm").trigger("reset");
    $("#uploadResultsModelForm").modal("show");
    let fName = $(this).data("fname");
    let lName = $(this).data("lname");
    let userId = $(this).data("id");
    $(".modal-title").html("Upload " + fName + "'s Results");
    $("#fName").val(fName);
    $("#lName").val(lName);
    $("#userId").val(userId);
  });
  $("#uploadResultsModelForm").submit(function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "db/uploadResultSubmit_db.php",
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $(".feedbackMsg").html(
          '<i class="fas fa-spinner fa-spin text-dark"></i>'
        );
      },
      success: function (response) {
        console.log(response);
        feedbackMsg(response.status, response.message, "index.php", 2);
      },
      error: function (error) {
        console.log(error);
        feedbackMsg("error", "System Error! Reload Page & Try Again", "", 0);
      },
      complete: function () {},
    });
  });
});
