<?php

class TestimonialController extends AdminController
{
  public function index($id) {
    $id_project = $id;
    $project = $this->Project->find($id_project);

    $template['title'] = "Testimonial for " . $project->title;
    $template['description'] = "Manage project's testimonial";
    $template['breadcrumbs'] = array(
      ["label" => "Dashboard", "link" => "?page=admin/Home"],
      ["label" => "Project", "link" => "?page=admin/Project"],
      ["label" => "Testimonials", "link" => ""],
    );

    $template['page'] = $this->view('admin/testimonial/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all($id) {
    $project_id = $id;
    $data = $this->Testimonial->where("project_id = $project_id");
    echo json_encode($data);
  }

  public function store() {
    $this->Testimonial->create($_POST);
  }

  public function update($id) {
    $this->Testimonial->update($_POST, $id);
  }

  public function destroy($id) {
    $this->Testimonial->destroy($id);
  }
}

?>
