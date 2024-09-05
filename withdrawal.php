<?php
    include_once("./common.php");
    session_start(); // 세션 시작

    $db_conn = mysql_conn();

    $id = $_SESSION["id"];

    // SQL 쿼리 준비 및 실행 (세션의 ID를 이용하여 회원 정보 확인)
    $stmt = $db_conn->prepare("SELECT idx FROM members WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->store_result(); // 쿼리 결과 저장

    // 결과 확인 및 데이터 가져오기
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($idx); // 결과를 변수에 바인딩
        $stmt->fetch(); // 결과 가져오기

        // 회원 정보가 있을 경우 삭제 쿼리 실행
        $delete_stmt = $db_conn->prepare("DELETE FROM members WHERE id = ?");
        $delete_stmt->bind_param("s", $id);
        $delete_stmt->execute();

        // 삭제된 행 수 확인
        if ($delete_stmt->affected_rows > 0) {
            echo "<script>alert('회원 탈퇴 완료');location.href='index.php?page=logout';</script>";
        } else {
            echo "<script>alert('오류 발생: 회원 탈퇴 실패');location.href=history.back(-1);</script>";
        }

    } else {
        echo "<script>alert('사용자를 찾을 수 없습니다.');location.href=history.back(-1);</script>";
    }

?>
