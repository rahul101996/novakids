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

    public function validshiprockettoken()
    {
        date_default_timezone_set("Asia/Kolkata");
        $stmt = $this->db->prepare("SELECT * FROM `tbl_shiprocket_token` WHERE 1");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $created_at = strtotime($row['created_at']);
        $current_time = strtotime(date("Y-m-d H:i"));
        $diff_time = $current_time - $created_at;
        // return $diff_time;

        if ($diff_time > 863000) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/auth/login",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n    \"email\": \"officerahul272@gmail.com\",\n    \"password\": \"admin123\"\n}",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json"
                ),
            ));
            $SR_login_Response = curl_exec($curl);
            curl_close($curl);
            $SR_login_Response_out = json_decode($SR_login_Response);
            $token = $SR_login_Response_out->{'token'};

            $newdate = date("Y-m-d H:i");
            $sql1 = "UPDATE `tbl_shiprocket_token` SET `token` = '$token', `created_at`='$newdate' WHERE `id` = 1";
            $stmt1 = $this->db->prepare($sql1);
            $stmt1->execute();

            return $token;
        } else {
            return $row['token'];
        }
    } 

    public function placeordershiprocket($token,$purchaseid, $orderid)
    {
        $sql = "SELECT * FROM `tbl_purchase` WHERE orderid = '$orderid'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $order_data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $order_data['email'] = (!empty($order_data['email'])) ? $order_data['email'] : $_SESSION['username'];


        // $sql1 = "SELECT
        //             tpi.*,
        //             tp.product AS product_name,
        //             tv.id AS varient_id,
        //             tv.unique_id,
        //             tv.category,
        //             tv.product,
        //             tv.size,
        //             tv.color,
        //             tv.length,
        //             tv.breadth,
        //             tv.height,
        //             tv.weight,
        //             tc.name AS color_name,
        //             ts.name AS Size
        //         FROM
        //             `tbl_purchase_item` tpi
        //         LEFT JOIN `new_tbl_product` tp ON
        //             tp.id = tpi.product
        //         LEFT JOIN `new_tbl_varient` tv ON
        //             tv.id = tpi.varient
        //         LEFT JOIN `tbl_size` ts ON
        //             ts.id = tv.size
        //         LEFT JOIN `tbl_color` tc ON
        //             tc.id = tv.color
        //         WHERE
        //             tpi.purchase_id = '$order_data[id]';";
        // $stmt1 = $this->db->prepare($sql1);
        // $stmt1->execute();
        // $order_items = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $sql = "SELECT ti.*,tp.name,tpk.length,tpk.width,tpk.height,tpk.dimentions_unit,tpk.weight,tpk.weight_unit as product_name from tbl_purchase_item ti
            LEFT JOIN tbl_products tp on tp.id = ti.product
            LEFT JOIN tbl_variants tv on tv.id = ti.product
            LEFT JOIN tbl_packaging tpk on tpk.id=tp.packaging
            where purchase_id='$purchaseid'
        ";
        // echo "<br>";
        // echo $sql;
        $order_items = getData2($sql);
        printWithPre($order_items);
        // die();
        // return $order_items;
        // die();
        $orderitems = '';
        $orderQty = 0;
        $length = 0;
        $breadth = 0;
        $height = 0;
        $weight = 0;
        if (count($order_items) > 1) {
            foreach ($order_items as $value) {
                $orderitems .= '{
                "name": "' . $value['product_name'] . '",
                "sku": "product_' . $value['varient_id'] . '",
                "units": ' . $value['quantity'] . ',
                "selling_price": "' . $value['amount'] . '",
                "discount": "",
                "tax": "",
                "hsn": ""
                },';
                $orderQty += (int) $value['quantity'];
                $length += (float) $value['length'];
                $breadth += (float) $value['width'];
                $height += (float) $value['height'];
                $weight += (float) $value['weight'];
            }
            $orderitems = rtrim($orderitems, ",");
        } else {
            $orderitems .= '{
                    "name": "' . $order_items[0]['product_name'] . '",
                    "sku": "product_' . $order_items[0]['varient_id'] . '",
                    "units": ' . $order_items[0]['quantity'] . ',
                    "selling_price": "' . $order_items[0]['amount'] . '",
                    "discount": "",
                    "tax": "",
                    "hsn": ""
            }';
            $orderQty = (int) $order_items[0]['quantity'];
            $length += (float) $order_items[0]['length'];
            $breadth += (float) $order_items[0]['width'];
            $height += (float) $order_items[0]['height'];
            $weight += (float) $order_items[0]['weight'];
        }
        // return ["order_data" => $order_data,"order_items" => $order_items, "orderitems" => $orderitems];
        // return ["orderitems" => $order_items];
        // return $order_data;
        foreach ($order_items as $value) {
            $order_items['sub_total'] += $value['total_amount'];
        }

        // return [$orderitems, $order_items, $orderQty];
        // return [$orderQty, $length, $breadth, $height, $weight];
        // die();
        $totallength = $length * $orderQty;
        $totalbreadth = $breadth * $orderQty;
        $totalheight = $height * $orderQty;
        $totalWeight = $weight * $orderQty;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '{"order_id": "' . $orderid . '",
                                    "order_date": "' . $order_data['created_at'] . '",
                                    "pickup_location": "Primary",
                                    "billing_customer_name": "' . $order_data['fname'] . '",
                                    "billing_last_name": "' . $order_data['lname'] . '",
                                    "billing_address": "' . $order_data['address_line1'] . '",
                                    "billing_address_2": "' . $order_data['address_line2'] . '",
                                    "billing_city": "' . $order_data['city'] . '",
                                    "billing_pincode": "' . $order_data['pincode'] . '",
                                    "billing_state": "' . $order_data['state'] . '",
                                    "billing_country": "' . $order_data['country'] . '",
                                    "billing_email": "' . $order_data['email'] . '",
                                    "billing_phone": "' . $order_data['mobile'] . '",
                                    "shipping_is_billing": true,
                                    "shipping_customer_name": "",
                                    "shipping_last_name": "",
                                    "shipping_address": "",
                                    "shipping_address_2": "",
                                    "shipping_city": "",
                                    "shipping_pincode": "",
                                    "shipping_country": "",
                                    "shipping_state": "",
                                    "shipping_email": "",
                                    "shipping_phone": "",
                                    "order_items": [
                                        ' . $orderitems . '
                                    ],
                                    "payment_method": "' . $order_data['payment_mode'] . '",
                                    "shipping_charges": 0,
                                    "giftwrap_charges": 0,
                                    "transaction_charges": 0,
                                    "total_discount": 0,
                                    "sub_total": "' . $order_data['total_amount'] . '",
                                    "length": ' . $totallength . ',
                                    "breadth": ' . $totalbreadth . ',
                                    "height": ' . $totalheight . ',
                                    "weight": ' . $totalWeight . '
                                        }',
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer $token"
            ),
        ));
        $SR_login_Response = curl_exec($curl);
        curl_close($curl);
        $SR_login_Response_out = json_decode($SR_login_Response);
        // echo '<pre>';

        return $SR_login_Response_out;
    }
}
