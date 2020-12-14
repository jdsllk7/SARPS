$(document).ready(function () {
  $(".editUserModelForm").submit(function (event) {
    let form = $(this);
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "db/editUser_db.php",
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $(".feedbackMsg").html(
          '<i class="fas fa-spinner fa-spin text-dark"></i>'
        );
      },
      success: function (response) {
        console.log(response);
        feedbackMsg(response.status, response.message, "index.php", 0.5);
      },
      error: function (error) {
        console.log(error);
        feedbackMsg("error", "System Error! Reload Page & Try Again", "", 0);
      },
      complete: function () {},
    });
  });
});
