<?php
namespace App\Models;


class HomeModel extends BaseModel
{
    public function getThongTin($ngay_bao_cao)
    {
        $data= array();
        $sql = 'SELECT (sum(gia_tri_con_lai)+sum(hm_luy_ke))/1000000 as tong_nguyen_gia,
                        sum(gia_tri_con_lai)/1000000 as gia_tri_con_lai,count(*) as tong_tai_san
                FROM  tai_san WHERE (ngay_ghi_tang <= ?)';
        $result = $this->db->query($sql,$ngay_bao_cao)->getResult();
        foreach ($result as $key) {
            $item['gia_tri_con_lai'] = $key->gia_tri_con_lai;
            $item['tong_nguyen_gia'] = $key->tong_nguyen_gia;
            $item['tong_tai_san'] = $key->tong_tai_san;
            $data['tong_tai_san'] = $item;
        }

        return $data;
    }
}