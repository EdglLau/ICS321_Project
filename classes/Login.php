<?php
class Login
{
    //database connection
    private $db_connection = null;
    private $user_name = "";
    private $user_email = "";
    private $user_password_hash = "";
    private $user_is_logged_in = false;
    public $errors = array();
    public $messages = array();
    public function __construct()
    {
        session_start();

        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        elseif (!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)) {
            $this->loginWithSessionData();
        }
        elseif (isset($_POST["login"])) {
            $this->loginWithPostData();
        }
    }
	
    private function loginWithSessionData()
    {
        $this->user_is_logged_in = true;
    }
	
    private function loginWithPostData()
    {
        if (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->connect_errno) {
                $this->user_name = $this->db_connection->real_escape_string($_POST['user_name']);
                $checklogin = $this->db_connection->query("SELECT user_name, user_email, user_password_hash FROM users WHERE user_name = '" . $this->user_name . "';");
                if ($checklogin->num_rows == 1) {
                    $result_row = $checklogin->fetch_object();
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {
                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_logged_in'] = 1;
                        $this->user_is_logged_in = true;
                    } else {
                        $this->errors[] = "Wrong password. Try again.";
                    }
                } else {
                    $this->errors[] = "This user does not exist.";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        } elseif (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        }
    }

    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();
        $this->user_is_logged_in = false;
        $this->messages[] = "You have been logged out.";

    }
	
    public function isUserLoggedIn()
    {
        return $this->user_is_logged_in;
    }
}
?>