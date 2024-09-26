<?php

class Article
{
    private $ma_tloai ;
    private $ten_tloai ;

    /// các phương thức
    // phương thức khởi tạo tường minh
    public function __construct($ma_tloai, $ten_tloai)
    {
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
    }

    // phương thức getter và setter
    public function getMaTheLoai()
    { return $this->ma_tloai; }

    public function getTenTheloai()
    { return $this->ten_tloai; }

    public function setTenTheloai($ten_tloai)
    { $this->ten_tloai = $ten_tloai; }

}