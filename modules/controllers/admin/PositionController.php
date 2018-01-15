<?php

class PositionController extends AdminController
{
  public function index() {
    $template['title'] = "Position";
    $template['description'] = "Manage user position in company";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
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
    $photo = uniqid() . ".jpg";
    move_uploaded_file($_FILES['photo']['tmp_name'], "public/upload/position/" . $photo);

    $_POST['photo'] = $photo;
    $this->Position->create($_POST);
  }

  public function update($id) {
    if (isset($_FILES['photo'])) {
      $position = $this->Position->find($id);
      unlink("public/upload/position/" . $position->photo);

      $photo = uniqid() . ".jpg";
      move_uploaded_file($_FILES['photo']['tmp_name'], "public/upload/position/" . $photo);
      $_POST['photo'] = $photo;
    }

    $this->Position->update($_POST, $id);
  }

  public function destroy($id) {
    $position = $this->Position->find($id);
    unlink("public/upload/position/" . $position->photo);
    $this->Position->destroy($id);
  }
}

?>
