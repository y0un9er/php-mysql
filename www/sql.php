<?php
$host = 'mysql';
$username = 'root';
$password = '123456';
$database = 'user';

header("Content-type: text/html; charset=utf-8");
//$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn)
    die('数据库连接失败，请与管理员联系：'.iconv('gbk','utf-8',mysqli_connect_error()));

$id = $_GET['id'];

if (!$id)
    echo '<meta http-equiv="refresh" content="0;url=sql.php?id=1"';

$sql = "select * from users where id = '$id' limit 0,1";

if (!strstr($_SERVER['HTTP_USER_AGENT'], 'sqlmap')) {

    //$row = $conn->query($sql);
    //$result = $row->fetchAll(PDO::FETCH_ASSOC)[0];
    $row = $conn->query($sql);
    $result = $row->fetch_array() or die(mysqli_error($conn));

    echo '<p style="font-size:100px; text-align:center">';
    echo $result['username'];
    echo '</p>';
}


