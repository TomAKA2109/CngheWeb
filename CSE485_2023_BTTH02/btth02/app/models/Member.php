<?php

class Member
{
    private $ma_tgia ;
    private $ten_tgia ;
    private $hinh_tgia ;

    /// các phương thức
    // phương thức khởi tạo tường minh
    public function __construct($ma_tgia, $ten_tgia, $hinh_tgia)
    {
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
        $this->hinh_tgia = $hinh_tgia;
    }

    // phương thức getter và setter
    public function getMaTacGia()
    { return $this->ma_tgia; }

    public function getTenTacGia()
    { return $this->ten_tgia; }
    public function getHinhTacGia()
    { return $this->hinh_tgia; }

    public function setTenTacGia($ten_tgia)
    { $this->ten_tgia = $ten_tgia; }

    public function setHinhTacGia($hinh_tgia)
    { $this->hinh_tgia = $hinh_tgia; }

}