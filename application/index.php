<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Título hipotético</title>
    <style>
       .forms1 {
           text-align: center;
           position: absolute;
           background-color: lightgray;
           height: 250px;
           width: 300px;
           border-radius: 12px;
           margin-left: 100px;
           margin-top: 50px;
       }

       input {
           text-align: center;
           position: relative;
       }
    </style>
</head>
<body>
    <h2>Formulário teste</h2>
    <div class="forms1">
        <form action="UI.php" method="post">
            <label for="name"><br>Nome<br></label>
            <input type="text" id="name" name="name" placeholder="Insira o seu nome"><br>

            <label for="telefone"><br>Número de telefone<br></label>
            <input type="number" id="telefone" name="telefone" placeholder="Insira o telefone">

            <label for="email"><br><br>Email<br></label>
            <input type="email" id="email" name="email" placeholder="Informe o email">
            <br><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>
</html>


