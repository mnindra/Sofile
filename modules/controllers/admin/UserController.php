<?php

class UserController extends AdminController
{
  public function index() {
    $page['position'] = $this->Position->all();
    $page['team'] = $this->Team->all();

    $template['title'] = "User";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
      ["label" => "User", "link" => "?page=admin/User"]
    );
    $template['page'] = $this->view('admin/user/index', $page, TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $join = array(
      [
        'table' => 'position',
        'field' => 'position_id'
      ],
      [
        'table' => 'team',
        'field' => 'team_id'
      ],
    );

    $data = $this->User->all($join);
    echo json_encode($data);
  }

  public function store() {
    if(count($this->User->where("username = '$_POST[username]'"))) return;
    if(count($this->User->where("email = '$_POST[email]'"))) return;

    $_POST['password'] = md5($_POST['password']);
    $this->User->create($_POST);
  }

  public function update($id) {
    $this->User->update($_POST, $id);
  }

  public function destroy($id) {
    $this->User->destroy($id);
  }
}

?>
