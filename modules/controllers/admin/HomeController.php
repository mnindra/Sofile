<?php

class HomeController extends AdminController
{
  public function index()
  {
    $page['user'] = count($this->User->all());
    $page['team'] = count($this->Team->all());
    $page['project'] = count($this->Project->all());
    $page['service'] = count($this->Service->all());

    $template['title'] = "Dashboard";
    $template['description'] = "Show company statistic";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"]
    );
    $template['page'] = $this->view('admin/home/index', $page, TRUE);
    $this->view("admin/template", $template);
  }
}
?>
