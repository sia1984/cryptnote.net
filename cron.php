<?php
$files = glob("data/*?container");
$now   = time();

foreach ($files as $file) {
if (is_file($file)) {
  if ($now - filemtime($file) >= 60 * 60 * 24 * 10) {
    unlink($file);
  }
}
}
