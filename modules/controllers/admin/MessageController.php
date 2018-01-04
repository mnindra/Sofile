<?php

class MessageController extends AdminController
{
  public function index() {
    $template['title'] = "Message";
    $template['description'] = "Manage incoming message";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
      ["label" => "Message", "link" => "?page=admin/Message"]
    );
    $template['page'] = $this->view('admin/message/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $data = $this->Message->where("job_app = 0");
    echo json_encode($data);
  }

  public function show($id) {
    $data = $this->Message->find($id);
    echo json_encode($data);
  }

  public function destroy($id) {
    $this->Message->destroy($id);
  }
}
