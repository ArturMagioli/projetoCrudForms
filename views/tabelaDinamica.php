<?php include 'header.php'; ?>
<section id="direita">
    <table>
        <tr id="titulo1">
            <td>Nome</td>
            <td>Telefone</td>
            <td colspan="2">email</td>
        </tr>
        <?php
        $length = count($table);
        for ($i = 0; $i < $length; $i++) {
            echo "<tr>";
            foreach ($table[$i] as $key => $value) {
                if ($key != 'id') {
                    echo "<td>" . $value . "</td>";
                }
            }
            ?>
            <td>
                <a href="?operacao=deletarPessoa&id=<?php echo $table[$i]['id']?>">excluir</a>
            </td>
            <td>
                <a href="?operacao=atualizarCadastro&id=<?php echo $table[$i]['id']?>">alterar</td>
            </td>
            <?php
            echo "</tr>";
        }
        ?>
    </table>
</section>