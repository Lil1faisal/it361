<?php
// ===== الصفحة الرئيسية =====
include "settings.php";      // اسم النادي والجامعة والإيميل
include "events_data.php";   // مصفوفة الفعاليات
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home - <?php echo $club_name; ?></title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ===== الهيدر ===== -->
<header>
  <h1><?php echo $club_name; ?></h1>
  <p><?php echo $university; ?></p>
</header>

<!-- ===== شريط التنقل ===== -->
<nav>
  <a href="index.php" class="active">Home</a>
  |
  <a href="events.php">Events</a>
  |
  <a href="register.php">Registration</a>
  |
  <a href="registrations.php">Registrations List</a>
  |
  <a href="about.php">About / Contact</a>
</nav>

<!-- ===== المحتوى ===== -->
<main>

  <section>
    <h2>Welcome to the <?php echo $club_name; ?></h2>

    <p><?php echo $about_short; ?></p>

    <p>Joining is free for all students. Choose an event from the list and fill
       the registration form.</p>

    <h3>What we do</h3>
    <ul>
      <li>Workshops</li>
      <li>Competitions</li>
      <li>Awareness sessions</li>
      <li>Career day</li>
      <li>Certificates for members</li>
    </ul>
  </section>

  <section>
    <h2>Next 3 Events</h2>

    <?php
    // الفعاليات مرتبة بالتاريخ، فناخذ أول ثلاث فقط
    for ($i = 0; $i < 3; $i++) {
    ?>
      <h3><?php echo $events[$i]["title"]; ?></h3>
      <p>
        Date: <?php echo $events[$i]["date"]; ?> &nbsp;|&nbsp;
        Time: <?php echo $events[$i]["time"]; ?> &nbsp;|&nbsp;
        Place: <?php echo $events[$i]["place"]; ?>
      </p>
      <p><a href="event.php?id=<?php echo $events[$i]["id"]; ?>">Read more</a></p>
      <hr>
    <?php
    }
    ?>

    <p><a href="events.php">See all events</a></p>
  </section>

</main>

<!-- ===== الفوتر ===== -->
<footer>
  <p><?php echo $club_name; ?> - <?php echo $university; ?></p>
</footer>

</body>
</html>
