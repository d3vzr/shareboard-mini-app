<?php

/**
* shares controller
*/
class Shares extends Controller
{
  
  // the function that is called when the controller is instantiated
  // from the second 'this' inside the executeAction()
  // because the default action is 'Index'
  protected function index()
  {
    $viewmodel = new ShareModel();
    $this->returnView($viewmodel->index(), true);
  }

  protected function add()
  {
    if (!isset($_SESSION['is_logged_in'])) {
      header('Location: ' . ROOT_URL . 'shares');
    }
    $viewmodel = new ShareModel();
    $this->returnView($viewmodel->add(), true);
  }
}