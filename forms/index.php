<?php
  require("check_form.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Teste PHP</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="check_form.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Teste Formulário PHP</h1>

     <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (!$erro): ?>
          <div class="alert alert-success">
            Dados recebidos com sucesso:
            <ul>
              <li><strong>Nome</strong>: <?php echo $nome ?>;</li>
              <li><strong>Email</strong>: <?php echo $email ?>;</li>
              <li><strong>Data</strong>: <?php echo $data ?>;</li>
              <?php // limpa o formulário.
                $nome = $email = $data = "";
              ?>
            </ul>
          </div>
        <?php else: ?>
          <div class="alert alert-danger">
            Erros no formulário.
          </div>
        <?php endif; ?>
     <?php endif; ?>


      <form enctype="multipart/form-data" id="form-test" class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-group <?php if(!empty($erro_nome)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input required type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
            <div id="erro-nome">
            </div>
            <?php if (!empty($erro_nome)): ?>
              <span class="help-block"><?php echo $erro_nome ?></span>
            <?php endIf; ?>
          </div>

           
          <div class="form-group <?php if(!empty($erro_email)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input required type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
            <div id="erro-email">
            </div>
            <?php if (!empty($erro_email)): ?>
              <span class="help-block"><?php echo $erro_email ?></span>
            <?php endIf; ?>
          </div>


          <div class="form-group <?php if(!empty($erro_data)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Data</label>
          <div class="col-sm-10">
            <input required type="date" class="form-control" name="data" placeholder="Data" value="<?php echo $data; ?>">
            <div id="erro-data">
            </div>
            <?php if (!empty($erro_data)): ?>
              <span class="help-block"><?php echo $erro_data ?></span>
            <?php endIf; ?>
          </div>

          <div class="form-group <?php if(!empty($erro_email)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="senha" placeholder="Senha" value="<?php echo $senha; ?>">
            <div id="erro-senha">
            </div>
            <?php if(!empty($erro_senha)): ?>
              <span class="help-block"><?php echo $erro_senha ?></span>
            <?php endIf; ?>
          </div>

        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

