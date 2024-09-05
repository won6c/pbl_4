<?
    header("Content-Type: text/html; charset=UTF-8;");

    $tb_name = "<your db table name>";
    $upload_path = "<your upload path>";
    
    function mysql_conn(){
        $host = "127.0.0.1";
        $id = "<your mysql user>";
        $pw = "<your mysql password>";
        $db = "<your db name>";

        $db_conn = new mysqli($host,$id,$pw,$db);

        return $db_conn;
    }
?>
