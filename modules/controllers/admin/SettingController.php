<?php

class SettingController extends AdminController
{
  public function index() {
    $template['title'] = "Setting";
    $template['description'] = "Manage company setting";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
      ["label" => "Setting", "link" => "?page=admin/Setting"]
    );
    $template['page'] = $this->view('admin/setting/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $data = $this->Setting->find(1);
    echo json_encode($data);
  }

  public function update() {
    $id = 1;
    $this->Setting->update($_POST, $id);
  }
}

?>
