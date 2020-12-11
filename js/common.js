$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
  window.feedbackMsg = function feedbackMsg(type, msg, redirect, sec) {
    $(".feedbackMsg").hide();
    $(".feedbackMsg").fadeIn();
    $(".feedbackMsg").html(msg);
    if (type == "success") {
      $(".feedbackMsg").css("color", "green");
    } else if (type == "error") {
      $(".feedbackMsg").css("color", "red");
    } else if (type == "neutral") {
      $(".feedbackMsg").css("color", "#4d4d4d");
    }
    if (redirect.length && Number(sec) > 0 && type == "success") {
      setTimeout(function () {
        window.location.replace(redirect);
      }, Number(sec) * 1000);
    }
  };
});
