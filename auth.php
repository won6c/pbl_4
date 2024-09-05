<?php
include_once("./common.php");

$mode = $_REQUEST["mode"];

$id = $_SESSION["id"];
$password = isset($_POST["password"]) ? $_POST["password"] : '';
$idx = isset($_GET["idx"]) ? $_GET["idx"] : '';

if ($mode == "withdrawal" && empty($password)) { ?>
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Auth Page</h1>
    <br><br>
    <hr>
  </div>

  <div class="row">
    <div class="col-md">
      <form class="needs-validation" action="index.php?page=auth" method="POST" novalidate>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="invalid-feedback">
            (필수) 패스워드를 입력하세요.
          </div>
        </div>
        <br><br>
        <hr class="mb-4">
        <div class="text-center">
          <input type="hidden" name="mode" value="withdrawal">
          <button type="submit" class="btn btn-info btn-sm btn-block">AUTH</button>
        </div>
      </form>
    </div>
  </div>
<?php
} else if ($mode == "withdrawal" && !empty($password)) {
    echo "<script>location.href='index.php?page=withdrawal';</script>";
} else if ($mode == "delete" && empty($password)) { ?>
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Auth Page</h1>
    <br><br>
    <hr>
  </div>

  <div class="row">
    <div class="col-md">
      <form class="needs-validation" action="index.php?page=auth" method="POST" novalidate>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="invalid-feedback">
            (필수) 패스워드를 입력하세요.
          </div>
        </div>
        <br><br>
        <hr class="mb-4">
        <div class="text-center">
          <input type="hidden" name="mode" value="delete">
          <input type="hidden" name="idx" value="<?= $idx ?>">
          <button type="submit" class="btn btn-info btn-sm btn-block">AUTH</button>
        </div>
      </form>
    </div>
  </div>
<?php
} else if ($mode == "delete" && !empty($password)) {
    // 비밀번호 확인 후 삭제 처리
    $idx = $_POST["idx"];
    $password = $_POST["password"];
    $db_conn = mysql_conn();

    // DB에서 해당 idx의 패스워드 확인
    $query = "SELECT password FROM {$tb_name} WHERE idx = {$idx}";
    
    $result=$db_conn->query($query);
    $row = $result->fetch_assoc();
    if ($row['password']==$password) {
      echo "<script>location.href='index.php?page=action&mode=delete&idx={$idx}';</script>";
    } else {
      echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
    }
}else if ($mode == "view" && empty($password)) { ?>
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Auth Page</h1>
    <br><br>
    <hr>
  </div>

  <div class="row">
    <div class="col-md">
      <form class="needs-validation" action="index.php?page=auth" method="POST" novalidate>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="invalid-feedback">
            (필수) 패스워드를 입력하세요.
          </div>
        </div>
        <br><br>
        <hr class="mb-4">
        <div class="text-center">
          <input type="hidden" name="mode" value="view">
          <input type="hidden" name="idx" value="<?= $idx ?>">
          <button type="submit" class="btn btn-info btn-sm btn-block">AUTH</button>
        </div>
      </form>
    </div>
  </div>
<?php
} else if ($mode == "view" && !empty($password)) {
    // 비밀번호 확인 후 삭제 처리
    $idx = $_POST["idx"];
    $password = $_POST["password"];
    $db_conn = mysql_conn();

    // DB에서 해당 idx의 패스워드 확인
    $query = "SELECT password FROM {$tb_name} WHERE idx = {$idx}";
    
    $result=$db_conn->query($query);
    $row = $result->fetch_assoc();
    if ($row['password']==$password) {
      echo "<script>location.href='index.php?page=view&idx={$idx}';</script>";
    } else {
      echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
    }
}?>
