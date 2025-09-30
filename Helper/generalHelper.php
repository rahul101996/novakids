<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/database.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // adjust the path if needed

$db = new Database();

function getDBObject()
{
    global $db;
    return $db;
}

function getDBCon()
{
    return getDBObject()->getConnection();
}

function getBaseUrl()
{
    return getDBObject()->getUrl();
}

function getFast2SMS()
{

    return getDBObject()->getfast2sms_API();
}
function getUserByUsername($db, $username)
{
    try {
        // Prepare the SQL statement
        $sql = "SELECT * FROM online_users WHERE username = :username";
        $stmt = $db->prepare($sql);

        // Bind the username parameter
        $stmt->bindValue(':username', $username);

        // Execute the statement
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    } catch (\PDOException $e) {
        // error_log($e->getMessage()); // Uncomment if you wish to log errors
        return false;
    }
}
function getDisplayPopup($db)
{
    try {
        $sql = "SELECT * FROM tbl_popup WHERE display = '1' order by id desc";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        echo $e->getMessage(); // Uncomment if you wish to log errors
        return [];
    }
}
function getUserByphone($db, $mobile, $email = null)
{
    try {
        // Prepare the SQL statement
        $query = '';
        if ($email != null) {
            # code...
            $query = " OR username = :email";
        }
        $sql = "SELECT * FROM online_users WHERE mobile = :mobile $query";
        $stmt = $db->prepare($sql);

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
function registerOnlineUser($db, array $data)
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
        $stmt = $db->prepare($sql);

        // Bind the values
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // Execute the statement
        $stmt->execute();

        return $db->lastInsertId();
    } catch (\PDOException $e) {
        // error_log($e->getMessage()); // Uncomment if you wish to log errors
        return false;
    }
}
function getExpiry()
{
    $software = getDBObject()->getSoftware();
    $softwareid = getDBObject()->getSoftwareId();
    $url = $software . "project/is-valid/$softwareid";
    // echo $url;
    $response = file_get_contents($url);
    // echo $response;
    $notice = "";
    if ($response === FALSE) {
    } else {
        $response = json_decode($response);
        if ($response->success) {
            $notice = $response->notice;
        }
    }
    return $notice;
}

function printWithPre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function redirect($route)
{
    header("Location: $route");
    exit();
}

function adminEmail()
{
    return "navinsuryawanshi159@gmail.com";
}


function getLocationByIP($ip)
{
    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country ?? [];
    $data['city'] = $city ?? [];
    $data['area'] = $area ?? [];
    $data['code'] = $code ?? [];
    $data['long'] = $long ?? [];
    $data['lat'] = $lat ?? [];
    $data['ip'] = $ip;
    $data['time'] = date('Y-m-d h:i:s A');

    return $data;
}


function getRealIP()
{
    $ip = $_SERVER["REMOTE_ADDR"];
    //Deep detect ip
    if (filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    }
    if (filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    if ($ip == '::1') {
        $ip = '127.0.0.1';
    }

    return $ip;
}

function uploadFile($file, $upload_dir, $allowed_extensions = ['png', 'jpg', 'jpeg', 'webp', 'pdf', 'avif'])
{

    // Check if file was uploaded without errors
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Get the file extension
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Check if the file extension is allowed
        if (!in_array($file_extension, $allowed_extensions)) {
            return null; // Return null if the file extension is not allowed
        }

        // Generate unique file name to avoid conflicts
        $file_name = uniqid() . '_' . basename($file['name']);

        // Create the directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move the uploaded file to the specified directory
        $destination = $upload_dir . $file_name;
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $destination = str_replace("../", "", $destination);
            return $destination; // Return the path name if upload was successful
        } else {
            return false; // Return false if file upload failed
        }
    } else {
        return false; // Return false if file upload encountered an error
    }
}

function formatDateTime($dateString)
{
    // Create a DateTime object from the provided date string
    $date = new DateTime($dateString);

    // Format the date to the desired format: "d F y h:i:s A"
    $formattedDate = $date->format('d F y h:i:s A');

    return $formattedDate;
}

