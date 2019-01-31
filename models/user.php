<?php
class UserModel extends Model{
  public function login()
  {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if($post['username'] && $post['password']){

        $stmt = $this->conn->prepare('SELECT user_id,username,password from users WHERE username = :un');
        $stmt->bindParam(':un', $post['username']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->conn ="";
        if($row && password_verify($post['password'], $row['password']))
        {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];

            header('Location: '.ROOT_URL.'home');

        }
        else
          $_SESSION['message'] = 'Please check your username and password';
    }
    return;
  }
  public function register()
  {
      $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if( $post['username'] && $post['password']){
        if(strlen($post['username']) > 11 && strlen($post['password']) > 11  ){
            $_SESSION['message'] = 'Username and password can be 11 characters only!';
        }
        $username = $post['username'];
        $pwd = password_hash($post['password'],PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare('SELECT `username` FROM `users` WHERE `username` = :uname');
        $stmt->bindParam(':uname', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row)
        {
          $stmt = $this->conn->prepare('INSERT INTO users(`username`,`password`) VALUES(:uname,:p)');
          $stmt->bindParam(':uname', $username);
          $stmt->bindParam(':p', $pwd);
          $stmt->execute();
          $_SESSION['message'] = 'Successfully Registered! <a href="'.ROOT_URL.'">Home</a>';
          $this->conn ="";
        }
        else
          $_SESSION['message'] = 'Username already exists. Please try again.';
      }
      return;
  }
}
