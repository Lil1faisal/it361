<?php
// ==========================================================
//  ملف بيانات الفعاليات
//  لإضافة فعالية جديدة: انسخ آخر array وغيّر الرقم والمعلومات.
//  لحذف فعالية: امسح الـ array حقها.
//  انتبه: كل array تنتهي بفاصلة إلا الأخيرة.
// ==========================================================

$events = array(

  array(
    "id"    => 1,
    "title" => "Ethical Hacking Workshop",
    "date"  => "2026-08-12",
    "time"  => "5:00 PM",
    "place" => "Lab 204",
    "seats" => 40,
    "info"  => "A workshop about ethical hacking for beginners. No experience needed. Please bring your laptop."
  ),

  array(
    "id"    => 2,
    "title" => "Phishing Awareness Day",
    "date"  => "2026-09-03",
    "time"  => "10:00 AM",
    "place" => "Main Hall",
    "seats" => 120,
    "info"  => "A session about fake emails and fake websites, and how to keep your accounts safe. There is a quiz at the end."
  ),

  array(
    "id"    => 3,
    "title" => "Capture The Flag Contest",
    "date"  => "2026-09-24",
    "time"  => "9:00 AM",
    "place" => "Lab 101",
    "seats" => 60,
    "info"  => "A competition between students. Each team has three members. The first three teams get certificates."
  ),

  array(
    "id"    => 4,
    "title" => "Network Security Session",
    "date"  => "2026-10-08",
    "time"  => "4:00 PM",
    "place" => "Lab 204",
    "seats" => 35,
    "info"  => "A short session about networks and how to keep them safe. Open for all students."
  ),

  array(
    "id"    => 5,
    "title" => "Digital Forensics Workshop",
    "date"  => "2026-11-05",
    "time"  => "9:00 AM",
    "place" => "Lab 101",
    "seats" => 45,
    "info"  => "An introduction to digital forensics. We will use some tools in the lab."
  ),

  array(
    "id"    => 6,
    "title" => "Career Day",
    "date"  => "2026-11-26",
    "time"  => "10:00 AM",
    "place" => "Main Hall",
    "seats" => 150,
    "info"  => "Companies visit the university. Bring your CV if you want to apply for training."
  )

);
?>
