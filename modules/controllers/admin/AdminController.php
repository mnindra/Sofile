<?php

class AdminController extends Controller
{
  public function __construct() {
    if(!$this->checkSession('user'))
    {
      $this->redirect(SITE_URL . '?page=admin/Login');
    }
    $this->model("Position");
    $this->model("Team");
    $this->model("User");
    $this->model("Service");
    $this->model("Project");
    $this->model("ProjectTeam");
    $this->model("Testimonial");
    $this->model("Setting");
    $this->model("Message");
  }
}