function formatTime($dateString)
{
    // Create a DateTime object from the provided date string
    $date = new DateTime($dateString);

    // Format the date to the desired format: "d F y h:i:s A"
    $formattedDate = $date->format('h:i A');

    return $formattedDate;
}

function formatDate($dateString)
{

    try {
        if (!empty($dateString) && $dateString != "" || $dateString != null) {
            // Create a DateTime object from the provided date string
            $date = new DateTime($dateString);

            // Format the date to the desired format: "d F y h:i:s A"
            $formattedDate = $date->format('d F y');

            return $formattedDate;
        }
        return "";
    } catch (Exception $e) {
        return $dateString;
    }
}

function formatNumber($number)
{
    // var_dump($number);
    if (empty($number) || $number == "") {
        return 0;
    }
    return number_format(round($number, 1), 1);
}

function timeDifference($dateString)
{
    $givenDate = new DateTime($dateString);
    $currentDate = new DateTime();
    $interval = $currentDate->diff($givenDate);

    if ($interval->y > 0) {
        return $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
    } elseif ($interval->m > 0) {
        return $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
    } elseif ($interval->d > 0) {
        return $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
    } elseif ($interval->h > 0) {
        return $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
    } elseif ($interval->i > 0) {
        return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
    } else {
        return $interval->s . ' second' . ($interval->s > 1 ? 's' : '') . ' ago';
    }
}

function timeRemaining($dateString)
{
    if (!empty($dateString) && $dateString != "" || $dateString != null) {
        $givenDate = new DateTime($dateString);
        $currentDate = new DateTime();
        $interval = $currentDate->diff($givenDate);

        if ($currentDate > $givenDate) {
            return false;
        }

        if ($interval->y > 0) {
            return $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' remaining';
        } elseif ($interval->m > 0) {
            return $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' remaining';
        } elseif ($interval->d > 0) {
            return $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' remaining';
        } elseif ($interval->h > 0) {
            return $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' remaining';
        } elseif ($interval->i > 0) {
            return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' remaining';
        } else {
            return $interval->s . ' second' . ($interval->s > 1 ? 's' : '') . ' remaining';
        }
    }
    return "";
}

function getNextCode($currentCode, $string = "PUR")
{
    // Remove the prefix (e.g., "PUR") and convert the rest to an integer
    $number = (int) substr($currentCode, 3);

    // Increment the number
    $nextNumber = $number + 1;

    // Pad it with zeros and add the prefix back
    return $string . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
}


$query = "SELECT r.*,p.page,p.page_name,p.module FROM role_permission r 
left join pages p on p.id = r.page
WHERE role = :id
";
$stmt = getDBObject()->getConnection()->prepare($query);
$stmt->bindParam(':id', $_SESSION["role"], PDO::PARAM_INT);
$stmt->execute();
$assignPages = $stmt->fetchAll(PDO::FETCH_ASSOC);

function checkPageAccess($page)
{
    // echo $page;
    global $assignPages;
    if ($_SESSION["role"] == 1) {
        return true;
    }
    foreach ($assignPages as $module) {
        if ($module['page_name'] == $page) {
            return true;
        }
    }
    return false;
}

function checkModuleAccess($module)
{

    global $assignPages;
    if ($_SESSION["role"] == 1) {
        return true;
    }
    foreach ($assignPages as $page) {
        foreach ($module[0] as $spage) {
            // echo "$page[page_name]<br>";
            if ($spage[0] == $page["page_name"]) {
                return true;
            }
        }
    }
    return false;
}

function checkActiveModule($page, $module)
{
    // global $sidebarModules;

    // foreach($sidebarModules as $module){
    foreach ($module[0] as $p) {
        // var_dump()
        // print_r($page);
        if ($p[0] == $page) {
            return true;
        }
    }
    // }
    return false;
}


function checkExisteingWishlistSession($varient)
        {
            if (isset($_SESSION["wishlist"])) {
                $cart = $_SESSION["wishlist"];
                foreach ($cart as $key => $c) {
                    if ($c["product"] == $varient) {
                        return [$key, $c];
                    }
                }
            }
            return false;
        }

