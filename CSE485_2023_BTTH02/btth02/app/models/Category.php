<?php

class Article
{
    private $ma_bviet;
    private $tieude; 
    private $ten_bhat; 
    private $ma_tloai; 
    private $tomtat; 
    private $noidung; 
    private $ma_tgia;
    private $ngayviet; 
    private $hinhanh; 

    /// các phương thức
    // phương thức khởi tạo tường minh
    public function __construct($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh)
    {
        $this->$ma_bviet = $ma_bviet;
        $this->$tieude = $tieude;
        $this->$ten_bhat = $ten_bhat;
        $this->$ma_tloai = $ma_tloai;
        $this->$tomtat = $tomtat;
        $this->$noidung = $noidung;
        $this->$ma_tgia = $ma_tgia;
        $this->$ngayviet = $ngayviet;
        $this->$hinhanh = $hinhanh;
    }

    // phương thức getter và setter
    public function getMaBaiViet()
    { return $this->ma_bviet; }

    public function getTieuDe()
    { return $this->tieude; }

    public function getTenBaiHat()
    { return $this->ten_bhat; }

    public function getMaTheLoai()
    { return $this->ma_tloai; }

    public function getTomTat()
    { return $this->tomtat; }

    public function getNoiDung()
    { return $this->noidung; }

    public function getma_tgia()
    { return $this->ma_tgia; }

    public function getngayviet()
    { return $this->ngayviet; }

    public function gethinhanh()
    { return $this->ten_bhat; }

    public function setMaBaiViet($ma_bviet)
    { $this->ma_bviet = $ma_bviet; }

    public function setTieuDe($tieude)
    { $this->tieude = $tieude; }

    public function setTenBaiHat($ten_bhat)
    { $this->ten_bhat = $ten_bhat; }

    public function setMaTheLoai($ma_tloai)
    { $this->ma_tloai = $ma_tloai; }

    public function setTomTat($tomtat)
    { $this->tomtat = $tomtat; }

    public function setNoiDung($noidung)
    { $this->noidung = $noidung; }

    public function setMaTacGia($ma_tgia)
    { $this->ma_tgia = $ma_tgia; }

    public function setNgayViet($ngayviet)
    { $this->ngayviet = $ngayviet; }

    public function setHinhAnh($hinhanh)
    { $this->hinhanh = $hinhanh; }

}