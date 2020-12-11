<?php
include_once 'connect.php';
$response = array(
  'status' => '',
  'message' => ''
);

if (
  isset($_POST["userNumber"]) && !empty($_POST["userNumber"]) &&
  isset($_POST["password"]) && !empty($_POST["password"])
) {

  $userNumber = $_POST['userNumber'];
  $password = $_POST['password'];

  $data = mysqli_query($conn, "SELECT * FROM users WHERE userNumber='$userNumber' AND password='$password'");

  if (mysqli_num_rows($data) == 1) {
    $user = mysqli_fetch_assoc($data);

    setcookie('userId', $user['userId'], time() + (86400 * 30), "/");
    setcookie('userType', $user['userType'], time() + (86400 * 30), "/");
    setcookie('userNumber', $user['userNumber'], time() + (86400 * 30), "/");
    setcookie('fName', $user['fName'], time() + (86400 * 30), "/");
    setcookie('lName', $user['lName'], time() + (86400 * 30), "/");

    if ($user['userType'] == 'admin') {
      $response['message'] = 'Welcome Admin';
    } elseif ($user['userType'] == 'pupil') {
      $response['message'] = 'Welcome pupil ' . $user['fName'];
    } elseif ($user['userType'] == 'teacher') {
      $response['message'] = 'Welcome teacher ' . $user['fName'];
    }
    $response['status'] = 'success';
    $response['message'] = 'Login successful';

  } else {
    $response['status'] = 'error';
    $response['message'] = 'User does not exist...';
  }
} else {
  $response['status'] = 'error';
  $response['message'] = 'Wrong credentials. Try again';
}

echo json_encode($response);
