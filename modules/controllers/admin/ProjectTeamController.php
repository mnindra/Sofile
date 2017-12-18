<?php

class ProjectTeamController extends AdminController
{
  public function index($id) {
    $project_id = $id;
    $project = $this->Project->find($project_id);

    $template['title'] = "Manage Team for " . $project->title;
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
      ["label" => "Project", "link" => "?page=admin/Project"],
      ["label" => "Teams", "link" => ""],
    );

    $template['page'] = $this->view('admin/projectTeam/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all($id) {
    $project_id = $id;

    $join = array(
      [
        'table' => 'team',
        'field' => 'team_id'
      ],
    );

    $data = $this->ProjectTeam->where("project_id = $project_id", $join);
    echo json_encode($data);
  }

  public function store() {
    $this->ProjectTeam->create($_POST);
  }

  public function update($id) {
    $this->ProjectTeam->update($_POST, $id);
  }

  public function destroy($id) {
    $this->ProjectTeam->destroy($id);
  }

  public function team($id) {
    $project_id = $id;
    echo json_encode($this->ProjectTeam->select_unjoined_team($project_id));
  }
}
?>
