<?php

class MessageController extends Controller
{
  public function __construct() {
    $this->model('Message');
  }

  public function store() {
    $tmp = $_FILES['file']['tmp_name'];
    $filename = uniqid() . '.pdf';
    move_uploaded_file($tmp, 'public/upload/attachment/' . $filename);

    $_POST['file'] = $filename;
    $this->Message->create($_POST);
  }
}
?>
