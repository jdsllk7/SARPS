<?php
include_once 'connect.php';
$response = array(
  'status' => '',
  'message' => 'Form submission failed, please try again.'
);

if (
  isset($_POST["userId"]) && !empty($_POST["userId"]) &&
  isset($_POST["fName"]) && !empty($_POST["fName"]) &&
  isset($_POST["lName"]) && !empty($_POST["lName"]) &&
  isset($_POST["userType"]) && !empty($_POST["userType"] && $_POST["userType"] != "") &&
  isset($_POST["userNumber"]) && !empty($_POST["userNumber"]) &&
  isset($_POST["password"]) && !empty($_POST["password"])
) {

  $userId = $_POST['userId'];
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $userNumber = $_POST['userNumber'];
  $userType = $_POST['userType'];
  $password = $_POST['password'];
  if (isset($_POST['contact'])) {
    $contact = $_POST['contact'];
  } else {
    $contact = "";
  }

  $data = mysqli_query($conn, "SELECT * FROM users WHERE userId=$userId");

  if (mysqli_num_rows($data) == 1) {

    $sql = "UPDATE users SET userType = '$userType', userNumber = '$userNumber', fName = '$fName', lName = '$lName', contact = '$contact', password = '$password' WHERE userId = '$userId'";

    if (mysqli_query($conn, $sql)) {
      $response['status'] = 'success';
      $response['message'] = 'User edited successfully';
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
