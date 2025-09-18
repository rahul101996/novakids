<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LoginController.php";

class WebController extends LoginController
{
    private $db;
    public function __construct($db = null)
    {
        if ($db != null) {
            $this->db = $db;
        } else {
            $this->db = getDBObject()->getConnection();
        }
        parent::__construct($this->db);
    }
    public function current_url(): string
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

    public function index()
    {

        $siteName = getDBObject()->getSiteName();
        $pageModule = "Home Page";
        $pageTitle = "Home Page";
        //  echo "hello";
        // die();
        // $this->checkSession();
        $categories = getData("tbl_category");
        $products = getData("tbl_products");
        $collection = getData("tbl_collection", true);
        // printWithPre($collection);
        $collection = array_reverse($collection)[0];
        $collection_products = json_decode($collection['products'], true) ?? [];
                // printWithPre($collection);



        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/website/index.php';
        }
    }
    
    public function removeProductFromCollection()
    {
       $collection = getData2("SELECT * FROM `tbl_collection` WHERE `id` = $_POST[id] ORDER BY `id` DESC LIMIT 1")[0];
       $collection_products = json_decode($collection['products'], true) ?? [];
       if(in_array($_POST['product_id'], $collection_products)){
        $collection_products = array_filter($collection_products, function ($product) {
            return $product != $_POST['product_id'];
        });
        $collection_products = json_encode($collection_products);
        $data = [
            'products' => $collection_products
        ];
        $update = update($data, $_POST['id'], 'tbl_collection');
        if($update){
            $response = [
                "success" => true,
                "data" => 'Product Removed Successfully'];
            echo json_encode($response);
        }else{
            $response = [
                "success" => false,
                "data" => 'Product Remove Failed'];
            echo json_encode($response);
        }
       }else{
        $response = [
            "success" => false,
            "data" => 'Product Not Found'];
        echo json_encode($response);
       }

       
    }
    public function productDetails()
    {

        $siteName = getDBObject()->getSiteName();
        $pageModule = "Product Page";
        $pageTitle = "Product Page";
        //  echo "hello";
        // die();
        // $this->checkSession();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/website/product-details.php';
        }
    }

    public function login()
    {

        $siteName = getDBObject()->getSiteName();
        $pageModule = "Login Page";
        $pageTitle = "Login Page";
        //  echo "hello";
        // die();
        // $this->checkSession();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/website/login.php';
        }
    }

    public function shop()
    {

        $siteName = getDBObject()->getSiteName();
        $pageModule = "Shop Page";
        $pageTitle = "Shop Page";
        //  echo "hello";
        // die();
        // $this->checkSession();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/website/shop.php';
        }
    }

    public function sbiClerk()
    {

        $siteName = getDBObject()->getSiteName();
        $pageModule = "SBI Clerk";
        $pageTitle = "SBI Clerk";
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        // printWithPre($course);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'sbi-clerk' ORDER BY `id` DESC LIMIT 1")[0];
            // printWithPre($course);
            require 'views/website/sbi-clerk.php';
        }
    }
    public function sbiPo()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "SBI PO";
        $pageTitle = "SBI PO";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'sbi-po' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/sbi-po.php';
        }
    }
    public function IbpsClerk()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "IBPS Clerk";
        $pageTitle = "IBPS Clerk";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'ibps-clerk' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/ibps-clerk.php';
        }
    }
    public function IbpsPO()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "IBPS PO";
        $pageTitle = "IBPS PO";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'ibps-po' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/ibps-po.php';
        }
    }
    public function RBI()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "RBI";
        $pageTitle = "RBI";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'rbi' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/rbi.php';
        }
    }
    public function MH_CET()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "MH CET";
        $pageTitle = "MH CET";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'mh-cet' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/mh-cet.php';
        }
    }
    public function CMAT()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "CMAT";
        $pageTitle = "CMAT";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'cmat' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/cmat.php';
        }
    }

    public function CAT()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "CAT";
        $pageTitle = "CAT";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'cat' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/cat.php';
        }
    }

    public function CGL()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "CGL";
        $pageTitle = "CGL";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'cgl' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/cgl.php';
        }
    }
    public function MTS()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "MTS";
        $pageTitle = "MTS";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'mts' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/mts.php';
        }
    }
    public function CHSL()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "CHSL";
        $pageTitle = "CHSL";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'chsl' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/chsl.php';
        }
    }
    public function Railways()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Railways";
        $pageTitle = "Railways";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/railways.php';
        }
    }
    public function MPSC()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "MPSC";
        $pageTitle = "MPSC";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'mpsc' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/mpsc.php';
        }
    }
    public function OnlineVedicMath()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Online Vedic Maths";
        $pageTitle = "Online Vedic Maths";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'online-vedic-math' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/online-vedic-maths.php';
        }
    }
    public function VedicMathsTeacher()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Vedic Maths Teacher";
        $pageTitle = "Vedic Maths Teacher";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'vedic-maths-teacher' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/vedic-maths-teacher-training-programme.php';
        }
    }
    public function UPSC()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "UPSC";
        $pageTitle = "UPSC";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'upsc' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/upsc.php';
        }
    }
    public function CSAT()
    {
        $url = $this->current_url();
        // echo $url;
        $banner = getData2("SELECT * FROM `tbl_home_banner` WHERE `link` = '$url' ORDER BY `id` DESC LIMIT 1")[0];
        $siteName = getDBObject()->getSiteName();
        $pageModule = "CSAT";
        $pageTitle = "CSAT";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'csat' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/csat.php';
        }
    }
    public function ContactUs()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Contact Us";
        $pageTitle = "Contact Us";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/contact.php';
        }
    }
    public function OurOffices()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Our Offices";
        $pageTitle = "Our Offices";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $district = getData2("SELECT * FROM `tbl_district` ORDER BY `id` ASC");
            $centers = getData2('SELECT tbl_centers.*, tbl_district.district_name_en FROM `tbl_centers` LEFT JOIN tbl_district ON tbl_centers.district = tbl_district.id ORDER BY tbl_centers.id DESC');
            // printWithPre($centers);
            require 'views/website/centers.php';
        }
    }
    public function OurOfficesName($name = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Our Offices";
        $pageTitle = "Our Offices";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($name != null) {
                $district = getData2("SELECT * FROM `tbl_district` WHERE `district_name_en` = '$name' ORDER BY `id` ASC LIMIT 1")[0];
                // printWithPre($district);
                $centers = getData2("SELECT * FROM `tbl_centers` WHERE `district` = $district[id] ORDER BY `id` ASC");
            } else {
                $centers = getData2("SELECT * FROM `tbl_centers`  ORDER BY `id` ASC");
            }
            // printWithPre($centers);
            require 'views/website/centers-info.php';
        }
    }

    public function CorrespondenceCourse()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Correspondence Course";
        $pageTitle = "Correspondence Course";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'correspondence' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/correspondence-course.php';
        }
    }

    public function Blogs()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Blogs";
        $pageTitle = "Blogs";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $blogs = getData("blogs");
            require 'views/website/blogs.php';
        }
    }
    public function wishlist()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Wishlist";
        $pageTitle = "Wishlist";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            require 'views/website/wishlist.php';
        }
    }
    public function getCentersByDistrict()
    {

        $district = $_POST['district'];
        $centers = getData2("SELECT * FROM `tbl_district` WHERE `district_name_en` LIKE '%$district%' ORDER BY `id` ASC");
        // printWithPre($centers);

        echo json_encode($centers);
        // require 'api/getCentersByDistrict.php';

        // printWithPre($centers);
    }
    public function privacyPolicy()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Privacy Policy";
        $pageTitle = "Privacy Policy";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/privacy-policy.php';
        }
    }
    public function termsAndConditions()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Terms And Conditions";
        $pageTitle = "Terms And Conditions";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/terms-and-conditions.php';
        }
    }
    public function cookies()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Cookies";
        $pageTitle = "Cookies";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/cookies.php';
        }
    }

    public function sizeGuide()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Size Guide";
        $pageTitle = "Size Guide";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/size-guide.php';
        }
    }

    public function shippingInfo()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Shipping Info";
        $pageTitle = "Shipping Info";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/shipping-info.php';
        }
    }

    public function faq()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "FAQ";
        $pageTitle = "FAQ";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/faq.php';
        }
    }
    public function returnExchange()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Return And Exchange";
        $pageTitle = "Return And Exchange";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/return_exchange.php';
        }
    }
    public function CancellationAndRefund()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Cancellation And Refund";
        $pageTitle = "Cancellation And Refund";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/cancellation-and-refund.php';
        }
    }
    public function UpdateOrder()
    {
        $order = $_POST['value'];
        $id = $_POST['id'];
        // echo $id;
        // echo $order;

        if ($id != null) {
            $update = update(['order_no' => $order], $id, 'tbl_home_banner');
            if ($update) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Update failed']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid ID']);
        }
    }

    public function ViewBlog($title = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Blogs";
        $pageTitle = "Blogs";
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = str_replace('-', ' ', $title);
            $id = str_replace('\'', ' ', $title);

            // echo $id;
            $sql = "SELECT * FROM blogs
WHERE LOWER(
    REPLACE(
        REPLACE(
            REPLACE(
                REPLACE(
                    REPLACE(
                        REPLACE(
                            REPLACE(name, '-', ' '),
                            '“', ''
                        ),
                        '”', ''
                    ),
                    '&', 'and'
                ),
                '’', ''
            ),
            '''', ' '
        ),
        ':', ' '
    )
) = LOWER(
    REPLACE('$id', '-', ' ')
);
";
            // echo $sql;
            $blog = getData2($sql)[0];
            $blogs = getData2("SELECT * FROM blogs
WHERE LOWER(
    REPLACE(
        REPLACE(
            REPLACE(
                REPLACE(
                    REPLACE(
                        REPLACE(
                            REPLACE(name, '-', ' '),
                            '“', ''
                        ),
                        '”', ''
                    ),
                    '&', 'and'
                ),
                '’', ''
            ),
            '''', ' '
        ),
        ':', ' '
    )
) != LOWER(
    REPLACE('$id', '-', ' ')
)
ORDER BY id DESC LIMIT 5");
            // printWithPre($blogs);

            require 'views/website/view-blog.php';
        }
    }

    public function Razorpay()
    {

        require 'views/website/razorpay.php';
    }
    public function CoursePayment()
    {

        require 'views/website/coursepayment.php';
    }
    public function MyProfile()
    {

        // echo "hello";

        $siteName = getDBObject()->getSiteName();
        $pageTitle = "My Profile";
        // $Districts = getData2("SELECT * FROM `tbl_district`");
        $userData = getData2("SELECT online_users.*, tbl_district.district_name_en, tbl_state.state_name FROM `online_users` LEFT JOIN tbl_district ON online_users.district = tbl_district.id
        LEFT JOIN tbl_state ON online_users.state = tbl_state.id
         WHERE online_users.id = " . $_SESSION['userid'])[0];
        //  printWithPre($userData);
        $Districts = $this->getData2("SELECT * FROM `tbl_district`");
        $states = $this->getData2("SELECT * FROM `tbl_state`");
        $Enrolled_courses = $this->getData2("SELECT * FROM `course_payment` WHERE `user_id` = " . $_SESSION['userid']);
        // printWithPre($Enrolled_courses);



        require 'views/website/myprofile.php';
    }
    public function VSAProfile()
    {
        require 'views/website/vsa-profile.php';
    }
    public function MissionVision()
    {
        require 'views/website/mission-vision.php';
    }
    public function DirectorsProfile()
    {
        require 'views/website/directors-profile.php';
    }
    public function MediaGallery()
    {
        require 'views/website/media-events.php';
    }
    public function ContactMail()
    {
        require 'views/website/contact-mail.php';
    }
}
