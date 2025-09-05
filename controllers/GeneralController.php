<?php
// include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/ModuleController.php";
class GeneralController
{
    private $db;
    // private $table;
    public function __construct($db = null)
    {
        // echo "General Controller";
        // var_dump($db);
        if ($db != null) {
            $this->db = $db;
        } else {
            $this->db = getDBObject()->getConnection();
        }

        // parent::__construct($db);
    }

    public function add($data, $table, $timestamp = true)
    {

        $db = getDBObject()->getConnection();
        if ($timestamp) {
            $data["created_date"] = date("Y-m-d");
            $data["created_time"] = date("H:i:s");
            $data["created_at"] = (isset($data["created_at"]) ? $data["created_at"] : date("Y-m-d H:i:s"));
            $data["created_by"] = (isset($data["created_by"])) ? $data["created_by"] : $_SESSION["id"];
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        // Prepare the SQL statement
        $sql = "INSERT INTO `$table` (" . $columns . ") VALUES (" . $placeholders . ")";
        // echo $sql;
        $stmt = $db->prepare($sql);

        // Bind the values
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // echo $sql;
        // exit();

        // Execute the statement
        $stmt->execute();

        return $db->lastInsertId();
    }

    public function update($data, $id, $table, $column = "id")
    {
        try {
            $setPart = [];
            foreach ($data as $key => $value) {
                $setPart[] = "$key = :$key";
            }
            $setClause = implode(", ", $setPart);

            $sql = "UPDATE `$table` SET " . $setClause . " WHERE $column = :id";
            // echo $sql;
            $stmt = $this->db->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            // error_log($e->getMessage()); // Uncomment if you wish to log errors
            echo $e->getMessage();
            $this->db->rollBack();
            return false;
        }
    }

    public function updateSQL($data, $table, $sql)
    {
        $setPart = [];
        foreach ($data as $key => $value) {
            $setPart[] = "$key = :$key";
        }
        $setClause = implode(", ", $setPart);

        $sql = "UPDATE `$table` SET " . $setClause . " WHERE $sql";
        // echo $sql;
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function delete($id, $table, $column = "id")
    {

        $sql = "DELETE FROM `$table` WHERE $column = :id";
        $stmt = $this->db->prepare($sql);

        // Bind the id parameter
        $stmt->bindValue(':id', $id);

        // Execute the statement
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function deleteAll($table)
    {

        $sql = "TRUNCATE `$table`";
        $stmt = $this->db->prepare($sql);
        // Execute the statement
        $stmt->execute();

        return true;
    }

    public function getData($table, $desc = false, $table2 = null)
    {

        $desc = "ORDER BY id ASC";
        if ($desc) {
            $query = "ORDER BY id DESC";
        }

        $sql = "SELECT * FROM `$table`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData2($query)
    {
        try {
            $sql = "$query";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

            // if ($table2 != null) {
            //     $sql = "SELECT * FROM `$table` INNER JOIN `$table2` ON `$table`.id = `$table2`.id";
            //     $stmt = $this->db->prepare($sql);
            //     $stmt->execute();
            //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
            // }
        } catch (Exception $e) {
            // error_log($e->getMessage()); // Uncomment if you wish to log errors
            return [];
        }
    }

    public function getDataById($table, $id, $query = "")
    {
        // $status = '';
        // if ($value != null) {
        //     $status = ;
        // }

        try {
            $sql = "SELECT * FROM `$table` WHERE id = '$id' $query";
            $stmt = $this->db->prepare($sql);
            // $stmt->bindValue(':id', );
            $stmt->execute();
            // echo $sql;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }

    public function getUnpaidSupplier($supplier_id)
    {
        // echo "SELECT SUM(amount) as total FROM supplier_payment where supplier='$supplier_id'";
        $paid = $this->getData2("SELECT COALESCE(SUM(amount), 0) as total FROM supplier_payment where supplier='$supplier_id'")[0]["total"];
        $total = $this->getData2("SELECT COALESCE(SUM(total), 0) as total FROM purchase where supplier = '$supplier_id'")[0]["total"];

        return  ["total" => $total, "unpaid" => $total - $paid, "paid" => $paid];
    }

    public function getUnpaidCustomer($customer_id)
    {
        $paid = $this->getData2("SELECT COALESCE(SUM(amount), 0) as total FROM customer_payment where customer='$customer_id'")[0]["total"];
        $total = $this->getData2("SELECT COALESCE(SUM(total), 0) as total FROM sale where customer = '$customer_id'")[0]["total"];

        return  ["total" => $total, "unpaid" => $total - $paid, "paid" => $paid];
    }

    public function SetSupplierPayment($supplier_id)
    {
        $unpaid = $this->getUnpaidSupplier($supplier_id);
        // printWithPre($unpaid);
        return $this->update(["total" => $unpaid["total"], "paid" => $unpaid["paid"]], $supplier_id, "suppliers");
    }

    public function SetCustomerPayment($customer_id)
    {
        $unpaid = $this->getUnpaidCustomer($customer_id);

        return $this->update(["total" => $unpaid["total"], "paid" => $unpaid["paid"]], $customer_id, "customers");
    }
}
