<?php

function get_courses($filename) {
  $file_content = file_get_contents($filename);
  
  if ($file_content) {
    $courses = json_decode($file_content, TRUE);
    
    if ($courses) {
      return $courses;
    } else {
      return array();
    }
  }
  
  return array();
}

function save_courses($courses, $filename) {
  file_put_contents($filename, json_encode($courses, JSON_PRETTY_PRINT));
}
