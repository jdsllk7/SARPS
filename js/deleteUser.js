$(document).ready(function () {
  $(document).on("click", ".deleteUserBtn", function () {
    let userId = $(this).val();
    $.ajax({
      type: "POST",
      url: "db/deleteUser_db.php",
      data: { userId: userId },
      dataType: "json",
      beforeSend: function () {
        $(".feedbackMsg").html(
          '<i class="fas fa-spinner fa-spin text-dark"></i>'
        );
      },
      success: function (response) {
        console.log(response);
        feedbackMsg(response.status, response.message, "", 0);
        alert(response.message);
        $(".row" + userId).hide();
      },
      error: function (error) {
        console.log(error);
        feedbackMsg("error", "System Error! Reload Page & Try Again", "", 0);
      },
      complete: function () {},
    });
  });
});
