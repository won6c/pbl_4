<?
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $db_conn = mysql_conn();

        $id = $_POST["id"];
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

        if(!empty($id) && !empty($password) && !empty($password_check) && !empty($name) && !empty($email)) {
            $stmt = $db_conn->prepare("SELECT * FROM members WHERE id = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                echo "<script>alert('이미 존재하는 ID입니다.');location.href=history.back(-1);</script>";
                exit();
            }

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
        
            $password = md5($password);
            $query = "insert into members(id,password,name,email) values('{$id}','{$password}','{$name}','{$email}')";
            $result = $db_conn->query($query);
            echo "<script>alert('회원가입이 완료되었습니다.');location.href='index.php?page=login';</script>";
            exit();
        } else{
            echo "<script>alert('모든 값을 입력해주세요.');location.href=history.back(-1);</script>";
        }
    }
?>

<!doctype html>
<html>
    <head>

    </head>
    <body>
        <form action="index.php?page=join" method="POST">
            <br>
            <br>
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="id" placeholder="ID Input" required>
            </div>
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
            <div class="text-center">
                <button type="submit" class="btn btn-outline-danger">JOIN</button>
            </div>
        </form>
    </body>
</html>
