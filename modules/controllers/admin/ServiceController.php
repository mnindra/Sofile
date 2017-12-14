<?php

class ServiceController extends AdminController
{
  public function index() {
    $template['title'] = "Service";
    $template['breadcrumbs'] = array(
      ["label" => "Home", "link" => "?page=admin/Home"],
      ["label" => "Service", "link" => "?page=admin/Service"]
    );
    $template['page'] = $this->view('admin/service/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $data = $this->Service->all();
    echo json_encode($data);
  }

  public function store() {
    $this->Service->create($_POST);
  }

  public function update($id) {
    $this->Service->update($_POST, $id);
  }

  public function destroy($id) {
    $this->Service->destroy($id);
  }
}

?>
