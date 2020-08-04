<?php

class MY_Controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function is_admin_login()
    {
        $admin_login = $this->session->userdata('admin_login');

        if (!$admin_login)
        {
            return FALSE;
        }

        return TRUE;
    }

    public function login_admin($admin)
    {
        $this->session->set_userdata(array(
            'admin_login' => TRUE
        ));
    }

    public function logout_admin()
    {
        $admin_login = $this->session->userdata('admin_login');
        if ($admin_login)
        {
            $this->session->unset_userdata('admin_login');
        }
    }
}
?>