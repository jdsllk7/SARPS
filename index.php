<?php
if (!isset($_COOKIE["userId"])) {
  header('Location: login.php');
}
include_once "header.php";

if (isset($_COOKIE["userType"])) {
  if ($_COOKIE["userType"] == 'admin') {
    include_once "admin_view.php";
  } elseif ($_COOKIE["userType"] == 'Teacher') {
    include_once "teacher_view.php";
  } elseif ($_COOKIE["userType"] == 'Pupil') {
    include_once "pupil_view.php";
  }
}
?>

<?php include_once "footer.php"; ?>

</body>

</html>