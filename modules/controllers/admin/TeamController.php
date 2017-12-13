<?php

class TeamController extends Controller
{
  public function __construct() {
    $this->model('Team');
  }

  public function index() {
    if(!$this->checkSession('user'))
    {
      $this->redirect(SITE_URL . '?page=admin/Login');
    }

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
