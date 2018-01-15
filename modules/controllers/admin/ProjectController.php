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
    $photo = uniqid() . ".jpg";
    move_uploaded_file($_FILES['photo']['tmp_name'], "public/upload/project/" . $photo);

    $_POST['photo'] = $photo;
    $this->Project->create($_POST);
  }

  public function update($id) {
    if (isset($_FILES['photo'])) {
      $project = $this->Project->find($id);
      unlink("public/upload/project/" . $project->photo);

      $photo = uniqid() . ".jpg";
      move_uploaded_file($_FILES['photo']['tmp_name'], "public/upload/project/" . $photo);
      $_POST['photo'] = $photo;
    }

    $this->Project->update($_POST, $id);
  }

  public function destroy($id) {
    $project = $this->Project->find($id);
    unlink("public/upload/project/" . $project->photo);
    $this->Project->destroy($id);
  }
}
