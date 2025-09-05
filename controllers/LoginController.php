<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/database.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/GeneralController.php";

class LoginController extends GeneralController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
        parent::__construct($this->db);
    }

    public function checkSession()
    {
        if (empty($_SESSION) || !isset($_SESSION['role'])) {
            redirect('/');
        } else {
            return true;
        }
    }

    public function logout()
    {

        session_destroy();
        redirect("/");
    }

    public function index()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Login";
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (empty($_SESSION) || !isset($_SESSION['id'])) {
            } else {
                redirect('/dashboard');
            }
            require 'views/login.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // printWithPre($_POST);
            // die();

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->getUserAuthentication($email, $password);

            if (!empty($user)) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['eid'] = $user['eid'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];

                $_SESSION['success'] = "Login successfully";
                redirect('/dashboard');
            } else {
                $_SESSION['err'] = "Email Or Password not matched";
                redirect('/');
            }
        }
    }

    public function registerOnlineUser(array $data)
    {
        try {
            // Add the created_date, created_time, created_at fields
            $data["created_date"] = date("Y-m-d");
            $data["created_time"] = date("H:i:s");
            $data["created_at"] = date("Y-m-d H:i:s");

            // Dynamically create columns and placeholders
            $columns = implode(", ", array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));

            // Prepare the SQL statement
            $sql = "INSERT INTO online_users (" . $columns . ") VALUES (" . $placeholders . ")";
            $stmt = $this->db->prepare($sql);

            // Bind the values
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            // Execute the statement
            $stmt->execute();

            return $this->db->lastInsertId();
        } catch (\PDOException $e) {
            // error_log($e->getMessage()); // Uncomment if you wish to log errors
            return false;
        }
    }
    public function getUserByphone($mobile, $email = null)
    {
        try {
            // Prepare the SQL statement
            $query = '';
            if ($email != null) {
                # code...
                $query = " OR username = :email";
            }
            $sql = "SELECT * FROM online_users WHERE mobile = :mobile $query";
            $stmt = $this->db->prepare($sql);

            // Bind the username parameter
            $stmt->bindValue(':mobile', $mobile);
            if ($email != null) {
                # code...
                $stmt->bindValue(':email', $email);
            }


            // Execute the statement
            $stmt->execute();

            // Fetch the user data
            $phone = $stmt->fetch(PDO::FETCH_ASSOC);

            // print_r($phone);
            return $phone;
        } catch (\PDOException $e) {
            // error_log($e->getMessage()); // Uncomment if you wish to log errors
            return false;
        }
    }

    public function getUserAuthentication($userid, $password)
    {
        try {
            $sql = "SELECT * FROM admin WHERE email = :userid AND status = '1'";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':userid', $userid);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($user)) {
                if (password_verify($password, $user['password'])) {
                    return $user;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
    public function getOnlineUserAuthentication($userid, $password)
    {
        try {
            $sql = "SELECT * FROM `online_users` WHERE username = :userid AND is_active = '1'";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':userid', $userid);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($user)) {
                if (password_verify($password, $user['password'])) {
                    return $user;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
    public function login()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Login";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (empty($_SESSION) || !isset($_SESSION['id'])) {
            } else {
                redirect('/');
            }
            $Districts = $this->getData2("SELECT * FROM `tbl_district`");
            // printWithPre($Districts);
            require 'views/website/login.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // printWithPre($_POST);
            // die();

            if (isset($_POST['register'])) {
                unset($_POST['register']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_POST['password'] = $password;
                // printWithPre($password);
                // die();
                $user = $this->getData2("SELECT * FROM online_users WHERE email = " . $_POST['email'] . " OR phone = " . $_POST['phone'] . " AND status = 1");
                // printWithPre($user);

                if (empty($user)) {

                    $_POST['role'] = "3";
                    $data["created_date"] = date("Y-m-d");
                    $data["created_time"] = date("H:i:s");
                    $data["created_at"] = (isset($data["created_at"]) ? $data["created_at"] : date("Y-m-d H:i:s"));

                    if (add($this->db, $_POST, 'online_users', false)) {

                        $sql = 'SELECT * FROM online_users WHERE email = :email OR phone = :phone AND status = 1';
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindValue(':email', $_POST['email']);
                        $stmt->bindValue(':phone', $_POST['phone']);
                        $stmt->execute();
                        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // printWithPre($_POST);
                        // printWithPre($user);
                        // die();

                        if (!empty($user)) {

                            $_SESSION['email'] = $user[0]['email'];
                            $_SESSION['userid'] = $user[0]['id'];
                            $_SESSION['username'] = $user[0]['name'];
                            $_SESSION['district'] = $user[0]['district'];
                            $_SESSION['state'] = $user[0]['state'];
                            $_SESSION['role'] = $user[0]['role'];
                            $_SESSION['phone'] = $user[0]['phone'];
                            $_SESSION['profile_img'] = $user[0]['profile_img'];
                            $_SESSION['dob'] = $user[0]['dob'];

                            $_SESSION['success'] = "Login successfully";

                            redirect('/');
                        } else {
                            $_SESSION['err'] = "Something went wrong";
                        }
                    } else {
                        $_SESSION['err'] = "Something went wrong";
                    }
                } else {
                    $_SESSION['err'] = "Email Or Password not matched";
                    redirect('/login');
                }
            }
            require 'views/website/login.php';
        }
    }
       public function Register()
    {

        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Register";
        require 'views/website/register.php';
    }
}
