<?php
// ===== صفحة عن النادي والتواصل =====
// فورم التواصل فيه تحقق فقط، ما نرسل إيميل
include "settings.php";

$c_error = "";
$c_ok    = "";

$c_name    = "";
$c_email   = "";
$c_message = "";

if (isset($_POST["send2"])) {

  $c_name    = trim($_POST["c_name"]);
  $c_email   = trim($_POST["c_email"]);
  $c_message = trim($_POST["c_message"]);

  if ($c_name == "") {
    $c_error = "Please write your name.";
  }
  else if ($c_email == "") {
    $c_error = "Please write your email.";
  }
  else if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
    $c_error = "The email is not correct.";
  }
  else if ($c_message == "") {
    $c_error = "Please write your message.";
  }
  else if (strlen($c_message) < 10) {
    $c_error = "The message is too short.";
  }

  if ($c_error == "") {
    $c_ok = "Thank you " . $c_name . ". Your message is received.";
    $c_name = "";
    $c_email = "";
    $c_message = "";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About and Contact - <?php echo $club_name; ?></title>
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
  <a href="register.php">Registration</a>
  |
  <a href="registrations.php">Registrations List</a>
  |
  <a href="about.php" class="active">About / Contact</a>
</nav>

<main>

  <section>
    <h2>About the Club</h2>
    <p>
      The <?php echo $club_name; ?> is a student club at the
      <?php echo $university; ?>. It was created by students from the
      <?php echo $department; ?>.
    </p>

    <p>The club has three main activities:</p>
    <ol>
      <li>Training</li>
      <li>Competitions</li>
      <li>Career events</li>
    </ol>
  </section>

  <section>
    <h2>Team Members</h2>

    <table>
      <caption>Our team</caption>
      <tr>
        <th>Name</th>
        <th>Student ID</th>
        <th>Work in the Project</th>
      </tr>

      <?php
      // الأسماء مكتوبة في ملف settings.php
      foreach ($team as $member) {
      ?>
        <tr>
          <td><?php echo $member[0]; ?></td>
          <td><?php echo $member[1]; ?></td>
          <td><?php echo $member[2]; ?></td>
        </tr>
      <?php
      }
      ?>

    </table>
  </section>

  <section>
    <h2>Contact Us</h2>
    <p>Office: <?php echo $club_office; ?></p>
    <p>Email: <?php echo $club_email; ?></p>

    <?php
    if ($c_error != "") {
      echo "<p class='error'>" . $c_error . "</p>";
    }
    if ($c_ok != "") {
      echo "<p class='ok'>" . $c_ok . "</p>";
    }
    ?>

    <!-- ===== الفورم الثاني: التواصل ===== -->
    <form action="about.php" method="post">

      <label for="c_name">Your Name</label>
      <input type="text" id="c_name" name="c_name" value="<?php echo $c_name; ?>">

      <label for="c_email">Your Email</label>
      <input type="email" id="c_email" name="c_email" value="<?php echo $c_email; ?>">

      <label for="c_message">Your Message</label>
      <textarea id="c_message" name="c_message" rows="5"><?php echo $c_message; ?></textarea>

      <input type="submit" name="send2" value="Send Message">

    </form>
  </section>

</main>

<footer>
  <p><?php echo $club_name; ?> - <?php echo $university; ?></p>
</footer>

</body>
</html>
