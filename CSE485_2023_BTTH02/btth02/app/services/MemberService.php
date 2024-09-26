<?php
require_once APP_ROOT . '/app/models/MemberService.php';

class PatientService
{
    public function getAllPatients()
    {
        $patients = [];
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                // truy vấn đến toàn bộ bản ghi trong bảng patient
                $sql = "SELECT * FROM member";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch()) {
                    $member = new member($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
                    $members[] = $member;
                }
                return $members;
            }
        }
    }

    public function addMember(member $member)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $ma_tgia = $member->getma_tgia();
                $ten_tgia = $member->getten_tgia();
                $hinh_tgia = $member->gethinh_tgia();
                $sql = "INSERT INTO member (ma_tgia, ten_tgia, hinh_tgia) VALUES ('$ma_tgia', '$ten_tgia', '$hinh_tgia')";
                $conn->exec($sql);
            }
        }
    }

    public function getMemberById($ma_tgia)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "SELECT * FROM Member WHERE ma_tgia = '$ma_tgia'";
                $stmt = $conn->query($sql);
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch();
                    $ma_tgia = new Member($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
                    return $ma_tgia;
                }
            }
        }
    }

    public function updateMember(Member $member)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $ma_tgia = $member->getma_tgia();
                $ten_tgia = $member->getten_tgia();
                $hinh_tgia = $member->gethinh_tgia();
                $sql = "UPDATE member SET ma_tgia = '$ma_tgia', ten_tgia = '$ten_tgia', hinh_tgia = '$hinh_tgia' WHERE ma_tgia = '$ma_tgia'";
                $conn->exec($sql);
            }
        }
    }

    public function deleteMember($ma_tgia)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "DELETE FROM member WHERE ma_tgia = '$ma_tgia'";
                $conn->exec($sql);
            }
        }
    }
}
