<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thongke extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->database('default');
        $this->load->model('cms_model');
        
        $this->data['slug_1'] = $this->uri->segment(2, 0);
        $this->data['slug_2'] = $this->uri->segment(3, 0);
        
        $this->limit = NULL;

        if (!$this->is_admin_login())
		{
			redirect('cms/login', 'location');
		}
    }

    public function index()
    {
        // thống kê sách được mượn gần đây
        $this->data['sach_muon_gan_day'] = $this->cms_model->lay_sach_duoc_muon_gan_day();

        // thống kê từ khoá được tìm kiếm gần đây
        $search_keyword_where = array(
            'tukhoa.ngaytao >= (CURDATE() - INTERVAL 30 DAY)' => NULL
        );
        $this->data['search_keywords'] = $this->cms_model->lay_tu_khoa_tim_kiem($search_keyword_where);

        $this->data['tat_ca_pms'] = $this->cms_model->lat_tat_ca_phieu_muon_sach();
        $where = array(
            'phieumuonsach.tinhtrang IN (1)' => NULL
        );
        $this->data['pms_dang_muon'] = $this->cms_model->lat_tat_ca_phieu_muon_sach($where);

        $where = array(
            'phieumuonsach.tinhtrang IN (2)' => NULL
        );
        $this->data['pms_chua_tra'] = $this->cms_model->lat_tat_ca_phieu_muon_sach($where);

        $where = array(
            'phieumuonsach.tinhtrang IN (4)' => NULL
        );
        $this->data['pms_qua_han'] = $this->cms_model->lat_tat_ca_phieu_muon_sach($where);

        $this->load->view('cms/parts/header', $this->data);
        $this->load->view('cms/thongke/index', $this->data);
		$this->load->view('cms/parts/footer', $this->data);
    }
}