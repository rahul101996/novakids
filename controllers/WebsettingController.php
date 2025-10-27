<?php

class WebsettingController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }


    public function home_banner($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Home Banner";
        $pageModule = "Home Banner";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/websetting/banner_home.php';
        }
    }
    public function home_banner_add($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Home Banner";
        $pageModule = "Home Banner";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $editData = [];
            if ($id != null) {
                $editData = getData2("SELECT * from tbl_home_banner where id=$id")[0];
            }

            require 'views/websetting/banner_home_add.php';
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // printWithPre($_POST);
            // printWithPre($_FILES);
            // die();

            try {
                // Begin transaction
                $this->db->beginTransaction();

                if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                    $_POST['file'] = uploadFile($_FILES['img'], 'public/home-banner/');
                } else {
                    $_POST['file'] = isset($_POST['old_image']) ? $_POST['old_image'] : '';
                }

                if ($id == null) {
                    add(
                        [
                            "title" => $_POST['title'],
                            "file" => $_POST['file']
                        ],
                        "tbl_home_banner",
                        false
                    );

                    $_SESSION['success'] = "Home Banner Added Successfully";
                } else {
                    update(
                        [
                            "title" => $_POST['title'],
                            "file" => $_POST['file']
                        ],
                        $id,
                        "tbl_home_banner"
                    );

                    $_SESSION['success'] = "Home Banner Updated Successfully";
                }

                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollBack();
                echo $e->getMessage();
                $_SESSION['err'] = $e->getMessage();
            }

            redirect('/admin/front-cms/home-banner');
        }
    }
    // public function home_banner_delete($id)
    // {
    //     delete($id, "tbl_home_banner");
    //     redirect('/admin/front-cms/home-banner');
    // }





    public function product_banner($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Product Banner";
        $pageModule = "Product Banner";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/websetting/product_banner.php';
        }
    }
    public function product_banner_add($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Product Banner";
        $pageModule = "Product Banner";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $editData = [];
            if ($id != null) {
                $editData = getData2("SELECT * from tbl_product_banner where id=$id")[0];
            }

            require 'views/websetting/product_banner_add.php';
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {



            try {
                // Begin transaction
                $this->db->beginTransaction();

                if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                    $_POST['file'] = uploadFile($_FILES['img'], 'public/product-banner/');
                } else {
                    $_POST['file'] = isset($_POST['old_image']) ? $_POST['old_image'] : '';
                }

                if ($id == null) {
                    $add = add(
                        [
                            "product_id" => $_POST['product_id'],
                            "file" => $_POST['file']
                        ],
                        "tbl_product_banner",
                        false
                    );
                    if ($add) {
                        // $this->db->commit();
                        foreach ($_POST['anchor_name'] as $key => $value) {
                            add(
                                [
                                    "anchor_name" => $_POST['anchor_name'][$key],
                                    "top_position" => $_POST['top_position'][$key],
                                    "left_position" => $_POST['left_position'][$key],
                                    "product_banner_id" => $add
                                ],
                                "product_banner_anchors",
                                false

                            );
                        }
                    }

                    $_SESSION['success'] = "Product Banner Added Successfully";
                } else {
                    $update = update(
                        [
                            "product_id" => $_POST['product_id'],
                            "file" => $_POST['file']
                        ],
                        $id,
                        "tbl_product_banner"
                    );
                    // die();
                    // die();
                    // $this->db->commit();
                    $delete = deleteSQL("product_banner_anchors", "product_banner_id = $id");
                    // die();
                    foreach ($_POST['anchor_name'] as $key => $value) {
                        add(
                            [
                                "anchor_name" => $_POST['anchor_name'][$key],
                                "top_position" => $_POST['top_position'][$key],
                                "left_position" => $_POST['left_position'][$key],
                                "product_banner_id" => $id
                            ],
                            "product_banner_anchors",
                            false

                        );
                    }


                    $_SESSION['success'] = "Product Banner Updated Successfully";
                }

                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollBack();
                echo $e->getMessage();
                $_SESSION['err'] = $e->getMessage();
            }

            redirect('/admin/front-cms/product-banner');
        }
    }
    // public function product_banner_delete($id)
    // {
    //     delete($id, "tbl_product_banner");
    //     redirect('/admin/front-cms/home-banner');
    // }





    public function navbar_heading($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Navbar Heading";
        $pageModule = "Navbar Heading";

        require 'views/websetting/home.php';
    }
    public function navbar_heading_add($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Navbar Heading";
        $pageModule = "Navbar Heading";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if ($id != null) {

                $editData = getData2("SELECT * from tbl_nav_heading where id=$id")[0];
            }

            require 'views/websetting/home_add.php';
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // printWithPre($_POST);
            // die();

            try {
                // Begin transaction
                $this->db->beginTransaction();

                if ($id == null) {
                    add(
                        [
                            "title" => $_POST['title']
                        ],
                        "tbl_nav_heading"
                    );
                    $_SESSION['success'] = "Navbar Heading Added Successfully";
                } else {
                    update(
                        [
                            "title" => $_POST['title']
                        ],
                        $id,
                        "tbl_nav_heading"
                    );
                    $_SESSION['success'] = "Navbar Heading Updated Successfully";
                }

                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollBack();
                echo $e->getMessage();
                $_SESSION['err'] = $e->getMessage();
            }

            redirect('/admin/front-cms/nav-heading');
        }
    }
    public function navbar_heading_delete($id)
    {
        delete($id, "tbl_nav_heading");
        redirect('/admin/front-cms/nav-heading');
    }





    public function offer_heading()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Offer Heading";
        $pageModule = "Offer Heading";

        require 'views/websetting/offer-heading.php';
    }

    public function offer_heading_add($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Offer Heading";
        $pageModule = "Offer Heading";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if ($id != null) {

                $editData = getData2("SELECT * from tbl_offer_heading where id=$id")[0];
            }

            require 'views/websetting/offer-heading-add.php';
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // printWithPre($_POST);
            // die();

            try {
                // Begin transaction
                $this->db->beginTransaction();

                if ($id == null) {
                    add($_POST, "tbl_offer_heading");
                    $_SESSION['success'] = "Offer Heading Added Successfully";
                } else {
                    update($_POST, $id, "tbl_offer_heading");
                    $_SESSION['success'] = "Offer Heading Updated Successfully";
                }

                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollBack();
                echo $e->getMessage();
                $_SESSION['err'] = $e->getMessage();
            }

            redirect('/admin/front-cms/offer-heading');
        }
    }

    public function offer_heading_delete($id)
    {
        delete($id, "tbl_offer_heading");
        redirect('/admin/front-cms/offer-heading');
    }
}
