<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thanhvien extends MY_Controller {

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
    
    public function tracuu() 
    {
        $this->data['title'] = 'Tra cứu thành viên';

        $this->data['hoten'] = $this->input->get('hoten');
        $this->data['offset'] = 0;

        $order_by = 'thanhvien.ngaygianhap DESC, thanhvien.id DESC';
        $where = array();
        if ($this->data['hoten'] != '')
        {
            $where["thanhvien.hoten LIKE '%" . $this->data['hoten'] . "%'"] = NULL;
        }
        $where['thanhvien.tinhtrang !='] = 3;
        $this->data['thanhvien'] = $this->cms_model->lay_tat_ca_thanh_vien($where, $order_by, $this->limit, $this->data['offset'], FALSE);
        $this->data['count'] = $this->cms_model->lay_tat_ca_thanh_vien($where, $order_by, $this->limit, $this->data['offset'], TRUE);

        // var_dump($this->data['books']);die();

        $this->load->view('cms/parts/header', $this->data);
        $this->load->view('cms/thanhvien/tracuu_thanhvien', $this->data);
		$this->load->view('cms/parts/footer', $this->data);
    }


    public function chitiet_thanhvien()
    {
        $this->load->helper('form');

        $this->data['ma_thanhvien'] = $this->uri->segment(4, 0);

        if ($this->data['ma_thanhvien'])
        {
            $this->data['thanhvien'] = $this->cms_model->lay_thanh_vien_theo_id($this->data['ma_thanhvien']);
            if (!$this->data['thanhvien'])
            {
                $this->data['title'] = '404';
                $this->data['error_msg'] = 'Dữ liệu này không tồn tai.';
                $this->data['redirect_msg'] = site_url('cms/thanhvien/tracuu');

                $this->load->view('cms/parts/header', $this->data);
                $this->load->view('errors/cms/404', $this->data);
                $this->load->view('cms/parts/footer', $this->data);
                return;
            }
        }
        else
        {
            $this->data['thanhvien']['id']              = '';
            $this->data['thanhvien']['hoten']           = '';
            $this->data['thanhvien']['tendangnhap']     = '';
            $this->data['thanhvien']['matkhau']         = '';
            $this->data['thanhvien']['ngaysinh']        = '';
            $this->data['thanhvien']['ngaygianhap']     = '';
            $this->data['thanhvien']['tinhtrang']       = 0;
            $this->data['thanhvien']['phamloi']         = 0;
        }

        $this->data['title'] = 'Chi tiết thành viên';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('hoten', 'Họ tên', 'required|trim');
        $this->form_validation->set_rules('tendangnhap', 'Tên đăng nhập', 'required|trim');
        $this->form_validation->set_rules('matkhau', 'Mật khẩu', 'required|trim');
        $this->form_validation->set_rules('ngaysinh', 'Ngày sinh', 'trim|callback_validate_birthday');
        $this->form_validation->set_rules('phamloi', 'Số lần phạm lỗi', 'trim|integer');

        $this->form_validation->set_message('required', 'Mục này không được để trống.');
        $this->form_validation->set_message('integer', 'Dữ liệu nhập vào phải là chữ số.');

        if ($this->form_validation->run())
        {
            $in_time = date('Y-m-d h:i:s', time());
            $ngaysinh = DateTime::createFromFormat('d/m/Y', set_value('ngaysinh'));
            $data = array(
                'hoten'          => set_value('hoten'),
                'tendangnhap'      => set_value('tendangnhap'),
                'matkhau'      => set_value('matkhau'),
                'ngaysinh'      => ($ngaysinh?$ngaysinh->format('Y-m-d'):''),
                'tinhtrang'        => set_value('tinhtrang'),
                'phamloi'       => set_value('phamloi')
            );

            if ($data['phamloi'] >= 3 && $data['tinhtrang'] != 0)
            {
                $data['tinhtrang'] = 2;
            }

            if ($this->data['ma_thanhvien'] != 0)
            {
                $result = $this->cms_model->update_thanhvien($data, array('id' => $this->data['ma_thanhvien']));
            }
            else
            {
                $data['ngaygianhap'] = $in_time;
                $data['phamloi'] = 0;
                $result = $this->cms_model->insert_thanhvien($data);
            }

            if ($result)
            {
                $this->data['redirect_msg'] = site_url('cms/thanhvien/tracuu');

                $this->load->view('cms/parts/header', $this->data);
                $this->load->view('cms/parts/success', $this->data);
                $this->load->view('cms/parts/footer', $this->data);
            }
            else
            {
                $this->load->view('cms/parts/header', $this->data);
                $this->load->view('cms/parts/error', $this->data);
                $this->load->view('cms/parts/footer', $this->data);
            }
        }
        else
        {
            $this->data['attributes'] = $this->_attribute_form();
            $this->load->view('cms/parts/header', $this->data);
            $this->load->view('cms/thanhvien/chitiet_thanhvien', $this->data);
            $this->load->view('cms/parts/footer', $this->data);
        }
    }

    private function _attribute_form()
    {
        $attributes = array();
        
        $hidden = array(

        );

        $hoten = array(
            'name'  => 'hoten',
            'id'    => 'hoten',
            'value' => set_value('hoten', $this->data['thanhvien']['hoten']),
            'class' => 'form-control'
        );

        $tendangnhap = array(
            'name'  => 'tendangnhap',
            'id'    => 'tendangnhap',
            'value' => set_value('tendangnhap', $this->data['thanhvien']['tendangnhap']),
            'class' => 'form-control'
        );

        $matkhau = array(
            'name'  => 'matkhau',
            'id'    => 'matkhau',
            'type'  => 'password',
            'value' => set_value('matkhau', $this->data['thanhvien']['matkhau']),
            'class' => 'form-control'
        );

        if ($this->data['thanhvien']['ngaysinh'] != '' && $this->data['thanhvien']['ngaysinh'] != '0000-00-00 00:00:00')
        {
            $this->data['thanhvien']['ngaysinh'] = DateTime::createFromFormat('Y-m-d H:i:s', $this->data['thanhvien']['ngaysinh'])->format('d/m/Y');
        }
        else
        {
            $this->data['thanhvien']['ngaysinh'] = '';
        }
        $ngaysinh = array(
            'name'  => 'ngaysinh',
            'id'    => 'ngaysinh',
            'value' => set_value('ngaysinh', $this->data['thanhvien']['ngaysinh']),
            'class' => 'form-control',
            'placeholder' => 'dd/mm/yyyy',
            'data-inputmask-alias' => 'datetime',
            'data-inputmask-inputformat' => 'dd/mm/yyyy',
            'data-mask' => NULL,
            'im-insert' => 'false'
        );

        $tinhtrang = array(
            array(
                'name'          => 'tinhtrang',
                'id'            => 'tinhtrang',
                'label'         => 'Chưa kích hoạt',
                'value'         => '0',
                'checked'       => (set_value('tinhtrang', $this->data['thanhvien']['tinhtrang']) == 0)?TRUE:FALSE,
            ),
            array(
                'name'          => 'tinhtrang',
                'id'            => 'tinhtrang',
                'label'         => 'Đã kích hoạt',
                'value'         => '1',
                'checked'       => (set_value('tinhtrang', $this->data['thanhvien']['tinhtrang']) == 1)?TRUE:FALSE,
            ),
            array(
                'name'          => 'tinhtrang',
                'id'            => 'tinhtrang',
                'label'         => 'Bị cấm',
                'value'         => '2',
                'checked'       => (set_value('tinhtrang', $this->data['thanhvien']['tinhtrang']) == 2)?TRUE:FALSE,
            ),
            array(
                'name'          => 'tinhtrang',
                'id'            => 'tinhtrang',
                'label'         => 'Bị xóa',
                'value'         => '3',
                'checked'       => (set_value('tinhtrang', $this->data['thanhvien']['tinhtrang']) == 3)?TRUE:FALSE,
            ),
        );

        $phamloi = array(
            'name'  => 'phamloi',
            'id'    => 'phamloi',
            'value' => set_value('phamloi', $this->data['thanhvien']['phamloi']),
            'class' => 'form-control'
        );

        $attributes = array(
            'hidden'        => $hidden,
            'hoten'          => $hoten,
            'tendangnhap'      => $tendangnhap,
            'matkhau'      => $matkhau,
            'ngaysinh'      => $ngaysinh,
            'tinhtrang'        => $tinhtrang,
            'phamloi'       => $phamloi
        );

        return $attributes;
    }

    public function xoathanhvien()
    {
        $id = $this->input->post('id');
        $url_back = $this->input->post('url_back');

        $user = $this->cms_model->lay_thanh_vien_theo_id($id);
        if (!$user)
        {
            $this->load->view('cms/parts/header', $this->data);
            $this->load->view('cms/parts/error', $this->data);
            $this->load->view('cms/parts/footer', $this->data);

            return;
        }

        $result = $this->cms_model->xoa_thanh_vien_theo_id($id);

        if ($result)
        {
            $this->data['redirect_msg'] = $url_back;

            $this->load->view('cms/parts/header', $this->data);
            $this->load->view('cms/parts/success', $this->data);
            $this->load->view('cms/parts/footer', $this->data);
        }
    }

    public function validate_birthday($birthday)
    {
        $date = DateTime::createFromFormat('d/m/Y', $birthday);
        if (!$date)
        {
            $this->form_validation->set_message('validate_birthday', 'Ngày sinh nhập không hợp lệ.');
            return FALSE;
        }

        if ($date->format('Y-m-d') >= date('Y-m-d'))
        {
            $this->form_validation->set_message('validate_birthday', 'Ngày sinh phải nhỏ hơn ngày hiện tại.');
            return FALSE;
        }

        return TRUE;
    }
}