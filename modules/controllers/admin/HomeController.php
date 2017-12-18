<?php

class HomeController extends AdminController
{
  public function index()
  {
    $template['title'] = "Dashboard";
    $template['description'] = "Show company statistic";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"]
    );
    $template['page'] = $this->view('admin/home/index', array(), TRUE);
    $this->view("admin/template", $template);
  }
}
?>
