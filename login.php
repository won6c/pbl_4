<?
    $db_conn = mysql_conn();

    if(!empty($_SESSION["id"])){
      echo "<script>location.href='index.php';</script>";
      exit();
    }
    
    $id = $_POST["id"]; # $_REQEUST["id"];
    $password = $_POST["password"];# $_REQEUST["password"];

    if(!empty($id) && !empty($password)){
        if(preg_match("/['\"]/",$id)){
            echo "<script>history.back(-1);</script>";
            exit();
        }
        if(preg_match("/['\"]/",$password)){
            echo "<script>history.back(-1);</script>";
            exit();
        }

        $password = md5($password);
        $query = "select * from members where id='{$id}' and password='{$password}'";
        $result = $db_conn->query($query);
        $num = $result->num_rows;

        if($num!=0){
            $row = $result->fetch_assoc();
            session_start();
            session_regenerate_id(true);
            $_SESSION["id"]=$row["id"];
            $_SESSION["name"]=$row["name"];
            echo "<script>location.href='index.php'</script>";
        } else{
            echo "<script>alert('아이디 혹은 패스워드가 틀렸습니다.');history.back(-1);</script>";
            exit();
        }
    }

?>

<!doctype html>
<html>
    <head>

    </head>
    <body>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	    	<h1 class="display-4">Login Page</h1>
        	<hr>
        </div>

          <div class="row">
            <div class="col-md">
              <form class="needs-validation" action="index.php?page=login" method="POST" novalidate>
                <div class="mb-3">
                  <label for="username">ID</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="id" id="username" placeholder="Username" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <div class="invalid-feedback">
                    (필수) 패스워드를 입력하세요.
                  </div>
                </div>
                <hr class="mb-4">
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-sm btn-block">LOGIN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </body>
</html>
