<?php
// ===== صفحة التسجيل =====
// الفورم يرسل لنفس الصفحة، و PHP يتحقق من البيانات قبل الحفظ
include "settings.php";
include "events_data.php";

$error = "";   // رسالة الخطأ
$ok    = "";   // رسالة النجاح

$name    = "";
$student = "";
$email   = "";
$choice  = "";

if (isset($_POST["send"])) {

  $name    = trim($_POST["name"]);
  $student = trim($_POST["student"]);
  $email   = trim($_POST["email"]);
  $choice  = trim($_POST["choice"]);

  // ----- التحقق من البيانات في السيرفر -----
  if ($name == "") {
    $error = "Please write your name.";
  }
  else if ($student == "") {
    $error = "Please write your student ID.";
  }
  else if (!is_numeric($student)) {
    $error = "The student ID must be numbers only.";
  }
  else if (strlen($student) != 9) {
    $error = "The student ID must be 9 digits.";
  }
  else if ($email == "") {
    $error = "Please write your email.";
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "The email is not correct. Example: ali@seu.edu.sa";
  }
  else if ($choice == "") {
    $error = "Please choose an event.";
  }

  // ----- إذا ما فيه خطأ نحفظ في الملف -----
  if ($error == "") {

    $line = $name . "|" . $student . "|" . $email . "|" . $choice . "|" . date("Y-m-d") . "\n";
    file_put_contents("registrations.txt", $line, FILE_APPEND);

    $ok = "Thank you " . $name . ". Your registration in " . $choice . " is saved.";

    // نفضي الحقول بعد الحفظ
    $name = "";
    $student = "";
    $email = "";
    $choice = "";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration - <?php echo $club_name; ?></title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1><?php echo $club_name; ?></h1>
  <p><?php echo $university; ?></p>
</header>

<nav>
  <a href="index.php">Home</a>
  |
  <a href="events.php">Events</a>
  |
  <a href="register.php" class="active">Registration</a>
  |
  <a href="registrations.php">Registrations List</a>
  |
  <a href="about.php">About / Contact</a>
</nav>

<main>

  <section>
    <h2>Event Registration</h2>
    <p>Fill this form to register. All fields are required.</p>

    <?php
    if ($error != "") {
      echo "<p class='error'>" . $error . "</p>";
    }
    if ($ok != "") {
      echo "<p class='ok'>" . $ok . "</p>";
    }
    ?>

    <!-- ===== الفورم الأول: التسجيل ===== -->
    <form action="register.php" method="post">

      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" value="<?php echo $name; ?>">

      <label for="student">Student ID (9 digits)</label>
      <input type="text" id="student" name="student" value="<?php echo $student; ?>">

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?php echo $email; ?>">

      <label for="choice">Choose an Event</label>
      <select id="choice" name="choice">
        <option value="">--- choose ---</option>
        <?php
        foreach ($events as $event) {
          if ($choice == $event["title"]) {
            echo "<option value='" . $event["title"] . "' selected>" . $event["title"] . "</option>";
          } else {
            echo "<option value='" . $event["title"] . "'>" . $event["title"] . "</option>";
          }
        }
        ?>
      </select>

      <input type="submit" name="send" value="Send Registration">

    </form>

    <p><a href="registrations.php">See the registrations list</a></p>
  </section>

</main>

<footer>
  <p><?php echo $club_name; ?> - <?php echo $university; ?></p>
</footer>

</body>
</html>
