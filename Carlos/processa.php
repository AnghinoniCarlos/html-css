<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$profissao = filter_input(INPUT_POST, 'profissao', FILTER_SANITIZE_STRING);
//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";
//echo "Profissao: $profissao <br>";

$result_usuario = "INSERT INTO usuarios (nome, email, profissao, created) VALUES ('$nome', '$email', '$profissao', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

$linhas = mysqli_affected_rows($conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Cadastro</title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
        <div class="container">
            <nav>
                <ul class="menu">
                    <a href="index.php"><li>Cadastro</li></a>
                    <a href="consultas.php"><li>Consultas</li></a>
                </ul>
            </nav>
            <section>
                <h1>Confirmação de Cadastro</h1>
                <hr><br><br>      

<?php
		if($linhas == 1){
			print"cadastro efetuado com sucesso!";
		}else{
			print"Cadastro NÃO efetuado.<br> Já existe um usuário com esse cadastro!";
		}
?>
	
            </section>
        </div>
    
    </body>

</html>
