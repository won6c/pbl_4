<?php
    @session_start();
    header("Content-Type: text/html; charset=UTF-8");
    include_once ('./common.php');

    $mode = $_REQUEST["mode"];
    $db_conn = mysql_conn();

    if ($mode == "write") {
        $title = $_POST["title"];
        $id = $_SESSION["id"];
        $writer = $_SESSION["name"];
        $password = $_POST["password"];
        $content = $_POST["content"];
        $secret = isset($_POST["secret"]) ? $_POST["secret"] : ""; 
        $uploadFile = "";


        if (empty($title) || empty($password) || empty($content)) {
            echo "<script>alert('빈 칸이 존재합니다.');history.back(-1);</script>";
            exit();
        }

   
        $secret = ($secret == "on") ? "y" : "n";


        $content = str_replace("\r\n", "<br>", $content);

   
        if (!empty($_FILES["userfile"]["name"])) {
            $uploadFile = $_FILES["userfile"]["name"];
            $uploadPath = "{$upload_path}/{$uploadFile}";

            if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath)) {
                echo "<script>alert('파일 업로드에 실패했습니다.');history.back(-1);</script>";
                exit();
            }
        } else {
            $uploadFile = ''; 
        }

   
        $query = "INSERT INTO {$tb_name} (title, content, id, writer, password, file, secret) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $db_conn->prepare($query);


        if (!$stmt) {
            die("Prepare failed: (" . $db_conn->errno . ") " . $db_conn->error);
        }


        $stmt->bind_param("sssssss", $title, $content, $id, $writer, $password, $uploadFile, $secret);

    
        if ($stmt->execute()) {
            echo "<script>alert('글 작성이 완료되었습니다.');location.href='index.php';</script>";
        } else {
    
            echo "<script>alert('SQL 오류 발생: " . $stmt->error . "');history.back(-1);</script>";
        }


    }else if($mode == "modify") {
		$idx = $_POST["idx"];
		$title = $_POST["title"];
		$password = $_POST["password"];
		$content = $_POST["content"];
		$secret = $_POST["secret"];
		$uploadFile = $_POST["oldfile"];

		if(empty($idx) || empty($title) || empty($password) || empty($content)) {
			echo "<script>alert('빈칸이 존재합니다.');history.back(-1);</script>";
			exit();
		}

	
		$query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
		$result = $db_conn->query($query);
		$num = $result->num_rows;

		if($num == 0) {
			echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
			exit();
		}

		$secret = ($secret == "on") ? "y" : "n";


        $content = str_replace("\r\n", "<br>", $content);

     
        if (!empty($_FILES["userfile"]["name"])) {
            $uploadFile = $_FILES["userfile"]["name"];
            $uploadPath = "{$upload_path}/{$uploadFile}";

            if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath)) {
                echo "<script>alert('파일 업로드에 실패했습니다.');history.back(-1);</script>";
                exit();
            }
        } else {
            $uploadFile = ''; 
        }

      
        $query = "UPDATE {$tb_name} SET title = ?, content = ?, file = ?, secret = ? WHERE idx = ?";

        $stmt = $db_conn->prepare($query);


        if (!$stmt) {
            die("Prepare failed: (" . $db_conn->errno . ") " . $db_conn->error);
        }

 
        $stmt->bind_param("ssssi", $title, $content, $uploadFile, $secret, $idx);

    
        if ($stmt->execute()) {
            echo "<script>alert('글 작성이 완료되었습니다.');location.href='index.php';</script>";
        } else {
       
            echo "<script>alert('SQL 오류 발생: " . $stmt->error . "');history.back(-1);</script>";
        }
	} else if ($mode == "delete") {
        $idx = $_GET["idx"];
    
      
        $query = "DELETE FROM {$tb_name} WHERE idx = ?";
        $stmt = $db_conn->prepare($query);
        $stmt->bind_param("i", $idx);
    
        if ($stmt->execute()) {
            echo "<script>alert('게시물이 삭제되었습니다.');location.href='index.php';</script>";
        } else {
            echo "<script>alert('삭제 중 오류가 발생했습니다.');history.back(-1);</script>";
        }
    }
    ?>

