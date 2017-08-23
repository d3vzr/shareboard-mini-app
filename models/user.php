<?php

/**
* user model
*/
class UserModel extends Model
{
  
  public function register()
  {
    // sanitize POST
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if ($post['submit']) {
      if ($post['name'] == '' || $post['email'] == '' || $post['password'] == '') {
        Messages::setMsg('Please fill in all fields!', 'error');
        return;
      }
      // encrypt password 
      $password = md5($post['password']);
      // insert into mysql db
      $this->query(
      'INSERT INTO users(name, email, password) VALUES(:name, :email, :password)'
      );
      $this->bind(':name', $post['name']);
      $this->bind(':email', $post['email']);
      $this->bind(':password', $password);

      $this->execute();

      // verify
      if ($this->lastInsertId()) {
        // redirect
        header('Location: ' . ROOT_URL . 'users/login');
      }
      return;
    }
  }

  public function login()
  {
    // sanitize POST
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if ($post['submit']) {
      // encrypt password 
      $password = md5($post['password']);
      // Compare login
      $this->query(
      'SELECT * FROM users WHERE email = :email AND password = :password'
      );
      $this->bind(':email', $post['email']);
      $this->bind(':password', $password);

      $row = $this->single();

      if ($row) {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_data'] = array(
          "id"    => $row['id'],
          "name"  => $row['name'],
          "email" => $row['email']
        );
        header('Location: ' . ROOT_URL . 'shares');
      } else {
        Messages::setMsg('Incorrect Login', 'error');
      }
    }
  }
}