<?php

class PositionController extends AdminController
{
  public function index() {
    $template['title'] = "Position";
    $template['breadcrumbs'] = array(
      ["label" => "Home", "link" => "?page=admin/Home"],
      ["label" => "Position", "link" => "?page=admin/Position"]
    );
    $template['page'] = $this->view('admin/position/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $data = $this->Position->all();
    echo json_encode($data);
  }

  public function store() {
    $this->Position->create($_POST);
  }

  public function update($id) {
    $this->Position->update($_POST, $id);
  }

  public function destroy($id) {
    $this->Position->destroy($id);
  }
}

?>
