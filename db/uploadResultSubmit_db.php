<?php
include_once 'connect.php';
$response = array(
  'status' => '',
  'message' => 'Form submission failed, please try again.'
);

if (
  isset($_POST["fName"]) && !empty($_POST["fName"]) &&
  isset($_POST["lName"]) && !empty($_POST["lName"]) &&
  isset($_POST["userId"]) && !empty($_POST["userId"]) &&
  isset($_POST["subject"]) && !empty($_POST["subject"]) &&
  isset($_POST["percentage"]) && !empty($_POST["percentage"]) &&
  isset($_POST["publishType"]) && !empty($_POST["publishType"]) &&
  isset($_POST["comment"]) && !empty($_POST["comment"])
) {

  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $userId = $_POST['userId'];
  $subject = $_POST['subject'];
  $percentage = $_POST['percentage'];
  $publishType = $_POST['publishType'];
  $comment = test_input($_POST['comment']);

  $data = mysqli_query($conn, "SELECT * FROM users WHERE userId=$userId");

  if (mysqli_num_rows($data) == 1) {

    //insert
    $sql = "INSERT INTO results (
      subject,
      percentage,
      publishType,
      comment,
      fName,
      lName,
      userId
      ) VALUES (
        '$subject',
        '$percentage',
        '$publishType',
        '$comment',
        '$fName',
        '$lName',
         $userId
        )";

    if (mysqli_query($conn, $sql)) {
      $resultsId = mysqli_insert_id($conn);
      $currentUserId = $_COOKIE["userId"];
      $sql = "INSERT INTO chats (
        comment,
        userType,
        userId,
        resultsId
        ) VALUES (
          '$comment',
          'Teacher',
           $currentUserId,
           $resultsId
          )";

      if (mysqli_query($conn, $sql)) {
        $response['status'] = 'success';
        $response['message'] = 'Results uploaded successfully';
      } else {
        $response['status'] = 'error';
        $response['message'] = 'System error! No special characters allowed';
      }
      $response['status'] = 'success';
      $response['message'] = 'Results uploaded successfully';
    } else {
      $response['status'] = 'error';
      $response['message'] = 'System error! No special characters allowed';
    }
  } else {
    $response['status'] = 'error';
    $response['message'] = 'User does not exists';
  }
} else {
  $response['status'] = 'error';
  $response['message'] = 'Fill in form correctly & try again';
}

echo json_encode($response);

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}//end test_input()