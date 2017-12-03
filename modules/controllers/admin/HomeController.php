<?php

class HomeController extends Controller
{
  public function index()
  {
    if(!$this->checkSession('user'))
    {
      $this->redirect(SITE_URL . '?page=admin/Login');
    }

    $this->view("admin/welcome");
  }

}

?>
