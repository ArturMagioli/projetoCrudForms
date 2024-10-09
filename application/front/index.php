<?php
//Lida com o CRUD:
require_once "../control/crudDb.php";
$data = $_POST;
$nome = $data['nome'] ?? null;
$telefone = $data['telefone'] ?? null;
$email = $data['email'] ?? null;

// tabela dinâmica:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($data['operacao'] === 'c' && $nome && $telefone && $email) {
        insertData('pessoas', $data);
    } else if ($data['operacao'] === 'd') {
        deleteData('pessoas', $data['id']);
    } else if ($data['operacao'] == 'a') {
        print_r($data);
        ?>
        <section id="esquerda">
            <form id="alterar" action="index.php" method="post">
                <h2>CADASTRAR PESSOA</h2>
                <label for="nome">Nome<br></label>
                <input type="text" id="nome" name="nome" required><br>
                <label for="telefone">Telefone<br></label>
                <input type="number" id="telefone" name="telefone" required>
                <br>
                <label for="email">Email<br></label>
                <input type="email" id="email" name="email"  required>
                <input type="hidden" name="operacao" value="c">
                <br><br>
                <button type="submit">Cadastrar</button>
            </form>
        </section>
        //editData('pessoas', $data['id'], );
        <?php
    }
}
$table = [];
$table = obterBanco('pessoas');
?>

<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Título hipotético</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
//if ()
//?>

<section id="direita">
    <table>
        <tr id="titulo1">
            <td>Nome</td>
            <td>Telefone</td>
            <td colspan="2">email</td>
        </tr>
        <?php
        $lenght = count($table);
        for ($i = 0; $i < $lenght; $i++) {
            echo "<tr>";
            foreach ($table[$i] as $key => $value) {
                if ($key != 'id') {
                    echo "<td>" . $value . "</td>";
                }
            }
            ?>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="operacao" value="d">
                    <input type="hidden" name="id" value="<?php echo $table[$i]['id'] ?>">
                    <input type="submit" value="excluir">
                </form>
            </td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="operacao" value="a">
                    <input type="hidden" name="id" value="<?php echo $table[$i]['id']?>">
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