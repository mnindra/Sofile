<?php

class HomeController extends AdminController
{
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
