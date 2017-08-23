<?php

/**
* the boostrap class, like a router for the website
*/
class Bootstrap
{
  private $controller;
  private $action;
  private $request;

  public function __construct($request)
  {
    // get the current request array
    $this->request = $request;

    // if no controller specified, use home controller, otherwise use
    // the specified controller
    if ($this->request['controller'] == '') {
      $this->controller = 'home';
    } else {
      $this->controller = $this->request['controller'];
    }

    // if no action(page to handle request) specified use the index
    // otherwise use the action
    if ($this->request['action'] == '') {
      $this->action = 'index';
    } else {
      $this->action = $this->request['action'];
    }

  }

  public function createController()
  {
    // check for the class (the controller that will handle the request)
    if (class_exists($this->controller)) {
      // get parents of the controller
      $parents = class_parents($this->controller);
      // check if extends the Controller class
      if (in_array("Controller", $parents)) {
        // check if the controller contains the action passed
        if (method_exists($this->controller, $this->action)) {
          // return an instance of the controller to be used
          return new $this->controller($this->action, $this->request);
        } else {
          // method doesn't exist 
          echo '<h1>Method does not exist</h1>';
          return;
        }
      } else {
        // base controller not found
        echo '<h1>Base controller not found</h1>';
        return;
      }
    } else {
      // Controller class does not exist
      echo '<h1>Controller class does not exist</h1>';
      return;
    }
  }
}