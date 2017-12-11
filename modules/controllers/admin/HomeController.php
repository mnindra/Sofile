<?php

class HomeController extends Controller
{
  public function index()
  {
    if(!$this->checkSession('user'))
    {
      $this->redirect(SITE_URL . '?page=admin/Login');
    }

    $template['page'] = $this->view('admin/home/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

}

?>
