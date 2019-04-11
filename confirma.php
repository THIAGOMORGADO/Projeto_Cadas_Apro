<?php
require 'cong.php';
$h = $_GET['h'];
if(!empty($h)){
    $pdo->query("UPDATE usuarios SET status = '1' WHERE md5(ID) = '$h'");
    echo"<h2>Cadastro comfirmado com sucesso</h2>";
}
?>