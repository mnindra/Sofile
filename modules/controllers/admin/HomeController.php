<?php

class HomeController extends Controller
{
  public function __construct() {
    if(!$this->checkSession('user'))
    {
      $this->redirect(SITE_URL . '?page=admin/Login');
    }
  }

  public function index()
  {
    $template['title'] = "Home";
    $template['breadcrumbs'] = array(
      ["label" => "Home", "link" => "?page=admin/Home"]
    );
    $template['page'] = $this->view('admin/home/index', array(), TRUE);
    $this->view("admin/template", $template);
  }
}
?>
