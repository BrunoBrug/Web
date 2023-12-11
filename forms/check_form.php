<?php
function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}

function valida_data($data) {
  $dateTime = DateTime::createFromFormat('Y-m-d', $data);
  if ($dateTime && $dateTime->format('Y-m-d') === $data) {
      return true; // Data válida
  } else {
      return false; // Data inválida
  }
}

$nome = $email = $data = $senha = $cSenha = "";
$erro = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //-----------nome--------------------
  if(empty($_POST["nome"])){
    $erro_nome = "Nome é obrigatório.";
    $erro = true;
  }
  else{
    $nome = verifica_campo($_POST["nome"]);
    
  }

  //--------------email-------------------
  if(empty($_POST["email"])){
    $erro_email = "Email é obrigatório.";
    $erro = true;
  }
  else{
    $email = verifica_campo($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erro = true;
      $erro_email = "Formato de Email inválido.";
    }
  }

  //----------------data------------------
  if(empty($_POST["data"])){
    $erro_data = "Data é obrigatória.";
    $erro = true;
  }
  else{
    if(valida_data($data)){
      $erro_data = "data inválida";
    } else {
      $data = $_POST["data"];
    }
  }

  //--------------senha--------------------
  if (empty($_POST["senha"])) {
    $erro_senha = "A senha é obrigatória.";
    $erro = true;
  }else{
    $senha = verifica_campo($_POST["senha"]);
    if($senha != $cSenha){
      $erro_senha = "As senhas devem ser iguais.";
    }
  }

}





?>
