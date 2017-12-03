<?php

class HomeController extends Controller
{
  public function index()
  {
    if(!$this->checkSession('username'))
    {
      $this->redirect('index.php?page=Login');
    }

    $this->view("welcome");
  }

}

?>
