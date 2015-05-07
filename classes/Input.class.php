<?php

class Input {
  public static function exists($type = 'post') {
    switch ($type) {
      case 'post' :
      return (!empty($_POST)) ? TRUE : FALSE;
      break;

      case 'get' :
      return (!empty($_GET)) ? TRUE : FALSE;
      break;

      default :
      return FALSE;
      break;
    }
  }

  public static function get($item) {
    if (isset($_POST[$item])) {
      return $_POST[$item];
    } else if (isset($_GET[$item])) {
      return $_GET[$item];
    } else  if(isset($_FILES[$item])) {
      $file = $_FILES[$item];

      $file_name = $file['name'];
      $file_tmp = $file['tmp_name'];
      $file_size = $file['size'];
      $file_error = $file['error'];

      $file_ext = explode ('.', $file_name);
      $file_ext = strtolower(end($file_ext));
      $allowed = array('png', 'jpg');

      if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
          if ($file_size <= 2097152) {
            $file_name_new = uniqid('', true) . '.' . $file_ext;
            $file_destination = 'uploads/' . $file_name_new;
            if (move_uploaded_file($file_tmp, $file_destination)) {
              echo $file_destination;
            }
          }
        }
      }

      return $file_destination;
    }
    return '';
  }
  
}