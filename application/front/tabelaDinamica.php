<?php
    $table = [];
    $table = obterBanco('pessoas')
?>
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
                    <input type="hidden" name="id" value="<?php echo $table[$i]['id'] ?>">
                    <input type="submit" value="alterar">
                </form>
            </td>
            <?php
            echo "</tr>";
        }
        ?>
    </table>
</section>