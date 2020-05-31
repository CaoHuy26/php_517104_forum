<?php
  # Get current time
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $currentTime = date("Y-m-d H:i:s");
  $currentTime = strtotime($currentTime);

  # Upload time
  $time = strtotime('2020-05-29 16:27:19');

  $diff = abs($currentTime - $time);
  $years = floor($diff / (365 * 60 * 60 * 24));  
  $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));  
  $days = floor(($diff - $years * 365 * 60 * 60 *24 - $months * 30 * 60 * 60 * 24)/ (60 * 60 * 24)); 

  #echo $days;
?>