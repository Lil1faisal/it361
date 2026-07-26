<?php
// ===== صفحة تفاصيل فعالية واحدة =====
// مثال على الرابط:  event.php?id=3
include "settings.php";
include "events_data.php";

// 1) نقرأ الرقم من الرابط
$id = 0;
if (isset($_GET["id"])) {
  $id = $_GET["id"];
}

// 2) ندور على الفعالية اللي رقمها يساوي id
$found = "no";
$title = "";
$date  = "";
$time  = "";
$place = "";
$seats = "";
$info  = "";

foreach ($events as $event) {
  if ($event["id"] == $id) {
    $found = "yes";
    $title = $event["title"];
    $date  = $event["date"];
    $time  = $event["time"];
    $place = $event["place"];
    $seats = $event["seats"];
    $info  = $event["info"];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event Details - <?php echo $club_name; ?></title>
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
  <a href="events.php" class="active">Events</a>
  |
  <a href="register.php">Registration</a>
  |
  <a href="registrations.php">Registrations List</a>
  |
  <a href="about.php">About / Contact</a>
</nav>

<main>

  <?php
  // 3) نعرض النتيجة
  if ($found == "no") {
  ?>
    <section>
      <h2>Event Not Found</h2>
      <p class="error">Sorry, there is no event with this number.</p>
      <p><a href="events.php">Back to events</a></p>
    </section>
  <?php
  } else {
  ?>
    <section>
      <h2><?php echo $title; ?></h2>

      <p><?php echo $info; ?></p>

      <h3>Information</h3>
      <table>
        <tr>
          <th>Date</th>
          <td><?php echo $date; ?></td>
        </tr>
        <tr>
          <th>Time</th>
          <td><?php echo $time; ?></td>
        </tr>
        <tr>
          <th>Place</th>
          <td><?php echo $place; ?></td>
        </tr>
        <tr>
          <th>Seats</th>
          <td><?php echo $seats; ?></td>
        </tr>
      </table>

      <p>
        <a href="register.php">Register in this event</a> &nbsp;|&nbsp;
        <a href="events.php">Back to events</a>
      </p>
    </section>
  <?php
  }
  ?>

</main>

<footer>
  <p><?php echo $club_name; ?> - <?php echo $university; ?></p>
</footer>

</body>
</html>
