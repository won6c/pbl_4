<?
    @session_start();
    include_once("./common.php");
    $page = $_GET["page"];

    if(empty($page)){
        $page="main.php";
    }else if ($page=="login"){
        $page="login.php";
    }else if ($page=="join"){
        $page="join.php";
    }else if($page=="mypage"){
        $page="mypage.php";
    }else if($page=="logout"){
        $page="logout.php";
    }else if($page=="error"){
        $page="error.php";
    }else if($page=="withdrawal"){
        $page="withdrawal.php";
    }else if($page=="auth"){
        $page="auth.php";
    }else if($page=="write"){
        $page="write.php";
    }else if($page=="view"){
        $page="view.php";
    }else if($page=="modify"){
        $page="modify.php";
    }else if($page=="action"){
        $page="action.php";
    }else{
        echo "<script>location.href = 'index.php?page=error&value={$page}';</script>";
    }

?>
<!doctype html>
<html lang="ko">
    <head>
        <title>
            PBL_4
        </title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">PBL_4</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
-->
                    </ul>
                    <?if (empty($_SESSION["id"])) {?>
                    <form class="d-flex" role="search">
                        <a class="btn btn-outline-dark me-2" href="index.php?page=login">Login</a>
                        <a class="btn btn-outline-dark" href="index.php?page=join">Join</a>
                    </form>
                    <?} else {?>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
						    <a class="btn btn-outline-dark" href="index.php?page=mypage&id=<?=$_SESSION["id"]?>">MyPage</a>
                            <a class="btn btn-outline-dark me-2" href="index.php?page=logout">LogOut</a>
                        </div>
                    <?}?>
                </div>
            </div>
        </nav>
		<div class="container">
            <? include $page; ?>
        </div>
    </body>
</html>