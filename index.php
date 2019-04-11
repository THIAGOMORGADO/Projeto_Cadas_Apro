<?PHP
if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    require 'cong.php';

    $pdo->query("INSERT INTO usuarios SET nome = '$nome', email = '$email'");
    $id = $pdo->lastInsertId();
    $md5 = md5($id);
    $link = "http://www.meusite.com.br/cadastroconfirma/confirma.php?h=".$md5;

    $assunto =  "confirme seu Cadastro";
    $msg = "Clique no link abaixo para confirmar seu cadastro:\n\n".Link;
    $headers = "Form: meusite.com.br"."\r\n"."Z-Mailer: php".phpversion();

    mail($email, $assunto, $msg, $headers);
    echo "<h2>ok! Confirme seu cadastro agora</h2>";
    exit;
}
?>
<form method="POST">
    Nome:<br>
    <input type="text" name="nome" placeholder="digite o nome:?"><br><br>
    E-mail:<br>
    <input type="email" name="email" placeholder="digite o email:?"><br><br>
    
    <input type="submit" value="Cadastra"><br><br>
</form>