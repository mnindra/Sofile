<?php

class ProjectController extends AdminController
{
  public function index() {
    $page['service'] = $this->Service->all();

    $template['title'] = "Project";
    $template['description'] = "Manage all project in company";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
      ["label" => "Project", "link" => "?page=admin/Project"]
    );
    $template['page'] = $this->view('admin/project/index', $page, TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $join = array(
      [
        'table' => 'service',
        'field' => 'service_id'
      ],
    );

    $data = $this->Project->all($join);
    echo json_encode($data);
  }

  public function store() {
    $this->Project->create($_POST);
  }

  public function update($id) {
    $this->Project->update($_POST, $id);
  }

  public function destroy($id) {
    $this->Project->destroy($id);
  }
}
?>
