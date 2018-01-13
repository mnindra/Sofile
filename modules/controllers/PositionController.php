<?php

class PositionController extends Controller
{
  public function __construct() {
    $this->model('Setting');
    $this->model('Position');
  }

  public function index()
  {
    $page['setting'] = $this->Setting->all()[0];
    $page['position'] = $this->Position->all();
    $template['page'] = $this->view('user/position/index', $page, true);
    $template['setting'] = $page['setting'];
    $this->view("user/template", $template);
  }
}
