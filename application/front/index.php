<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Título hipotético</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
        <section id="esquerda">
            <form action="index.php" method="post">
                <h2>CADASTRAR PESSOA</h2>
                <label for="nome">Nome<br></label>
                <input type="text" id="nome" name="nome" placeholder="Insira o seu nome"><br>

                <label for="telefone">Telefone<br></label>
                <input type="number" id="telefone" name="telefone" placeholder="Insira o telefone">

                <label for="email">Email<br></label>
                <input type="email" id="email" name="email" placeholder="Informe o email">
                <br><br>
                <button type="submit">Cadastrar</button>

            </form>

            <?php
                require_once "../control/crudDb.php";
                $data = $_POST;
                insertData('pessoas', $data);
            ?>
        </section>

        <section id="direita">
            <table>
                <tr id = "titulo1">
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td colspan="2">email</td>
                </tr>
                <?php
                    require_once "../control/crudDb.php";
                    $table = obterBanco('pessoas');
                    for ($i = 0; $i < count($table); $i++) {
                        echo "<tr>";
                        foreach ($table[$i] as $key => $value) {
                            echo "<td>".$value."</td>";
                        }
                        ?> <td><a href="teeste">editar</a>  <a href="testeeee">excluir</a></td> <?php
                        echo "</tr>";
                    }
                ?>
                </tr>
            </table>
        </section>
</body>
</html>