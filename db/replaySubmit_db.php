<?php
include_once 'connect.php';
$response = array(
  'status' => '',
  'message' => 'Form submission failed, please try again.'
);

if (
  isset($_POST["comment"]) && !empty($_POST["comment"]) &&
  isset($_POST["userType"]) && !empty($_POST["userType"]) &&
  isset($_POST["resultsId"]) && !empty($_POST["resultsId"]) &&
  isset($_POST["userId"]) && !empty($_POST["userId"])
) {

  $comment = test_input($_POST['comment']);
  $userType = $_POST['userType'];
  $resultsId = $_POST['resultsId'];
  $userId = $_POST['userId'];

  //insert
  $sql = "INSERT INTO chats (
      comment,
      userType,
      userId,
      resultsId
      ) VALUES (
        '$comment',
        '$userType',
         $userId,
         $resultsId
        )";
  if (mysqli_query($conn, $sql)) {
    $response['status'] = 'success';
    $response['message'] = 'Replay successful';
  } else {
    $response['status'] = 'error';
    $response['message'] = 'System error! No special characters allowed';
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