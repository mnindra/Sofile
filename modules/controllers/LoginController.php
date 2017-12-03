<?php

class LoginController extends Controller
{
  public function __construct() {
    $this->model('User');
  }

  public function index()
  {
    $this->view("login");
  }

  public function login()
  {
    if($this->User->login($_POST['username'], $_POST['password']))
    {
      $this->setSession("username", $_POST['username']);
    }
    $this->redirect(SITE_URL);
  }

  public function logout()
  {
    $this->unsetSession('username');
    $this->redirect(SITE_URL);
  }
}

?>
