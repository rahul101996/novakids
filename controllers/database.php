<?php

class Database
{
    private $host = "localhost:3310";
    private $dbname = "novakids";
    private $username = "root";
    private $password = "";

    // private $host = "localhost"; 
    // private $dbname = "u597096203_novakids";
    // private $username = "u597096203_novakids";
    // private $password = "f[A7m9pbh";

    private $charset = "utf8mb4";
    private $pdo;
    private $base_url = "https://vikassawantsacademy.com/";

    private $siteName = "Vikas Sawants Academy";
    private $software = "https://software.teamrudra.com/";
    private $softwareid = "4";
    private $fast2sms_api = "wzVHgpkoYJa6PFCqDevZMGu83l4LhOAtm9NQxXRdK7f0inSTEBkM6hS0CsJvGBHYZWgq4aRQ19cUxuri";
    private $fast2sms_api_rudratech = "Y2mCHcBsfTPSnLQMx5Gwa40zE3NW6Xg9oFt18bKrZduvjiUJkDS8qzkslUI2AmRhj57aPt1MVb4OryCB";

    public function __construct()
    {

        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection()
    {
        if ($this->pdo instanceof PDO) {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } else {
            throw new Exception("Connection not established.");
        }
    }
    public function getUrl()
    {
        return  $this->base_url;
    }

    public function getSiteName()
    {
        return  $this->siteName;
    }
    public function getSoftware()
    {
        return  $this->software;
    }
    public function getSoftwareId()
    {
        return  $this->softwareid;
    }
    public function getfast2sms_API()
    {
        return [$this->fast2sms_api, $this->fast2sms_api_rudratech];
    }
}
