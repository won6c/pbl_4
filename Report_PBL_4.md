><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><div style="text-align: center;">
>  <strong><h1 style="font-weight: bold; border-bottom: none; font-size:48px;">PBL 과제 4</h1></strong>
>   <h3 style="font-weight: bold; border-bottom: none; font-size:30px;"><로그인 기능이 포함된 php 페이지></h3>
></div>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><div style="text-align: center;">
>  <table style="margin: 0 auto; border-collapse: collapse;">
>    <tr>
>      <th style="border: 1px solid black; padding: 8px;">회차</th>
>      <th style="border: 1px solid black; padding: 8px;">정보보호 9회차</th>
>    </tr>
>    <tr>
>      <th style="border: 1px solid black; padding: 8px;">이름</th>
>      <th style="border: 1px solid black; padding: 8px;">최원준</th>
>    </tr>
>  </table>
></div>
>
>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><div style="text-align: center;">
>  <h2>Index</h2>
></div>
><hr>
><br>
><br>
><div style="text-align: center;">
>  1. <strong>수행 환경</strong> ·························································································································································<a href="#env">3</a><br>
>  2. <strong>구현 기능</strong> ·························································································································································<a href="#func">8</a><br>
>  3. <strong>코드 리뷰</strong> ·························································································································································<a href="#code">9</a><br>
>  4. <strong>개선 사항</strong> ·························································································································································<a href="#modified">9</a><br>
>  5. <strong>결론</strong> ·································································································································································<a href="#feel">16</a><br>
>  6. <strong>Appendix 1</strong> ··················································································································································<a href="#Appendix">18</a>
></div>
>
>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
><br>
>
>
>><br>
>><br>
>><br>
>><h3 id="env" style="font-weight:bold"> 1. 수행 환경</h3>
>><br>
>><strong>APM_Setup</strong><br>
>><hr>
>><br>
>>
>> - APM 
>>      - 웹서버 구축에 많이 사용되는 Apache, PHP, MySQL의 앞글자를 따 줄인말
>> - PHP
>>      - 웹 프로그래밍 언어, 서버 측에서 실행되며 HTML 생성 및 DBMS와 상호 작용하는 역할을 수행
>> - MySQL
>>      - 데이터베이스 관리 시스템 ( DBMS )
>>      - 관계형 DB
>>      - Table 형식
>> - APM_Setup
>>      - APM server 구축을 한 번에 해주는 프로그램
>>      - Apache, PHP, MySQL을 한 번에 설치해주고 한 번에 관리할 수 있도록 도와줌
>>
>><br>
>><br>
>><p align='center'>
>>  <img src="./image/apmsetup.png" width="400" height="auto">
>></p>
>><br>
>><br>
>><strong>세부 구성</strong><br>
>><hr>
>>
>> - Apache
>>      - 버전 : Apache/2.2.14
>> - PHP
>>      - 버전 : 5.2.12
>> - MySQL
>>      - 버전 : 5.1.41-community
>>      - 이번 pbl에서 사용하는 Database명 : pbl_4
>>      - pbl_4 내부 Table
>>
>><div style="display: flex; justify-content: center;">
>>    <table border="1" style="margin:auto; width:55%; text-align:center;">
>>        <thead>
>>            <tr>
>>                <th style="text-align:center;">Tables_in_pbl_4</th>
>>            </tr>
>>        </thead>
>>        <tbody>
>>            <tr>
>>                <td>insecure_board</td>
>>            </tr>
>>            <tr>
>>                <td>members</td>
>>            </tr>
>>        </tbody>
>>    </table>
>></div>
>><br>
>><br>
>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>insecure_board example</strong>
>><br>
>><br>
>><div style="display: flex; justify-content: center;">
>>    <table border="1" style="margin:auto">
>>        <thead>
>>            <tr>
>>                <th>idx</th>
>>                <th>title</th>
>>                <th>content</th>
>>                <th>id</th>
>>                <th>writer</th>
>>                <th>password</th>
>>                <th>file</th>
>>                <th>secret</th>
>>            </tr>
>>        </thead>
>>        <tbody>
>>            <tr>
>>                <td>1</td>
>>                <td>test</td>
>>                <td>testing</td>
>>                <td>tester</td>
>>                <td>tester</td>
>>                <td>test</td>
>>                <td>file</td>
>>                <td>n</td>
>>            </tr>
>>        </tbody>
>>    </table>
>></div>
>>
>><br>
>><br>
>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>members example</strong>
>><br>
>><br>
>><div style="display: flex; justify-content: center;">
>>    <table border="1" style="margin:auto" width=70% >
>>        <thead>
>>            <tr>
>>                <th>idx</th>
>>                <th>id</th>
>>                <th>password</th>
>>                <th>name</th>
>>                <th>email</th>
>>            </tr>
>>        </thead>
>>        <tbody>
>>            <tr>
>>                <td>1</td>
>>                <td>admin</td>
>>                <td>md5 hashed pwd</td>
>>                <td>admin</td>
>>                <td>admin@admin.com</td>
>>            </tr>
>>        </tbody>
>>    </table>
>></div>
>>
>><br>
>><br>
>><h3 id="func" style="font-weight:bold"> 2. 구현 기능</h3>
>><br>
>><strong>Simple Board</strong><br>
>><hr>
>>
>> - 회원가입 / 탈퇴 기능
>> - 로그인 / 로그아웃 기능
>> - 사용자 정보 수정 기능
>> - 게시물 작성 기능
>> - 게시물 수정 기능
>> - 게시물 삭제 기능
>> - 파일 업로드 기능
>> - 파일 다운로드 기능
>>
>><br>
>><br>
>><br>
>><strong>회원가입 기능</strong><br>
>><hr>
>>
>> - ID, Password, Password Check, Name, Email을 입력 받음
>> - Password가 영문, 숫자, 특수문자로 구성되어 있는지 확인
>> - 모든 값을 입력했는지 확인
>> - 존재하는 ID인지 확인
>> - Password와 Password Check가 일치하는지 확인
>> - 이메일 주소의 형식을 확인
>> - Password를 md5형식으로 변환
>> - 입력받은 값들과 변환된 Password 값을 DB에 저장
>>
>><br>
>><br>
>><br>
>><strong>로그인 기능</strong><br>
>><hr>
>>
>> - ID와 Password를 POST 메서드로 받음
>> - ID와 Password에 ```'```와 ```"```가 있는지 확인
>> - 존재한다면 리다이렉트
>> - 입력받은 Password를 md5로 변환
>> - 입력받은 Id와 Password로 DB에 질의
>> - 존재한다면 세션 설정
>>
>><br>
>><br>
>><br>
>><strong>로그아웃 기능</strong><br>
>><hr>
>>
>> - 세션 삭제
>>
>><br>
>><br>
>><br>
>><strong>사용자 정보 수정 기능</strong><br>
>><hr>
>>
>> - Password, Password Check, Name, Email을 입력받음
>> - Password가 영문, 숫자, 특수문자로 구성되어 있는지 확인
>> - 모든 값을 입력했는지 확인
>> - Password와 Password Check가 일치하는지 확인
>> - 이메일 주소의 형식을 확인
>> - Password를 md5형식으로 변환
>> - 기존 값들을 입력받은 값들과 변환된 Password 값, 세션에 저장된 id값으로 수정
>>
>><br>
>><br>
>><br>
>><strong>게시물 작성 기능</strong><br>
>><hr>
>>
>> - Title, Password, Contents을 입력받고 File을 업로드 받음
>> - 비어있는 입력 값이 존재하는지 확인
>> - cos.jar을 통하여 파일을 업로드 함
>> - DB에 Title, Password, Contents 내용을 저장함
>>
>><br>
>><br>
>><br>
>><strong>게시물 수정 기능</strong><br>
>><hr>
>>
>> - Title, Password, Contents을 입력받고 File을 업로드 받음
>> - 비어있는 입력 값이 존재하는지 확인
>> - cos.jar을 통하여 파일을 업로드 함
>> - DB에 Title, Password, Contents 내용을 수정함
>>
>><br>
>><br>
>><br>
>><strong>게시물 삭제 기능</strong><br>
>><hr>
>>
>> - 게시물의 비밀번호를 확인함
>> - 게시물의 idx값을 받음
>> - 받은 idx값을 통해서 DB에 DELETE를 수행함
>>
>><br>
>><br>
>><br>
>><strong>파일 업로드 기능</strong><br>
>><hr>
>>
>> - cos.jar을 통하여 파일을 업로드 함
>>
>><br>
>><br>
>><br>
>><strong>파일 다운로드 기능</strong><br>
>><hr>
>>
>> - file 파라미터를 통하여 파일명을 지정함
>> - common.php에 있는 업로드 경로와 file 파라미터를 통하여 해당 파일을 readfile로 다운로드
>>
>><br>
>><br>
>><br>
>>
>><h3 id="code" style="font-weight:bold"> 3. 코드 리뷰</h3>
>><br>
>><br>
>><br>
>><strong>common.php</strong><br>
>><hr>
>>
>>```php
>><?
>>    header("Content-Type: text/html; charset=UTF-8;");
>>
>>    $tb_name = "insecure_board";
>>    $upload_path = "upload";
>>    
>>    function mysql_conn(){
>>        $host = "127.0.0.1";
>>        $id = "root";
>>        $pw = "apmsetup";
>>        $db = "pbl_4";
>>
>>        $db_conn = new mysqli($host,$id,$pw,$db);
>>
>>        return $db_conn;
>>    }
>>?>
>>```
>>
>> - 전체적으로 활용할 부분들을 정의
>>
>><br>
>><br>
>><br>
>><strong>join.php</strong><br>
>><hr>
>>
>>```php
>>        $db_conn = mysql_conn();
>>        $id = $_POST["id"];
>>        $password = $_POST["password1"];
>>        $password_check = $_POST["password2"];
>>        $name = $_POST["name"];
>>        $email = $_POST["Email"];
>>```
>>
>> - 입력 받는 파라미터
>>
>><br>
>>
>>```php
>>function passwordCheck($_str)
>>        {
>>            $pw = $_str;
>>            $num = preg_match('/[0-9]/u', $pw);
>>            $eng = preg_match('/[a-z]/u', $pw);
>>            $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
>> 
>>            if(strlen($pw) < 10 || strlen($pw) > 30)
>>            {
>>                return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.");
>>                exit;
>>            }
>> 
>>            if(preg_match("/\s/u", $pw) == true)
>>            {
>>                return array(false, "비밀번호는 공백없이 입력해주세요.");
>>                exit;
>>            }
>> 
>>            if( $num == 0 || $eng == 0 || $spe == 0)
>>            {
>>                return array(false, "영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
>>                exit;
>>            }
>> 
>>            return array(true);
>>        }
>>```
>>
>> - Password 입력값 검증 ( 영문, 숫자, 특수문자 포함 여부 )
>>
>><br>
>>
>>```php
>>if(!empty($id) && !empty($password) && !empty($password_check) && !empty($name) && >>!empty($email)) {
>>            $stmt = $db_conn->prepare("SELECT * FROM members WHERE id = ?");
>>            $stmt->bind_param("s", $id);
>>            $stmt->execute();
>>            $stmt->store_result();
>>            if ($stmt->num_rows > 0) {
>>                echo "<script>alert('이미 존재하는 ID입니다.');location.href=history.back(-1);</script>";
>>                exit();
>>            }
>>
>>            $result = passwordCheck($password);
>>            if ($result[0] == false)
>>            {
>>                echo $result[1];
>>                echo "<script>location.href=history.back(-1);</script>";
>>            }
>>        
>>            if($password!=$password_check){
>>                echo "<script>alert('패스워드가 일치하지 않습니다.');location.href=history.back(-1);</script>";
>>            }
>>        
>>            $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
>>            if(!preg_match($pattern,$email)) {
>>                echo "<script>alert('이메일 주소가 올바른 형식이 아닙니다.');location.href=history.back(-1);</script>";
>>            }
>>        
>>            $password = md5($password);
>>            $query = "insert into members(id,password,name,email) values('{$id}','{$password}','{$name}','{$email}')";
>>            $result = $db_conn->query($query);
>>            echo "<script>alert('회원가입이 완료되었습니다.');location.href='index.php?>>page=login';</script>";
>>            exit();
>>        } else{
>>            echo "<script>alert('모든 값을 입력해주세요.');location.href=history.back>>(-1);</script>";
>>        }
>>```
>>
>> - 모든 값을 입력했는지 확인
>> - 존재하는 ID인지 확인
>> - Password와 Password Check가 일치하는지 확인
>> - 이메일 주소의 형식을 확인
>> - Password를 md5형식으로 변환
>> - 입력받은 값들과 변환된 Password 값을 DB에 저장
>>
>><br>
>>
>>```html
>><!doctype html>
>><html>
>>    <head>
>>
>>    </head>
>>    <body>
>>        <form action="index.php?page=join" method="POST">
>>            <br>
>>            <br>
>>            <div class="form-group">
>>                <label>ID</label>
>>                <input type="text" class="form-control" name="id" placeholder="ID Input" required>
>>            </div>
>>            <br>
>>            <div class="form-group">
>>                <label>Password</label>
>>                <input type="password" class="form-control" name="password1" placeholder="Password Input" required>
>>                <small class="text-muted">※비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.※</small>
>>            </div>
>>            <br>
>>            <div class="form-group">
>>                <label>Password Check</label>
>>                <input type="password" class="form-control" name="password2" placeholder="Password Check" required>
>>            </div>
>>            <br>
>>            <div class="form-group">
>>                <label>Name</label>
>>                <input type="text" class="form-control" name="name" placeholder="Name Input" required>
>>            </div>
>>            <br>
>>            <div class="form-group">
>>                <label>Email</label>
>>                <input type="text" class="form-control" name="Email" placeholder="Email >>Input" required>
>>            </div>
>>            <br>
>>            <div class="text-center">
>>                <button type="submit" class="btn btn-outline-danger">JOIN</button>
>>            </div>
>>        </form>
>>    </body>
>></html>
>>```
>>
>> - join.php 프론트 부분
>>
>><br>
>><br>
>><br>
>><strong>login.php</strong><br>
>><hr>
>>
>>```php
>>$db_conn = mysql_conn();
>>
>>    if(!empty($_SESSION["id"])){
>>      echo "<script>location.href='index.php';</script>";
>>      exit();
>>    }
>>    
>>    $id = $_POST["id"];
>>    $password = $_POST["password"];
>>```
>>
>> - session이 비어있지 않다면 로그인되어 있는 것으로 판단하고 index.php로 리다이렉션
>> - id와 password 파라미터를 받음
>>
>><br>
>>
>>```php
>>if(!empty($id) && !empty($password)){
>>        if(preg_match("/['\"]/",$id)){
>>            echo "<script>history.back(-1);</script>";
>>            exit();
>>        }
>>        if(preg_match("/['\"]/",$password)){
>>            echo "<script>history.back(-1);</script>";
>>            exit();
>>        }
>>```
>>
>> - 간단한 SQLi 방지 조건문
>> - ```'```, ```"```을 탐지
>>
>><br>
>>
>>```php
>>        $password = md5($password);
>>        $query = "select * from members where id='{$id}' and password='{$password}'";
>>        $result = $db_conn->query($query);
>>        $num = $result->num_rows;
>>
>>        if($num!=0){
>>            $row = $result->fetch_assoc();
>>            session_start();
>>            session_regenerate_id(true);
>>            $_SESSION["id"]=$row["id"];
>>            $_SESSION["name"]=$row["name"];
>>            echo "<script>location.href='index.php'</script>";
>>        } else{
>>            echo "<script>alert('아이디 혹은 패스워드가 틀렸습니다.');history.back(-1);</script>";
>>            exit();
>>        }
>>```
>>
>> - password를 md5화한 후 DB에 질의
>> - id와 password가 존재한다면 session을 설정
>>
>><br>
>>
>>```html
>><!doctype html>
>><html>
>>    <head>
>>
>>    </head>
>>    <body>
>>        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
>>	    	<h1 class="display-4">Login Page</h1>
>>        	<hr>
>>        </div>
>>
>>          <div class="row">
>>            <div class="col-md">
>>              <form class="needs-validation" action="index.php?page=login" method="POST" novalidate>
>>                <div class="mb-3">
>>                  <label for="username">ID</label>
>>                  <div class="input-group">
>>                    <input type="text" class="form-control" name="id" id="username" placeholder="Username" required>
>>                  </div>
>>                </div>
>>                <div class="mb-3">
>>                  <label>Password</label>
>>                  <input type="password" class="form-control" name="password" placeholder="Password" required>
>>                  <div class="invalid-feedback">
>>                    (필수) 패스워드를 입력하세요.
>>                  </div>
>>                </div>
>>                <hr class="mb-4">
>>                <div class="text-center">
>>                    <button type="submit" class="btn btn-info btn-sm btn-block">LOGIN</button>
>>                </div>
>>              </form>
>>            </div>
>>          </div>
>>        </div>
>>    </body>
>></html>
>>```
>>
>> - login.php 프론트 부분
>>
>><br>
>><br>
>><br>
>><strong>logout.php</strong><br>
>><hr>
>>
>>```php
>><?
>>    @session_start();
>>    unset($_SESSION["id"]);
>>    session_destroy();
>>    echo "<script>location.href='index.php';</script>";
>>?>
>>```
>>
>> - 세션을 지운 후 삭제
>>
>><br>
>><br>
>><br>
>><strong>mypage.php</strong><br>
>><hr>
>>
>>```php
>>        $db_conn = mysql_conn();
>>
>>        $password = $_POST["password1"];
>>        $password_check = $_POST["password2"];
>>        $name = $_POST["name"];
>>        $email = $_POST["Email"];
>>```
>>
>> - DB 연결
>> - 입력 받는 파라미터
>>
>><br>
>>
>>```php
>>function passwordCheck($_str)
>>        {
>>            $pw = $_str;
>>            $num = preg_match('/[0-9]/u', $pw);
>>            $eng = preg_match('/[a-z]/u', $pw);
>>            $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
>> 
>>            if(strlen($pw) < 10 || strlen($pw) > 30)
>>            {
>>                return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.");
>>                exit;
>>            }
>> 
>>            if(preg_match("/\s/u", $pw) == true)
>>            {
>>                return array(false, "비밀번호는 공백없이 입력해주세요.");
>>                exit;
>>            }
>> 
>>            if( $num == 0 || $eng == 0 || $spe == 0)
>>            {
>>                return array(false, "영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
>>                exit;
>>            }
>> 
>>            return array(true);
>>        }
>>```
>>
>> - Password 입력값 검증 ( 영문, 숫자, 특수문자 포함 여부 )
>>
>><br>
>>
>>```php
>>if(!empty($password) && !empty($password_check) && !empty($name) && !empty($email)) {
>> 
>>            $result = passwordCheck($password);
>>            if ($result[0] == false)
>>            {
>>                echo $result[1];
>>                echo "<script>location.href=history.back(-1);</script>";
>>            }
>>        
>>            if($password!=$password_check){
>>                echo "<script>alert('패스워드가 일치하지 않습니다.');location.href=history.back(-1);</script>";
>>            }
>>        
>>            $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
>>            if(!preg_match($pattern,$email)) {
>>                echo "<script>alert('이메일 주소가 올바른 형식이 아닙니다.');location.href=history.back(-1);</script>";
>>            }
>>            $current_id = $_SESSION["id"];
>>            $password = md5($password);
>>            $query = "update members set name='{$name}', password='{$password}', email='{$email}' where id='{$current_id}'";
>>            $result = $db_conn->query($query);
>>            echo "<script>alert('정보가 수정되었습니다.');location.href='index.php?>>page=login';</script>";
>>            exit();
>>        } else{
>>            echo "<script>alert('모든 값을 입력해주세요.');location.href=history.back>>(-1);</script>";
>>        }
>>```
>>
>> - 패스워드 일치 여부 확인
>> - 이메일 형식 확인
>> - password를 md5로 변환 후 DB에 update
>>
>><br>
>>
>>```html
>><!doctype html>
>><html>
>>    <head>
>>        <style>
>>            .form-container {
>>                display: flex;
>>                justify-content: center;
>>                gap: 20px;
>>                align-items: center;
>>            }
>>            .form-container form {
>>                flex: 1; 
>>                text-align: center; 
>>            }
>>            .form-container button {
>>                width: 100%; 
>>            }
>>        </style>
>>    </head>
>>    <body>
>>        <form action="index.php?page=mypage" method="POST">
>>            <br>
>>            <br>
>>            <div class="form-group">
>>                <label>Password</label>
>>                <input type="password" class="form-control" name="password1" placeholder="Password Input" required>
>>                <small class="text-muted">※비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.※</small>
>>            </div>
>>            <br>
>>            <div class="form-group">
>>                <label>Password Check</label>
>>                <input type="password" class="form-control" name="password2" placeholder="Password Check" required>
>>            </div>
>>            <br>
>>            <div class="form-group">
>>                <label>Name</label>
>>                <input type="text" class="form-control" name="name" placeholder="Name Input" required>
>>            </div>
>>            <br>
>>            <div class="form-group">
>>                <label>Email</label>
>>                <input type="text" class="form-control" name="Email" placeholder="Email >>Input" required>
>>            </div>
>>            <br>
>>        </form>
>>        
>>        <div class="form-container">
>>            <form action="index.php?page=mypage" method="POST">
>>                <button type="submit" class="btn btn-outline-danger">UPDATE</button>
>>            </form>
>>            
>>            <form action="index.php?page=auth" method="POST">
>>                <input type="hidden" name="mode" value="withdrawal">
>>                <button type="submit" class="btn btn-outline-danger">Withdrawal</button>
>>            </form>
>>        </div>
>>    </body>
>></html>
>>```
>>
>> - mypage.php 프론트 부분
>> - UPDATE 버튼 클릭 시 사용자 정보 수정
>> - Withdrawal 버튼 클릭 시 사용자 탈퇴
>>
>><br>
>><br>
>><br>
>><strong>action.php</strong><br>
>><hr>
>>
>>```php
>>    @session_start();
>>    header("Content-Type: text/html; charset=UTF-8");
>>    include_once ('./common.php');
>>
>>    $mode = $_REQUEST["mode"];
>>    $db_conn = mysql_conn();
>>```
>>
>> - common.php 불러옴
>> - mode라는 파라미터를 GET과 POST 방식으로 받음
>> - DB에 연결
>>
>><br>
>>
>>```php
>>if ($mode == "write") {
>>        $title = $_POST["title"];
>>        $id = $_SESSION["id"];
>>        $writer = $_SESSION["name"];
>>        $password = $_POST["password"];
>>        $content = $_POST["content"];
>>        $secret = isset($_POST["secret"]) ? $_POST["secret"] : ""; // 체크박스 검증
>>        $uploadFile = "";
>>```
>>
>> - mode가 write일 경우
>> - 파라미터들과 세션값을 받음
>>
>><br>
>>
>>```php
>>if (empty($title) || empty($password) || empty($content)) {
>>            echo "<script>alert('빈 칸이 존재합니다.');history.back(-1);</script>";
>>            exit();
>>        }
>>
>>        // 비밀글 여부 설정
>>        $secret = ($secret == "on") ? "y" : "n";
>>
>>        // 줄바꿈 처리
>>        $content = str_replace("\r\n", "<br>", $content);
>>
>>        // 파일 업로드 처리
>>        if (!empty($_FILES["userfile"]["name"])) {
>>            $uploadFile = $_FILES["userfile"]["name"];
>>            $uploadPath = "{$upload_path}/{$uploadFile}";
>>
>>            if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath)) {
>>                echo "<script>alert('파일 업로드에 실패했습니다.');history.back(-1);</script>";
>>                exit();
>>            }
>>        } else {
>>            $uploadFile = ''; // 파일이 없으면 빈 값 처리
>>        }
>>```
>>
>> - 비어있는 공간이 있을 경우 업로드 불가
>> - 비밀글 여부를 확인
>> - 줄바꿈 처리를 수행
>> - cos.jar을 통하여 파일을 업로드 
>>
>><br>
>>
>>```php
>>$query = "INSERT INTO {$tb_name} (title, content, id, writer, password, file, secret) 
>>                  VALUES (?, ?, ?, ?, ?, ?, ?)";
>>
>>        $stmt = $db_conn->prepare($query);
>>
>>        // prepare()가 실패하면 오류 메시지 출력
>>        if (!$stmt) {
>>            die("Prepare failed: (" . $db_conn->errno . ") " . $db_conn->error);
>>        }
>>
>>        // 바인딩 (s는 string을 의미)
>>        $stmt->bind_param("sssssss", $title, $content, $id, $writer, $password, $uploadFile, $secret);
>>
>>        // 쿼리 실행
>>        if ($stmt->execute()) {
>>            echo "<script>alert('글 작성이 완료되었습니다.');location.href='index.php';</script>";
>>        } else {
>>            // 쿼리 실행 실패 시 오류 메시지 출력
>>            echo "<script>alert('SQL 오류 발생: " . $stmt->error . "');history.back(-1);</script>";
>>        }
>>
>>
>>    }
>>```
>>
>> - prepared문에 받은 파라미터 값들을 입력
>> - DB 입력 성공 여부로 작성 완료 여부 판단
>>
>><br>
>>
>>```php
>>else if($mode == "modify") {
>>		$idx = $_POST["idx"];
>>		$title = $_POST["title"];
>>		$password = $_POST["password"];
>>		$content = $_POST["content"];
>>		$secret = $_POST["secret"];
>>		$uploadFile = $_POST["oldfile"];
>>```
>>
>> - mode가 modify인 경우
>>
>><br>
>>
>>```php
>>if(empty($idx) || empty($title) || empty($password) || empty($content)) {
>>			echo "<script>alert('빈칸이 존재합니다.');history.back(-1);</script>";
>>			exit();
>>		}
>>
>>		# Password Check Logic
>>		$query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
>>		$result = $db_conn->query($query);
>>		$num = $result->num_rows;
>>
>>		if($num == 0) {
>>			echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
>>			exit();
>>		}
>>
>>		$secret = ($secret == "on") ? "y" : "n";
>>
>>        // 줄바꿈 처리
>>        $content = str_replace("\r\n", "<br>", $content);
>>```
>>
>> - 입력 받는 부분들 중에서 비어있는 곳을 확인
>> - 처음 작성 시 설정한 password와 이번 작성 시 입력한 password 일치 여부를 확인
>> - 비밀글 여부 확인
>> - ```\r\n```을 ```<br>```로 변환
>>
>><br>
>>
>>```php
>>if (!empty($_FILES["userfile"]["name"])) {
>>            $uploadFile = $_FILES["userfile"]["name"];
>>            $uploadPath = "{$upload_path}/{$uploadFile}";
>>
>>            if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath)) {
>>                echo "<script>alert('파일 업로드에 실패했습니다.');history.back(-1);</script>";
>>                exit();
>>            }
>>        } else {
>>            $uploadFile = ''; // 파일이 없으면 빈 값 처리
>>        }
>>
>>        // 준비된 문 사용 (regdate 필드 제거)
>>        $query = "UPDATE {$tb_name} SET title = ?, content = ?, file = ?, secret = ? WHERE idx = ?";
>>
>>        $stmt = $db_conn->prepare($query);
>>
>>        // prepare()가 실패하면 오류 메시지 출력
>>        if (!$stmt) {
>>            die("Prepare failed: (" . $db_conn->errno . ") " . $db_conn->error);
>>        }
>>
>>        // 바인딩 (s는 string을 의미)
>>        $stmt->bind_param("ssssi", $title, $content, $uploadFile, $secret, $idx);
>>
>>        // 쿼리 실행
>>        if ($stmt->execute()) {
>>            echo "<script>alert('글 작성이 완료되었습니다.');location.href='index.php';</script>";
>>        } else {
>>            // 쿼리 실행 실패 시 오류 메시지 출력
>>            echo "<script>alert('SQL 오류 발생: " . $stmt->error . "');history.back(-1);</script>";
>>        }
>>	}
>>```
>>
>> - cos.jar을 이용하여 파일 업로드
>> - prepared문 사용
>> - 입력값들을 기존 DB의 값에 update
>> - DB update 여부로 수정 여부 판단
>>
>><br>
>>
>>```php
>>else if ($mode == "delete") {
>>        $idx = $_GET["idx"];
>>    
>>        // 해당 idx의 게시물 삭제 처리
>>        $query = "DELETE FROM {$tb_name} WHERE idx = ?";
>>        $stmt = $db_conn->prepare($query);
>>        $stmt->bind_param("i", $idx);
>>    
>>        if ($stmt->execute()) {
>>            echo "<script>alert('게시물이 삭제되었습니다.');location.href='index.php';</script>";
>>        } else {
>>            echo "<script>alert('삭제 중 오류가 발생했습니다.');history.back(-1);</script>";
>>        }
>>    }
>>```
>>
>> - mode가 delete인 경우
>> - idx를 GET 메서드로 받아옴
>> - prepared문 사용
>> - DB에 delete를 수행
>> - 수행 여부로 delete 판단
>>
>><br>
>><br>
>><br>
>><strong>write.php</strong><br>
>><hr>
>>
>>```html
>><?if(!empty($_SESSION["id"])){?>
>>
>>    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
>>      <h1 class="display-4">Write Page</h1>
>>      <hr>
>>    </div>
>>
>>    <div class="container">
>>        <form action="action.php" method="POST" enctype="multipart/form-data">
>>            <div class="form-group">
>>                <label>Title</label>
>>                <input type="text" class="form-control" name="title" placeholder="Title Input">
>>            </div>
>>            <div class="form-group">
>>			    <label for="exampleInputPassword1">Password</label>
>>			    <input type="password" class="form-control" name="password" placeholder="Password Input">
>>		    </div>
>>		    <div class="form-group">
>>			    <label for="exampleInputPassword1">Contents</label>
>>			    <textarea class="form-control" name="content" rows="5" placeholder="Contents Input"></textarea>
>>            </div>
>>            <div class="form-group">
>>                <label for="exampleInputPassword1">File</label>
>>                <input type="file" class="form-control" name="userfile">
>>		    </div>
>>            <div class="custom-control custom-checkbox">
>>                <input type="checkbox" class="custom-control-input" id="customCheck1" name="secret">
>>                <label class="custom-control-label" for="customCheck1">Secret Post</label>
>>            </div>
>>            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
>>                <input type="hidden" name="mode" value="write">
>>                <button type="submit" class="btn btn-outline-primary">Write</button>
>>                <button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
>>		    </div>
>>		</form>
>>    </div>
>>```
>>
>> - session이 설정되어 있을 경우 
>> - Title, Password, Contents, File, Secret과 과련된 입력을 받음
>>
>><br>
>>
>>```html
>><?}else{?>
>>
>>    <h1 align="center">403 Forbidden</h1>
>>
>><?}?>
>>```
>>
>> - session이 설정되어 있지 않을 경우
>> - 403을 출력함
>>
>><br>
>><br>
>><br>
>><strong>view.php</strong><br>
>><hr>
>>
>>```php
>><?
>>	$db_conn = mysql_conn();
>>	$idx = $_REQUEST["idx"];
>>	$password = $_POST["password"];
>>
>>	if(empty($password)) {
>>		$query = "select * from {$tb_name} where idx={$idx} and secret='n'";
>>	} else {
>>		$query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
>>	}
>>	
>>	$result = $db_conn->query($query);
>>	$num = $result->num_rows;
>>?>
>>```
>>
>> - 비밀글 여부를 판단
>>
>><br>
>>
>>```html
>>    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
>>		<h1 class="display-4">View Page</h1>
>>    	<hr>
>>    </div>
>>    
>>    <div class="container">
>>	<?
>>	if($num != 0) {
>>		$row = $result->fetch_assoc();
>>	?>
>>		<table class="table table-bordered">
>>		  <tbody>
>>			<tr>
>>			  <th scope="row" width="20%" class="text-center">Title</th>
>>			  <td><?=$row["title"]?></td>
>>			</tr>
>>			<tr>
>>			  <th scope="row" width="20%" class="text-center">Writer</th>
>>			  <td><?=$row["writer"]?></td>
>>			</tr>
>>			<tr>
>>			  <th scope="row" width="20%" class="text-center">Contents</th>
>>			  <td><?=$row["content"]?></td>
>>			</tr>
>>			<? if(!empty($row["file"])) { ?>
>>			<tr>
>>			  <th scope="row" width="20%" class="text-center">File</th>
>>			  <td><a href="download.php?file=<?=$row["file"]?>"><?=$row["file"]?></a></td>
>>			</tr>
>>			<? } ?>
>>		  </tbody>
>>		</table>
>>        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
>>			<? if($_SESSION["id"] == $row["id"]) { ?>
>>			<button type="button" class="btn btn-outline-secondary" onclick="location.href='index.php?page=modify&idx=<?=$row["idx"]?>'">Modify</button>
>>			<button type="button" class="btn btn-outline-danger" onclick="location.href='index.php?page=auth&mode=delete&idx=<?=$row["idx"]?>'">Delete</>>button>
>>			<? } ?>
>>			<button type="button" class="btn btn-outline-warning" onclick="location.href='index.php'">List</button>
>>		</div>
>>    </div>
>>	<?
>>	} else {
>>	?>
>>		<script>alert("존재하지 않는 게시글 입니다.");history.back(-1);</script>
>>	<?
>>	}
>>	?>
>>
>><?
>>	$db_conn->close();
>>?>
>>
>>```
>>
>> - 게시물 보는 페이지
>> - 버튼을 통하여 게시물 수정, 삭제 가능
>> - 업로드된 파일이 존재하는 경우 파일 다운로드
>>
>><br>
>><br>
>><br>
>><strong>modify.php</strong><br>
>><hr>
>>
>>```php
>><?
>>	include_once("./common.php");
>>
>>	$db_conn = mysql_conn();
>>	$idx = $_GET["idx"];
>>
>>	$query = "select * from {$tb_name} where idx={$idx}";
>>  
>>	$result = $db_conn->query($query);
>>	$num = $result->num_rows;
>>?>
>>```
>>
>> - idx를 통하여 db에서 해당 내용들을 가져옴
>>
>><br>
>>
>>```html
>><div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
>>      <h1 class="display-4">Modify Page</h1>
>>      <hr>
>>    </div>
>>	<?
>>	if($num != 0) {
>>	  $row = $result->fetch_assoc();
>>	?>
>>    <div class="container">
>>		<form action="action.php" method="POST" enctype="multipart/form-data">
>>		  <div class="form-group">
>>			<label>Title</label>
>>			<input type="text" class="form-control" name="title" placeholder="Title Input" value="<?=$row["title"]?>">
>>		  </div>
>>		  <div class="form-group">
>>			<label for="exampleInputPassword1">Password</label>
>>			<input type="password" class="form-control" name="password" placeholder="Password Input">
>>		  </div>
>>		  <div class="form-group">
>>			<label for="exampleInputPassword1">Contents</label>
>>			<textarea class="form-control" name="content" rows="5" placeholder="Contents Input"><?=$row["content"]?></textarea>
>>      </div>
>>		  <div class="form-group">
>>			<label for="exampleInputPassword1">File</label>
>>      <? if(!empty($row["file"])) { ?>
>>      <p class="font-italic">[Attach]&nbsp;<?=$row["file"]?></p>
>>      <? } ?>
>>      <input type="hidden" class="form-control" name="oldfile" value="<?=$row["file"]?>">
>>			<input type="file" class="form-control" name="userfile">
>>		  </div>
>>      <div class="custom-control custom-checkbox">
>>        <input type="checkbox" class="custom-control-input" id="customCheck1" name="secret" <? if($row["secret"]=="y") echo "checked"; ?>>
>>        <label class="custom-control-label" for="customCheck1">Secret Post</label>
>>      </div>
>>      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
>>			<input type="hidden" name="idx" value="<?=$row["idx"]?>">
>>			<input type="hidden" name="mode" value="modify">
>>			<button type="submit" class="btn btn-outline-secondary">Modify</button>
>>			<button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
>>		</div>
>>		</form>
>>    </div>
>>	<?
>>	} else {
>>	?>
>>		<script>alert("존재하지 않는 게시글 입니다.");history.back(-1);</script>
>>	<?
>>	}
>>	?>
>>```
>>
>> - 게시물을 수정하는 페이지
>>
>><br>
>><br>
>><br>
>><strong>auth.php</strong><br>
>><hr>
>>
>>```php
>>include_once("./common.php");
>>
>>$mode = $_REQUEST["mode"];
>>
>>$id = $_SESSION["id"];
>>$password = isset($_POST["password"]) ? $_POST["password"] : '';
>>$idx = isset($_GET["idx"]) ? $_GET["idx"] : '';
>>```
>>
>> - 자신인지 인증하는 페이지
>> - mode를 GET과 POST 메서드로 받음
>> - id를 session에서 받아옴
>> - password와 idx를 설정되어 있는 경우 받아옴
>>
>><br>
>>
>>```html
>>if ($mode == "withdrawal" && empty($password)) { ?>
>>  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
>>    <h1 class="display-4">Auth Page</h1>
>>    <br><br>
>>    <hr>
>>  </div>
>>
>>  <div class="row">
>>    <div class="col-md">
>>      <form class="needs-validation" action="index.php?page=auth" method="POST" novalidate>
>>        <div class="mb-3">
>>          <label>Password</label>
>>          <input type="password" class="form-control" name="password" placeholder="Password" required>
>>          <div class="invalid-feedback">
>>            (필수) 패스워드를 입력하세요.
>>          </div>
>>        </div>
>>        <br><br>
>>        <hr class="mb-4">
>>        <div class="text-center">
>>          <input type="hidden" name="mode" value="withdrawal">
>>          <button type="submit" class="btn btn-info btn-sm btn-block">AUTH</button>
>>        </div>
>>      </form>
>>    </div>
>>  </div>
>><?php
>>}
>>```
>>
>> - mypage에서 Withdrawal 버튼을 누르고 password가 입력되지 않은 경우
>>
>><br>
>>
>>```php
>>else if ($mode == "withdrawal" && !empty($password)) {
>>    echo "<script>location.href='index.php?page=withdrawal';</script>";
>>```
>>
>> - auth 페이지에서 password를 입력한 경우
>>
>><br>
>>
>>```html
>>else if ($mode == "delete" && empty($password)) { ?>
>>  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
>>    <h1 class="display-4">Auth Page</h1>
>>    <br><br>
>>    <hr>
>>  </div>
>>
>>  <div class="row">
>>    <div class="col-md">
>>      <form class="needs-validation" action="index.php?page=auth" method="POST" novalidate>
>>        <div class="mb-3">
>>          <label>Password</label>
>>          <input type="password" class="form-control" name="password" placeholder="Password" required>
>>          <div class="invalid-feedback">
>>            (필수) 패스워드를 입력하세요.
>>          </div>
>>        </div>
>>        <br><br>
>>        <hr class="mb-4">
>>        <div class="text-center">
>>          <input type="hidden" name="mode" value="delete">
>>          <input type="hidden" name="idx" value="<?= $idx ?>">
>>          <button type="submit" class="btn btn-info btn-sm btn-block">AUTH</button>
>>        </div>
>>      </form>
>>    </div>
>>  </div>
>><?php
>>}
>>```
>>
>> - mode가 delete이고 password가 없는 경우
>>
>><br>
>>
>>```php
>>else if ($mode == "delete" && !empty($password)) {
>>    // 비밀번호 확인 후 삭제 처리
>>    $idx = $_POST["idx"];
>>    $password = $_POST["password"];
>>    $db_conn = mysql_conn();
>>
>>    // DB에서 해당 idx의 패스워드 확인
>>    $query = "SELECT password FROM {$tb_name} WHERE idx = {$idx}";
>>    
>>    $result=$db_conn->query($query);
>>    $row = $result->fetch_assoc();
>>    if ($row['password']==$password) {
>>      echo "<script>location.href='index.php?page=action&mode=delete&idx={$idx}';</script>";
>>    } else {
>>      echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
>>    }
>>}
>>```
>>
>> - auth 페이지에서 password를 입력한 경우
>>
>><br>
>>
>>```html
>>else if ($mode == "view" && empty($password)) { ?>
>>  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
>>    <h1 class="display-4">Auth Page</h1>
>>    <br><br>
>>    <hr>
>>  </div>
>>
>>  <div class="row">
>>    <div class="col-md">
>>      <form class="needs-validation" action="index.php?page=auth" method="POST" novalidate>
>>        <div class="mb-3">
>>          <label>Password</label>
>>          <input type="password" class="form-control" name="password" placeholder="Password" required>
>>          <div class="invalid-feedback">
>>            (필수) 패스워드를 입력하세요.
>>          </div>
>>        </div>
>>        <br><br>
>>        <hr class="mb-4">
>>        <div class="text-center">
>>          <input type="hidden" name="mode" value="view">
>>          <input type="hidden" name="idx" value="<?= $idx ?>">
>>          <button type="submit" class="btn btn-info btn-sm btn-block">AUTH</button>
>>        </div>
>>      </form>
>>    </div>
>>  </div>
>><?php
>>}
>>```
>>
>> - mode가 view이고 password가 없는 경우
>>
>><br>
>>
>>```php
>>else if ($mode == "view" && !empty($password)) {
>>    // 비밀번호 확인 후 삭제 처리
>>    $idx = $_POST["idx"];
>>    $password = $_POST["password"];
>>    $db_conn = mysql_conn();
>>
>>    // DB에서 해당 idx의 패스워드 확인
>>    $query = "SELECT password FROM {$tb_name} WHERE idx = {$idx}";
>>    
>>    $result=$db_conn->query($query);
>>    $row = $result->fetch_assoc();
>>    if ($row['password']==$password) {
>>      echo "<script>location.href='index.php?page=view&idx={$idx}';</script>";
>>    } else {
>>      echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
>>    }
>>}?>
>>```
>>
>> - auth 페이지에서 password를 입력한 경우
>>
>><br>
>><br>
>><br>
>><strong>withdrawal.php</strong><br>
>><hr>
>>
>>```php
>><?php
>>    include_once("./common.php");
>>    session_start(); // 세션 시작
>>
>>    $db_conn = mysql_conn();
>>
>>    $id = $_SESSION["id"];
>>
>>    // SQL 쿼리 준비 및 실행 (세션의 ID를 이용하여 회원 정보 확인)
>>    $stmt = $db_conn->prepare("SELECT idx FROM members WHERE id = ?");
>>    $stmt->bind_param("s", $id);
>>    $stmt->execute();
>>    $stmt->store_result(); // 쿼리 결과 저장
>>
>>    // 결과 확인 및 데이터 가져오기
>>    if ($stmt->num_rows > 0) {
>>        $stmt->bind_result($idx); // 결과를 변수에 바인딩
>>        $stmt->fetch(); // 결과 가져오기
>>
>>        // 회원 정보가 있을 경우 삭제 쿼리 실행
>>        $delete_stmt = $db_conn->prepare("DELETE FROM members WHERE id = ?");
>>        $delete_stmt->bind_param("s", $id);
>>        $delete_stmt->execute();
>>
>>        // 삭제된 행 수 확인
>>        if ($delete_stmt->affected_rows > 0) {
>>            echo "<script>alert('회원 탈퇴 완료');location.href='index.php?page=logout';</script>";
>>        } else {
>>            echo "<script>alert('오류 발생: 회원 탈퇴 실패');location.href=history.back(-1);</script>";
>>        }
>>
>>    } else {
>>        echo "<script>alert('사용자를 찾을 수 없습니다.');location.>>href=history.back(-1);</script>";
>>    }
>>
>>?>
>>
>>```
>>
>> - id에 session값을 받아옴
>> - 받아온 id 값을 통하여 해당 계정의 idx값을 가져옴
>> - prepared문을 통하여 해당 idx를 DB에서 삭제
>> - 삭제 결과를 통하여 결과를 알려줌
>>
>><br>
>><br>
>><br>
>><strong>withdrawal.php</strong><br>
>><hr>
>>
>>```php
>><?php
>>@include_once("./common.php");
>>
>>$db_conn = mysql_conn();
>>$page = $_SERVER['REQUEST_URI'];
>>
>>// Search Logic
>>$search_type = $_POST["search_type"];
>>$keyword = $_POST["keyword"];
>>
>>if (empty($search_type) && empty($keyword)) {
>>    $query = "SELECT * FROM {$tb_name}";
>>} else {
>>    if ($search_type == "all") {
>>        $query = "SELECT * FROM {$tb_name} WHERE title LIKE '%{$keyword}%' OR writer LIKE '%{$keyword}%' OR content LIKE '%{$keyword}%'";
>>    } else {
>>        $query = "SELECT * FROM {$tb_name} WHERE {$search_type} LIKE '%{$keyword}%'";
>>    }
>>}
>>
>>// Sort Logic
>>$sort = $_GET["sort"];
>>$sort_column = $_GET["sort_column"];
>>
>>if (empty($sort_column) || empty($sort)) {
>>    $query .= " ORDER BY idx DESC";
>>} else {
>>    $query .= " ORDER BY {$sort_column} {$sort}";
>>}
>>
>>$result = $db_conn->query($query);
>>$num = $result->num_rows;
>>?>
>>```
>>
>> - 이전에 작성한 내용들을 DB에서 불러옴
>>
>><br>
>><br>
>><br>
>><strong>index.php</strong><br>
>><hr>
>>
>>```php
>><?
>>    @session_start();
>>    include_once("./common.php");
>>    $page = $_GET["page"];
>>
>>    if(empty($page)){
>>        $page="main.php";
>>    }else if ($page=="login"){
>>        $page="login.php";
>>    }else if ($page=="join"){
>>        $page="join.php";
>>    }else if($page=="mypage"){
>>        $page="mypage.php";
>>    }else if($page=="logout"){
>>        $page="logout.php";
>>    }else if($page=="error"){
>>        $page="error.php";
>>    }else if($page=="withdrawal"){
>>        $page="withdrawal.php";
>>    }else if($page=="auth"){
>>        $page="auth.php";
>>    }else if($page=="write"){
>>        $page="write.php";
>>    }else if($page=="view"){
>>        $page="view.php";
>>    }else if($page=="modify"){
>>        $page="modify.php";
>>    }else if($page=="action"){
>>        $page="action.php";
>>    }else{
>>        echo "<script>location.href = 'index.php?page=error&value={$page}';</script>";
>>    }
>>
>>?>
>>```
>>
>> - 페이지를 지정해줌
>> - 존재하지 않는 페이지로 접근하려 할 경우 error페이지로 접근
>>
>><br>
>><br>
>><br>
>><strong>index.php</strong><br>
>><hr>
>>
>>```php
>><?
>>    include_once("./common.php");
>>    $value = $_GET["value"];
>>?>
>>
>><div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
>>    <h1 class="display-4">"<?=$value?>" Page Not Found</h1>
>>    <hr>
>></div>
>>```
>>
>> - 에러 핸들링
>>
>><br>
>><br>
>><br>
>><strong>download.php</strong><br>
>><hr>
>>
>>```php
>><?
>>    include_once("./common.php");
>>    header("Content-Type: text/html; charset=UTF-8");
>>
>>    $file = $_GET["file"];
>>    
>>    if(empty($file)) {
>>        echo "<script>alert('값이 입력되지 않았습니다.');history.back(-1);</script>";
>>        exit();
>>    }
>>
>>
>>    if(empty($file)) {
>>        echo "<script>alert('파일 다운로드에 실패하였습니다.');history.back(-1);</script>";
>>        exit();
>>    }
>>
>>    $filepath = "{$upload_path}/{$file}";
>>
>>    header("Content-Type: application/octet-stream");
>>    header("Content-Disposition: attachment; filename={$file}");
>>
>>    @readfile($filepath);
>>?>
>>```
>>
>> - file을 GET메서드로 받아 파일을 다운로드 하는 기능
>>
>><br>
>><br>
>><br>
>><h3 id="modified" style="font-weight:bold"> 4. 개선사항</h3>
>><br>
>>
>> - prepared문이 아닌 SQL문 prepared문으로 변형
>> - file 다운로드 시 접근 제한
>> - file 업로드 시 확장자 화이트리스트 기반 검증 수행
>> - file 업로드 시 cos.jar을 사용하기에 파일 핸들링 추가 필요
>> - 추가적인 기능 추가 필요
>> - 현재 contents 작성 시 text로 작성하는데 editor를 사용하는 방법 적용
>>
>><br>
>><br>
>><br>
>><h3 id="feel" style="font-weight:bold"> 5. 결론</h3>
>><br>
>>&nbsp;이전에 멘토님이 멘토링 시간에 게시판을 직접 만들어보는 것이 웹을 이해하는데 도움이 될 것이라는 말을 해주셔서 이번 PBL에 로그인 기능만 구현하는 것이 아닌 게시판까지 구현하는 것으로 방향을 잡았습니다.
>><br>
>><br>
>>&nbsp;직접 게시판을 구현하면서 DB에 연동하고 여러 값들을 처리하고 기능들을 구현하면서 어색했던 DB에도 어느정도 이해할 수 있게 된 기회였습니다.
>><br>
>><br>
>>&nbsp;또한 이전 PBL과제에서 알아본 prepared문을 통한 SQL 처리를 수행하는 것으로 직접 실습해볼 수 있었다고 생각합니다.
>><br>
>><br>
>>&nbsp;기능 구현 과정에서 많을 것을 배울 수 있었고 구현 후 추가적인 개선 사항들을 처리하려고 합니다.
>><br>
>><h3 id="Appendix" style="font-weight:bold"> 6. Appendix 1</h3>
>><br>
>><a href = ""></a>