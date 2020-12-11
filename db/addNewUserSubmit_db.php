<?php
include_once 'connect.php';
$response = array(
  'status' => '',
  'message' => 'Form submission failed, please try again.'
);

if (
  isset($_POST["fName"]) && !empty($_POST["fName"]) &&
  isset($_POST["lName"]) && !empty($_POST["lName"]) &&
  isset($_POST["userType"]) && !empty($_POST["userType"]) &&
  isset($_POST["userNumber"]) && !empty($_POST["userNumber"]) &&
  isset($_POST["password"]) && !empty($_POST["password"])
) {

  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $userNumber = $_POST['userNumber'];
  $userType = $_POST['userType'];
  $password = $_POST['password'];

  $data = mysqli_query($conn, "SELECT * FROM users WHERE userNumber='$userNumber'");

  if (mysqli_num_rows($data) == 0) {

    //insert
    $sql = "INSERT INTO users (
      userType,
      userNumber,
      fName,
      lName,
      password
      ) VALUES (
        '$userType',
        '$userNumber',
        '$fName',
        '$lName',
        '$password'
        )";
    if (mysqli_query($conn, $sql)) {
      $response['status'] = 'success';
      $response['message'] = 'User added successfully';
    } else {
      $response['status'] = 'error';
      $response['message'] = 'System error & try again';
    }
  } else {
    $response['status'] = 'error';
    $response['message'] = 'User with ID ' . $userNumber . ' already exists';
  }
} else {
  $response['status'] = 'error';
  $response['message'] = 'Fill in form correctly & try again';
}

echo json_encode($response);
