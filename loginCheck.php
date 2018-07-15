<?php
  // Include necessary files:
  include "dbConnect.php"; // Database connection
  include "../inv-users/includes/passwordModule.php"; // Password encrypt functions.

  // Recieve input login crediendtials via Ajax.
  $email = $_POST['email'] ; // User email.
  $pass = $_POST['password'] ; // User password.

  // Get login crediendtials from database for the user.
  $account_res = $db_conn->query("SELECT * From tbl_account where email = '$email'") ;

  // If account exists:
  if($account_res->num_rows == 1)
  {
    $account_res = $account_res->fetch_assoc() ;

    // Check if password is correct:
    if(password_verify($pass, $account_res['password']))
    {

      session_start(); // Start new session.
      $_SESSION["user_id"] = $account_res['id']; // Store user id in session.
      $user = $email ;
      $_SESSION["user_data"] = $user ; // Store user email in session.

      // Update timestamp of last login.
      $db_conn->query("UPDATE tbl_user Set last_login = current_timestamp where email = '$email'") ;

      // If Remember me box is checked:
      if($_POST["remember"] == "1")
      {
        // Create random token:
        $accountToken = openssl_random_pseudo_bytes(16);
        $accountToken = bin2hex($accountToken);

        // Create cookies on the user's browser:
        setcookie ("account_login",$email,time()+ (86400 * 365),"/");
        setcookie ("account_token",$accountToken,time()+ (86400 * 30),"/");

        // Store remember token in database
        $db_conn->query("UPDATE tbl_account Set remember_hash = '$accountToken' where email = '$email'") ;
      }

      // Could be better:

      // If Remember me box unchecked.
      else
      {
        if(isset($_COOKIE["account_login"]))
        {
          unset($_COOKIE['account_login']);
          setcookie('account_login', '', time() - 3600, '/'); // empty value and old timestamp
        }

        if(isset($_COOKIE["account_token"]))
        {
          unset($_COOKIE['account_token']);
          setcookie('account_token', '', time() - 3600, '/'); // empty value and old timestamp
        }

        $db_conn->query("UPDATE tbl_user Set remember_hash = NULL where email = '$email'") ;

      }

      echo "Success" ;
    }

    // Incorrect password:
    else
    {
      echo "Some of your info isn't correct. Please try again." ;
    }
  }

  // No account with given email.
  else
  {
    echo "Some of your info isn't correct. Please try again.";
  }

?>
