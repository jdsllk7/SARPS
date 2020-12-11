$(document).ready(function () {
  $("#loginForm").submit(function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "db/loginFormSubmit_db.php",
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
