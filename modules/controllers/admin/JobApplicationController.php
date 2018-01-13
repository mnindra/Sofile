<?php

class JobApplicationController extends AdminController
{
  public function index() {
    $template['title'] = "Job Application";
    $template['description'] = "Manage incoming job application";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
      ["label" => "Job Application", "link" => "?page=admin/JobApplication"]
    );
    $template['page'] = $this->view('admin/job_application/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $data = $this->Message->where("job_app = 1");
    echo json_encode($data);
  }

  public function show($id) {
    $data = $this->Message->find($id);
    echo json_encode($data);
  }

  public function destroy($id) {
    $data = $this->Message->find($id);
    unlink('public/upload/' . $data->file);
    $this->Message->destroy($id);
  }
}
