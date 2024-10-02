<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Título hipotético</title>
    <style>
       .forms1 {
           background-color: gray;
           height: 250px;
           width: 250px;
           text-align: center;
       }

    </style>
</head>
<body>
    <div class="forms1">
        <form action="crudDb.php" method="post">
            <label for="name"><br>Nome<br></label>
            <input type="text" id="name" name="name" placeholder="Insira o seu nome"><br>

            <label for="number"><br>Número de telefone<br></label>
            <input type="number" id="number" name="number" placeholder="Insira o telefone">

            <label for="email"><br><br>Email<br></label>
            <input type="email" id="email" name="email" placeholder="Informe o email">
            <br><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>


</body>
</html>


