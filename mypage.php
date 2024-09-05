<?
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $db_conn = mysql_conn();

        $password = $_POST["password1"];
        $password_check = $_POST["password2"];
        $name = $_POST["name"];
        $email = $_POST["Email"];
 
        function passwordCheck($_str)
        {
            $pw = $_str;
            $num = preg_match('/[0-9]/u', $pw);
            $eng = preg_match('/[a-z]/u', $pw);
            $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
 
            if(strlen($pw) < 10 || strlen($pw) > 30)
            {
                return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.");
                exit;
            }
 
            if(preg_match("/\s/u", $pw) == true)
            {
                return array(false, "비밀번호는 공백없이 입력해주세요.");
                exit;
            }
 
            if( $num == 0 || $eng == 0 || $spe == 0)
            {
                return array(false, "영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
                exit;
            }
 
            return array(true);
        }

        if(!empty($password) && !empty($password_check) && !empty($name) && !empty($email)) {
 
            $result = passwordCheck($password);
            if ($result[0] == false)
            {
                echo $result[1];
                echo "<script>location.href=history.back(-1);</script>";
            }
        
            if($password!=$password_check){
                echo "<script>alert('패스워드가 일치하지 않습니다.');location.href=history.back(-1);</script>";
            }
        
            $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if(!preg_match($pattern,$email)) {
                echo "<script>alert('이메일 주소가 올바른 형식이 아닙니다.');location.href=history.back(-1);</script>";
            }
            $current_id = $_SESSION["id"];
            $password = md5($password);
            $query = "update members set name='{$name}', password='{$password}', email='{$email}' where id='{$current_id}'";
            $result = $db_conn->query($query);
            echo "<script>alert('정보가 수정되었습니다.');location.href='index.php?page=login';</script>";
            exit();
        } else{
            echo "<script>alert('모든 값을 입력해주세요.');location.href=history.back(-1);</script>";
        }
    }
?>

<!doctype html>
<html>
    <head>
        <style>
            .form-container {
                display: flex;
                justify-content: center;
                gap: 20px;
                align-items: center;
            }
            .form-container form {
                flex: 1; 
                text-align: center; 
            }
            .form-container button {
                width: 100%; 
            }
        </style>
    </head>
    <body>
        <form action="index.php?page=mypage" method="POST">
            <br>
            <br>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password1" placeholder="Password Input" required>
                <small class="text-muted">※비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.※</small>
            </div>
            <br>
            <div class="form-group">
                <label>Password Check</label>
                <input type="password" class="form-control" name="password2" placeholder="Password Check" required>
            </div>
            <br>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name Input" required>
            </div>
            <br>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="Email" placeholder="Email Input" required>
            </div>
            <br>
        </form>
        
   
        <div class="form-container">
       
            <form action="index.php?page=mypage" method="POST">
                <button type="submit" class="btn btn-outline-danger">UPDATE</button>
            </form>
            
         
            <form action="index.php?page=auth" method="POST">
                <input type="hidden" name="mode" value="withdrawal">
                <button type="submit" class="btn btn-outline-danger">Withdrawal</button>
            </form>
        </div>
    </body>
</html>
