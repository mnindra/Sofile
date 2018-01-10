<?php

class HomeController extends Controller
{
  public function __construct() {
    $this->model('Setting');
    $this->model('Service');
    $this->model('Project');
    $this->model('Testimonial');
  }

  public function index()
  {
    $page['setting'] = $this->Setting->all()[0];
    $page['service'] = $this->Service->all();
    $page['project'] = $this->Project->where("portfolio = 1");
    $page['testimonial'] = $this->Testimonial->all();

    $template['page'] = $this->view('user/home/index', $page, true);
    $template['setting'] = $page['setting'];
    $this->view("user/template", $template);
  }
}
?>
