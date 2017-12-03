<?php

class HomeController extends Controller
{
  public function index()
  {
    if(!$this->checkSession('user'))
    {
      $this->redirect(SITE_URL . '?page=Login');
    }

    $this->view("welcome");
  }

}

?>
