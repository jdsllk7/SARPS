<?php
include_once 'connect.php';
$response = array(
  'status' => '',
  'message' => 'Form submission failed, please try again.'
);

if (isset($_POST["userId"]) && !empty($_POST["userId"])) {

  $userId = $_POST['userId'];

  $data = mysqli_query($conn, "SELECT * FROM users WHERE userId=$userId");

  if (mysqli_num_rows($data) == 1) {

    $sql = "DELETE FROM users WHERE userId = '$userId'";

    if (mysqli_query($conn, $sql)) {
      // if (true) {
      $response['status'] = 'success';
      $response['message'] = 'User deleted successfully';
    } else {
      $response['status'] = 'error';
      $response['message'] = 'System error & try again';
    }
  } else {
    $response['status'] = 'error';
    $response['message'] = 'User with ID ' . $userNumber . ' does not exists';
  }
} else {
  $response['status'] = 'error';
  $response['message'] = 'Fill in form correctly & try again';
}

echo json_encode($response);
