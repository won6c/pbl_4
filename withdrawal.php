<?php
    include_once("./common.php");
    session_start();

    $db_conn = mysql_conn();

    $id = $_SESSION["id"];

  
    $stmt = $db_conn->prepare("SELECT idx FROM members WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->store_result(); 


    if ($stmt->num_rows > 0) {
        $stmt->bind_result($idx); 
        $stmt->fetch(); 

      
        $delete_stmt = $db_conn->prepare("DELETE FROM members WHERE id = ?");
        $delete_stmt->bind_param("s", $id);
        $delete_stmt->execute();

      
        if ($delete_stmt->affected_rows > 0) {
            echo "<script>alert('회원 탈퇴 완료');location.href='index.php?page=logout';</script>";
        } else {
            echo "<script>alert('오류 발생: 회원 탈퇴 실패');location.href=history.back(-1);</script>";
        }

    } else {
        echo "<script>alert('사용자를 찾을 수 없습니다.');location.href=history.back(-1);</script>";
    }

?>
