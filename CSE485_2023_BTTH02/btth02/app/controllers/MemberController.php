<?php

require_once APP_ROOT . '/app/services/MemberService.php';

class ArticleController
{
    public function add()
    {
        include_once APP_ROOT . '/app/views/members/add.php';
    }
    public function store()
    {
        $ten_tgia = $_POST['ten_tgia'];
        $member = new Article(null, $ten_tgia);

        $memberService = new MemberService();
        $memberService->addMember($member);

        header('Location: ?controller=home');
    }
    public function edit($ma_tgia)
    {
        if (isset($ma_tgia)) {
            $memberService = new MemberService();
            $member = $memberService->getMemberById($ma_tgia);

            include APP_ROOT . '/app/views/members/edit.php';
        } else {
            echo 'Id is null';
        }
    }
    public function update($ma_tgia)
    {
        $ma_tgia = $_POST['ma_tgia'];
        $ten_tgia = $_POST['ten_tgia'];
        $hinh_tgia = $_POST['hinh_tgia'];
 
        $member_new = new Patient($ma_tgia, $ten_tgia, $hinh_tgia);
        $memberService = new MemberService();
        $memberService->updateMember($member_new);
        header('Location: ?controller=home');
    }
    public function destroy($ma_tgia)
    {
        $memberService = new MemberService();
        $member = $memberService->getMemberById($ma_tgia);

        include APP_ROOT . '/app/views/members/delete.php';
    }
    public function delete($ma_tgia)
    {
        $memberService = new MemberService();
        $memberService->deleteMember($ma_tgia);
        header('Location: ?controller=home');
    }
}