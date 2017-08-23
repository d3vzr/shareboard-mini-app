<?php

/**
* home controller
*/
class Home extends Controller
{
  
  // the function that is called when the controller is instantiated
  // from the second 'this' inside the executeAction()
  // because the default action is 'Index'
  protected function index()
  {
    $viewmodel = new HomeModel();
    $this->returnView($viewmodel->index(), true);
  }
}