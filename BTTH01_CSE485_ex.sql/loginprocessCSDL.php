<?php
    session_start();
    //gọi file connection.php ở bài trước
    //require_once("lib/connection.php)
    $conn = mysqli_connect('localhost', 'root','','btth1_cse485') or die ('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
    //ktra nếu ng dùng đã ấn nút đn ms xử lý
    if(isset($_POST["btn_submit"])){//nếu biến post btn sbm đc thiết lập
        //lấy thông tin ng dùng
        $username=$_POST["username"];
        $password = $_POST["password"];
        //làm sạch thông tin, xóa bỏ tag html, ký tự đbiệt
        // mà ng dùng cố tình thêm vào để tấn công theo phương thức sql injection
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        if($username == ""|| $password==""){
            echo"usernmae or password is not empty!";
        }else{
            $sql = "Select * from login where username = '$username' and password = '$password'";
            $query = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($query);
            if($num_rows==0){
                echo "usernmae or password is not true!";
            }
            else{
                //tiến hành lưu tên đn vào session để tiện xl 
                $_SESSION['username'] = $username;
                //thực thi hành động sau khi lưu vào session
                //tiế hành chuyển hướng trang index.php
                header('location: /btth01/login.php');
            }
        }
    }

?>