function add($data, $table, $timestamp = true)
{
    $db = getDBCon();
    // $db = $db->getConnection();
    if ($timestamp) {
        $data["created_date"] = (isset($data["created_date"]) ? $data["created_date"] : date("Y-m-d"));
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
    // die();
    return $db->lastInsertId();
}
function checkExisteingCartSession($varient)
{
    if (isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
        foreach ($cart as $key => $c) {
            if ($c["varient"] == $varient) {
                return [$key, $c];
            }
        }
    }
    return false;
}
function groupAttributes(array $opt): array
{
    $result = [];
    $seen   = [];

    foreach ($opt as $row) {
        if (!is_array($row)) continue;

        foreach ($row as $key => $value) {
            if (!isset($result[$key])) {
                $result[$key] = [];
                $seen[$key] = [];
            }

            $values = is_array($value) ? $value : [$value];

            foreach ($values as $v) {
                $norm = strtolower(trim((string)$v)); // normalize for uniqueness
                if (!isset($seen[$key][$norm])) {
                    $seen[$key][$norm] = true;
                    $result[$key][] = trim((string)$v);
                }
            }
        }
    }

    // Sort alphabetically for each attribute
    foreach ($result as $k => &$arr) {
        sort($arr, SORT_NATURAL | SORT_FLAG_CASE);
    }

    return $result;
}

function update($data, $id, $table, $column = "id")
{
    $db = getDBCon();

    $setPart = [];
    foreach ($data as $key => $value) {
        $setPart[] = "$key = :$key";
    }
    $setClause = implode(", ", $setPart);

    $sql = "UPDATE `$table` SET " . $setClause . " WHERE $column = :id";
    // echo $sql;
    $stmt = $db->prepare($sql);

    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    $stmt->bindValue(':id', $id);

    $stmt->execute();

    return $stmt->rowCount() > 0;
}

function updateSQL($data, $table, $sql)
{
    $db = getDBCon();

    $setPart = [];
    foreach ($data as $key => $value) {
        $setPart[] = "$key = :$key";
    }
    $setClause = implode(", ", $setPart);

    $sql = "UPDATE `$table` SET " . $setClause . " WHERE $sql";
    // echo $sql;
    $stmt = $db->prepare($sql);

    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    $stmt->execute();

    return $stmt->rowCount() > 0;
}

function delete($id, $table, $column = "id")
{
    $db = getDBCon();

    $sql = "DELETE FROM `$table` WHERE $column = :id";
    $stmt = $db->prepare($sql);
    // echo $sql;
    // Bind the id parameter
    $stmt->bindValue(':id', $id);

    // Execute the statement
    $stmt->execute();

    return $stmt->rowCount() > 0;
}

function generateRandomString($length = 16)
{
    return random_int(100, 999);
}

function deleteSQL($table, $sql)
{
    $db = getDBCon();

    $sql = "DELETE FROM `$table` WHERE $sql";
    $stmt = $db->prepare($sql);

    // Bind the id parameter
    // $stmt->bindValue(':id', $id);

    // Execute the statement
    $stmt->execute();

    return $stmt->rowCount() > 0;
}

function getData($table, $desc = false, $table2 = null)
{

    $db = getDBCon();
    if ($desc) {
        $query = "ORDER BY id DESC";
    } else {
        $query = "ORDER BY id ASC";
    }

    $sql = "SELECT * FROM `$table`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getData2($query)
{
    try {
        $db = getDBCon();
        $sql = "$query";
        $stmt = $db->prepare($sql);
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

function getDataById($table, $id, $query = "")
{
    // $status = '';
    // if ($value != null) {
    //     $status = ;
    // }

    try {
        $db = getDBCon();

        $sql = "SELECT * FROM `$table` WHERE id = :id $query";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // error_log($e->getMessage()); // Uncomment if you wish to log errors
        return [];
    }
}

function deleteImageByPath($relativeImagePath)
{
    // Remove leading slashes if any
    $relativeImagePath = ltrim($relativeImagePath, '/');

    // Build the full absolute path
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/' . $relativeImagePath;

    // Check if the file exists
    if (file_exists($fullPath)) {
        if (unlink($fullPath)) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 404;
    }
}

function sendOfficialMail($toEmail, $toName, $subject, $body, $attachments = [], $toEmail2 = null, $toName2 = null)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // e.g., smtp.gmail.com
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rudratech.karthik1@gmail.com'; // your official email
        $mail->Password   = 'wcco uwbe zrtp eszg'; // use app password if Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // or PHPMailer::ENCRYPTION_STARTTLS
        $mail->Port       = 465; // 587 for TLS

        // Sender info
        $mail->setFrom('navin.rudratech@gmail.com', 'Developer Team');

        // Recipient
        $mail->addAddress($toEmail, $toName);
        if ($toEmail2 != null) {
            $mail->addAddress($toEmail2, $toName2);
        }

        // Attachments (optional)
        foreach ($attachments as $filePath) {
            if (file_exists($filePath)) {
                $mail->addAttachment($filePath);
            }
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Send
        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail Error: {$mail->ErrorInfo}");
        return false;
    }
    function current_url(): string
    {
        // Detect protocol
        $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
        $scheme = $https ? 'https' : 'http';

        // Detect host (respect proxy header if present)
        $host = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? $_SERVER['HTTP_HOST'];

        // Non‑standard port (e.g. :8080)
        $port = $_SERVER['SERVER_PORT'];
        $showPort = ($https && $port != 443) || (!$https && $port != 80);
        $portPart = $showPort ? ':' . $port : '';

        // Path + query string
        $requestUri = $_SERVER['REQUEST_URI']; // already contains the query part

        return $scheme . '://' . $host . $portPart . $requestUri;
    }
}


function parse_variant_options($options)
                                        {
                                            // already decoded
                                            if (is_array($options)) {
                                                return $options;
                                            }

                                            // object -> cast to array
                                            if (is_object($options)) {
                                                return (array) $options;
                                            }

                                            // not a string -> bail
                                            if (!is_string($options) || $options === '') {
                                                return [];
                                            }

                                            // Try 1: normal json_decode
                                            $decoded = json_decode($options, true);
                                            if (json_last_error() === JSON_ERROR_NONE) {
                                                if (is_array($decoded)) {
                                                    return $decoded;
                                                }
                                                // possible double-encoded: json_decode returned a string like '{"Size":"S",...}'
                                                if (is_string($decoded)) {
                                                    $decoded2 = json_decode($decoded, true);
                                                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded2)) {
                                                        return $decoded2;
                                                    }
                                                }
                                            }

                                            // Try 2: remove escaping (stripslashes) then decode
                                            $clean = stripslashes($options);
                                            $decoded = json_decode($clean, true);
                                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                                return $decoded;
                                            }

                                            // Try 3: trim surrounding quotes and decode
                                            $trimmed = trim($options, "\"'");
                                            $decoded = json_decode($trimmed, true);
                                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                                return $decoded;
                                            }

                                            // Try 4: fallback regex parse for "key":"value" pairs
                                            $pairs = [];
                                            if (preg_match_all('/"([^"]+)"\s*:\s*"([^"]+)"/', $options, $matches, PREG_SET_ORDER)) {
                                                foreach ($matches as $m) {
                                                    $pairs[$m[1]] = $m[2];
                                                }
                                                if (!empty($pairs)) {
                                                    return $pairs;
                                                }
                                            }

                                            // give up
                                            return [];
                                        }

                                        /**
                                         * Example grouping function that uses the parser above.
                                         */
                                        function groupOptions(array $variants)
                                        {
                                            $grouped = [];

                                            foreach ($variants as $variant) {
                                                $options = parse_variant_options($variant['options']);

                                                foreach ($options as $key => $value) {
                                                    if (!isset($grouped[$key])) {
                                                        $grouped[$key] = [];
                                                    }
                                                    if (!in_array($value, $grouped[$key], true)) {
                                                        $grouped[$key][] = $value;
                                                    }
                                                }
                                            }

                                            return $grouped;
                                        }
