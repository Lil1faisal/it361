<?php
// ===== صفحة عرض التسجيلات =====
// نقرأ الملف النصي ونطبعه في جدول
include "settings.php";

$lines = array();

if (file_exists("registrations.txt")) {
  $lines = file("registrations.txt");   // كل سطر يصير عنصر في المصفوفة
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrations List - <?php echo $club_name; ?></title>
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
  <a href="registrations.php" class="active">Registrations List</a>
  |
  <a href="about.php">About / Contact</a>
</nav>

<main>

  <section>
    <h2>Registrations List</h2>
    <p>All the students who registered in our events.</p>

    <?php
    if (count($lines) == 0) {
      echo "<p class='error'>There are no registrations yet.</p>";
    } else {
    ?>

      <table>
        <caption>List of registrations</caption>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Student ID</th>
          <th>Email</th>
          <th>Event</th>
          <th>Date</th>
        </tr>

        <?php
        $number = 1;
        foreach ($lines as $line) {

          $line = trim($line);

          if ($line != "") {
            $part = explode("|", $line);   // نفصل السطر عند علامة |
        ?>
            <tr>
              <td><?php echo $number; ?></td>
              <td><?php echo $part[0]; ?></td>
              <td><?php echo $part[1]; ?></td>
              <td><?php echo $part[2]; ?></td>
              <td><?php echo $part[3]; ?></td>
              <td><?php echo $part[4]; ?></td>
            </tr>
        <?php
            $number = $number + 1;
          }
        }
        ?>

      </table>

    <?php
    }
    ?>

    <p><a href="register.php">Add a new registration</a></p>
  </section>

</main>

<footer>
  <p><?php echo $club_name; ?> - <?php echo $university; ?></p>
</footer>

</body>
</html>
