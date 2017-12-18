<?php

class TeamController extends AdminController
{
  public function index() {
    $template['title'] = "Team";
    $template['description'] = "Manage team in company";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
      ["label" => "Team", "link" => "?page=admin/Team"]
    );
    $template['page'] = $this->view('admin/team/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $data = $this->Team->all();
    echo json_encode($data);
  }

  public function store() {
    $this->Team->create($_POST);
  }

  public function update($id) {
    $this->Team->update($_POST, $id);
  }

  public function destroy($id) {
    $this->Team->destroy($id);
  }
}

?>
