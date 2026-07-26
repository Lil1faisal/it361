<?php
// ===== صفحة كل الفعاليات =====
include "settings.php";
include "events_data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Events - <?php echo $club_name; ?></title>
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

  <section>
    <h2>All Events</h2>
    <p>All the events of this year.</p>

    <table>
      <caption>Events of the year 2026 / 2027</caption>
      <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Date</th>
        <th>Time</th>
        <th>Place</th>
        <th>Seats</th>
        <th>Details</th>
      </tr>

      <?php
      // صف في الجدول لكل فعالية
      foreach ($events as $event) {
      ?>
        <tr>
          <td><?php echo $event["id"]; ?></td>
          <td><?php echo $event["title"]; ?></td>
          <td><?php echo $event["date"]; ?></td>
          <td><?php echo $event["time"]; ?></td>
          <td><?php echo $event["place"]; ?></td>
          <td><?php echo $event["seats"]; ?></td>
          <td><a href="event.php?id=<?php echo $event["id"]; ?>">Details</a></td>
        </tr>
      <?php
      }
      ?>

    </table>

    <p>Number of events: <?php echo count($events); ?></p>
  </section>

</main>

<footer>
  <p><?php echo $club_name; ?> - <?php echo $university; ?></p>
</footer>

</body>
</html>
