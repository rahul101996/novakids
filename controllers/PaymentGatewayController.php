<?php

class PaymentGatewayController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }
   
    public function PaymentGateway()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Payment Gateway";
        $pageModule = "Payment Gateway";


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // $products = getData("tbl_products");
             $payment_gateway = $this->getAllPayment_gateway();
            require 'views/master/payment-gateway.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // printWithPre($_FILES);
            // printWithPre($_POST);

            if (isset($_POST["razorpay"])) {
                // echo "hiee";

                $id = 1;
                $data = [

                    'keyid' => $_POST["razorpaykeyid"],
                    'secretkey' => $_POST["razorpaysecretkey"],

                ];
                $data = $this->updatePayment_gateway($id, $data);
            } else if (isset($_POST["cashfree"])) {
                // echo "biee";
                $id = 2;
                $data = [
                    'keyid' => $_POST["cashfreekeyid"],
                    'secretkey' => $_POST["cashfreesecretkey"],

                ];
                $data = $this->updatePayment_gateway($id, $data);
                echo $data;
            }
            // die();
            $_SESSION['success'] = "Payment Gateway Updated Successfully";
            header("Location: /admin/payment-gateway");
            exit();
        }

       



    }
     public function updatePayment_gateway(int $id, array $data)
    {
        try {
            $setPart = [];
            foreach ($data as $key => $value) {
                $setPart[] = "$key = :$key";
            }
            $setClause = implode(", ", $setPart);
            $sql = "UPDATE payment_gateway SET " . $setClause . " WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return $sql;
        } catch (\PDOException $e) {
            // error_log($e->getMessage());
            return $e->getMessage();
        }
    }
    public function ChangePaymentGateway()
    {
        if (isset($_POST["id"])) {

    $id = $_POST["id"];
    $idremove ='';
    $data = $this->removepayment_gateway($id);
    $response = [
                    "success" => true,
                    
                        ];
    echo json_encode($response);
    
   

}
    }

     public function removepayment_gateway($id)
    {
        try {
            // Begin transaction
            $this->db->beginTransaction();
    
            // Update all payment gateways to status 0
            $sql = "UPDATE payment_gateway SET `status` = 0";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
    
            // Update specific payment gateway to status 1
            $sql = "UPDATE payment_gateway SET `status` = 1 WHERE `id` = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Commit the transaction
            $this->db->commit();
    
            $data = [
                "sql" => $sql,
                "response" => true,
                "id"=>$id
            ];
            return $data;
        } catch (\PDOException $e) {
            // Roll back the transaction if something goes wrong
            $this->db->rollBack();
            // Log error if needed: error_log($e->getMessage());
            return [
                "response" => false,
                "error" => $e->getMessage()
            ];
        }
    }
    public function getAllPayment_gateway()
    {
        try {
            $sql = "SELECT * FROM `payment_gateway` ORDER BY id DESC";
            $stmt = $this->db->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // error_log($e->getMessage()); // Uncomment if you wish to log errors
            return [];
        }
    }

}
