<?php

class WebsettingController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function navbar_heading($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Navbar Heading";
        $pageModule = "Navbar Heading";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if ($id != null) {
                
                $editData = getData2("SELECT * from tbl_nav_heading where id=$id")[0];
            }

            require 'views/websetting/home.php';
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // printWithPre($_POST);
            // die();

            try {
                // Begin transaction
                $this->db->beginTransaction();

                if ($id == null) {
                    add($_POST, "tbl_nav_heading");
                    $_SESSION['success'] = "Navbar Heading Added Successfully";
                } else {
                    update($_POST, $id, "tbl_nav_heading");
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

    public function offer_heading($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Offer Heading";
        $pageModule = "Offer Heading";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if ($id != null) {
                
                $editData = getData2("SELECT * from tbl_offer_heading where id=$id")[0];
            }

            require 'views/websetting/offer-heading.php';
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
