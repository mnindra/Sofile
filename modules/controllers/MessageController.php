<?php

class MessageController extends Controller
{
  public function __construct() {
    $this->model('Message');
  }

  public function store() {
    $this->Message->create($_POST);
  }
}
?>
