<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Título hipotético</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
        <section id="esquerda">
            <form id="alterar" action="index.php" method="post">
                <h2>CADASTRAR PESSOA</h2>
                <label for="nome">Nome<br></label>
                <input type="text" id="nome" name="nome" placeholder="Insira o seu nome"><br>

                <label for="telefone">Telefone<br></label>
                <input type="number" id="telefone" name="telefone" placeholder="Insira o telefone">

                <label for="email">Email<br></label>
                <input type="email" id="email" name="email" placeholder="Informe o email">
                <input type="hidden" name="operacao" value="c">
                <br><br>
                <button type="submit">Cadastrar</button>

            </form>

            <?php
                require_once "../control/crudDb.php";
                $data = $_POST;
            var_dump($data);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($data)) {
                if ($data['operacao'] === 'c') {
                    insertData('pessoas', $data);
                }
                else if ($data['operacao'] === 'd') {
                    deleteData('pessoas', $data['email']);
                }
                else if ($data['operacao'] == 'a') {
                    echo 'Em andamento';
                }
            }
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
                    $table = [];
                    $table = obterBanco('pessoas');
                    $lenght = count($table);
                    for ($i = 0; $i < $lenght; $i++) {
                        echo "<tr>";
                        foreach ($table[$i] as $key => $value) {
                            echo "<td>".$value."</td>";
                        }
                        ?>
                        <td>
                            <form action="index.php" method="post">
                                <input type="hidden" name="operacao" value="d">
                                <input type="hidden" name="email" value="<?php echo $table[$i]['email']?>">
                                <input type="submit" value="excluir">
                            </form>
                        </td>
                        <td>
                            <form action="index.php" method="post">
                                <input type="hidden" name="operacao" value="a">
                                <input type="hidden" name="email" value="<?php echo $table[$i]['email']?>">
                                <input type="submit" value="alterar">
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                ?>
            </table>
        </section>
</body>
</html>