<?php 

class Cms_model extends CI_model {

    public function lay_tua_sach_theo_id($id)
    {
        $this->db->select('*');
        $this->db->from('tuasach');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function lay_dau_sach_theo_id($id)
    {
        $this->db->select('*');
        $this->db->from('dausach');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function lay_cuon_sach_theo_id($id)
    {
        $this->db->select('*');
        $this->db->from('cuonsach');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function insert_tua_sach($book)
    {
        if (!$book)
        {
            return 0;
        }

        $this->db->insert('tuasach', $book);

        return $this->db->insert_id();
    }

    public function update_tua_sach($book, $where = array())
    {
        if (!$book)
        {
            return FALSE;
        }

        $this->db->update('tuasach', $book, $where);

        return $this->db->affected_rows();
    }

    public function insert_dau_sach($book)
    {
        if (!$book)
        {
            return 0;
        }

        $this->db->insert('dausach', $book);

        return $this->db->insert_id();
    }

    public function update_dau_sach($book, $where = array())
    {
        if (!$book)
        {
            return FALSE;
        }

        $this->db->update('dausach', $book, $where);

        return $this->db->affected_rows();
    }

    public function insert_cuon_sach($book)
    {
        if (!$book)
        {
            return 0;
        }

        $this->db->insert('cuonsach', $book);

        return $this->db->insert_id();
    }

    public function update_cuon_sach($book, $where = array())
    {
        if (!$book)
        {
            return FALSE;
        }

        $this->db->update('cuonsach', $book, $where);

        return $this->db->affected_rows();
    }

    public function lay_tat_ca_tua_sach($where = array(), $order_by = '', $limit = NULL, $offset = 0, $count = FALSE)
    {
        $this->db->select('*');
        $this->db->from('tuasach');
        $this->db->where($where);
        $this->db->order_by($order_by);
        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();

        if ($count)
        {
            return $query->num_rows();
        }
        return $query->result_array();
    }

    public function lay_tat_ca_thanh_vien($where = array(), $order_by = '', $limit = NULL, $offset = 0, $count = FALSE)
    {
        $this->db->select('*');
        $this->db->from('thanhvien');
        $this->db->where($where);
        $this->db->order_by($order_by);
        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();

        if ($count)
        {
            return $query->num_rows();
        }
        return $query->result_array();
    }

    public function get_dau_sach($where = array(), $order_by = '', $limit = NULL, $offset = 0, $count = FALSE)
    {
        $this->db->select('*');
        $this->db->from('dausach');
        $this->db->where($where);
        $this->db->order_by($order_by);
        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();

        if ($count)
        {
            return $query->num_rows();
        }
        return $query->result_array();
    }

    public function lay_tat_ca_cuon_sach($where = array(), $order_by = '', $limit = NULL, $offset = 0, $count = FALSE)
    {
        $this->db->select('*');
        $this->db->from('cuonsach');
        $this->db->where($where);
        $this->db->order_by($order_by);
        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();

        if ($count)
        {
            return $query->num_rows();
        }
        return $query->result_array();
    }

    public function delete_book_by_id($id)
    {
        $data = array(
            'del_flg' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('book', $data);
        
        return $this->db->affected_rows();
    }

    public function lay_thanh_vien_theo_id($id)
    {
        $this->db->select('*');
        $this->db->from('thanhvien');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function insert_thanhvien($user)
    {
        if (!$user)
        {
            return 0;
        }

        $this->db->insert('thanhvien', $user);

        return $this->db->insert_id();
    }

    public function update_thanhvien($user, $where = array())
    {
        if (!$user)
        {
            return FALSE;
        }

        $this->db->update('thanhvien', $user, $where);

        return $this->db->affected_rows();
    }

    public function xoa_thanh_vien_theo_id($id)
    {
        $data = array(
            'tinhtrang' => 3
        );
        $this->db->where('id', $id);
        $this->db->update('thanhvien', $data);
        
        return $this->db->affected_rows();
    }

    public function lay_admin_theo_username_password($username, $password)
    {
        $this->db->select('*');
        $this->db->from('quantrivien');
        $this->db->where('tendangnhap', $username);
        $this->db->where('matkhau', $password);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function lat_tat_ca_phieu_muon_sach($where = array(), $having = array(), $order_by = '', $limit = NULL, $offset = 0, $count = FALSE)
    {
        $this->db->distinct();
        $this->db->select('phieumuonsach.*, thanhvien.hoten as ten_thanhvien, thanhvien.id as ma_thanhvien');
        $this->db->from('phieumuonsach');
        $this->db->join('chitiet_pms', 'chitiet_pms.mapms = phieumuonsach.id', 'left');
        $this->db->join('thanhvien', 'chitiet_pms.mathanhvien = thanhvien.id', 'left');
        $this->db->where($where);

        if ($having)
        {
            $this->db->having($having);
        }

        $this->db->order_by($order_by);
        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();

        if ($count)
        {
            return $query->num_rows();
        }
        return $query->result_array();
    }

    public function lay_chitiet_pms($where = array())
    {
        $this->db->select('chitiet_pms.*');
        $this->db->from('chitiet_pms');
        $this->db->join('phieumuonsach', 'chitiet_pms.mapms = phieumuonsach.id', 'left');

        $this->db->where($where);

        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function insert_pms($data)
    {
        if (!$data)
        {
            return 0;
        }

        $this->db->insert('phieumuonsach', $data);

        return $this->db->insert_id();
    }

    public function them_sach_pms($borrows_id, $book_ids, $user_id)
    {
        if (!$borrows_id)
        {
            return FALSE;
        }

        $data = array();
        foreach($book_ids as $b_id)
        {
            $data[] = array(
                'mapms' => $borrows_id,
                'macuonsach'   => $b_id,
                'mathanhvien'   => $user_id
            );
        }
        $this->db->insert_batch('chitiet_pms', $data);

        return $this->db->affected_rows();
    }

    public function lay_pms_theo_id($borrows_id)
    {
        $this->db->select('*');
        $this->db->from('phieumuonsach');
        $this->db->where('id', $borrows_id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function cap_nhat_pms($borrows, $where = array())
    {
        if (!$borrows)
        {
            return FALSE;
        }

        $this->db->update('phieumuonsach', $borrows, $where);

        return $this->db->affected_rows();
    }

    public function xoa_sach_pms($borrows_id, $book_ids)
    {
        $this->db->where('mapms', $borrows_id);
        $this->db->where_in('macuonsach', $book_ids);
        $this->db->delete('chitiet_pms');
        return $this->db->affected_rows();
    }

    public function delete_borrows_by_id($borrows_id)
    {
        $data = array(
            'del_flg' => 1,
            'update_date' => date('Y-m-d h:i:s', time())
        );
        $this->db->where('id', $borrows_id);
        $this->db->update('borrows', $data);
        
        return $this->db->affected_rows();
    }

    public function cap_nhat_thanhvien_chitiet_pms($borrows_id, $user_id)
    {
        $data = array(
            'mathanhvien' => $user_id
        );
        $this->db->where('mapms', $borrows_id);
        $this->db->update('chitiet_pms', $data);
        
        return $this->db->affected_rows();
    }

    public function lay_sach_duoc_muon_gan_day($where = array())
    {
        $this->db->select("macuonsach, count(macuonsach) as lan_muon");
        $this->db->from("chitiet_pms");
        $this->db->group_by("macuonsach");
        $this->db->order_by("lan_muon DESC");
        $this->db->limit(5, 0);

        $result = $this->db->get();

        $cuonsach = $result->result_array();

        $rs = array();
        foreach($cuonsach as $cs)
        {
            $rs[] = array(
                'chitiet' => $this->lay_dau_sach_va_tua_sach_theo_cuon_sach($cs['macuonsach']),
                'dem'   => $cs['lan_muon']
            );
        }

        if ($rs)
        {
            return $rs;
        }

        return NULL;
    }

    public function lay_cuon_sach_chua_duoc_muon($sach_duoc_chon = array())
    {
        $sql = "select cuonsach.* "
        . "from cuonsach "
        . "where cuonsach.id NOT IN(select chitiet_pms.macuonsach from chitiet_pms join phieumuonsach on phieumuonsach.id = chitiet_pms.mapms where phieumuonsach.tinhtrang not in (3,4) ";
        if (!empty($sach_duoc_chon))
        {
            $sql .= " and chitiet_pms.macuonsach NOT IN (" .implode(",",$sach_duoc_chon) . ") )";
        }
        else
        {
            $sql .= ")";
        }
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    public function lay_dau_sach_va_tua_sach_theo_cuon_sach($macuonsach)
    {
        $this->db->select("cuonsach.*, dausach.ngonngu as ngon_ngu, tuasach.ten as ten_sach, tuasach.tacgia as tac_gia");
        $this->db->from('cuonsach');
        $this->db->join('dausach', 'dausach.id = cuonsach.madausach');
        $this->db->join('tuasach', 'tuasach.id = dausach.matuasach');
        $this->db->where(array('cuonsach.id' => $macuonsach));
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function lay_tu_khoa_tim_kiem($where = array())
    {
        $this->db->select('*');
        $this->db->from('tukhoa');
        $this->db->where($where);
        $this->db->order_by('dem DESC');
        $this->db->limit(5, 0);

        $result = $this->db->get();

        return $result->result_array();
    }
}

?>