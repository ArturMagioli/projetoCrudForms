<?php
$table = [];
$table = obterBanco('pessoas')
?>
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
                <form action="../index.php" method="post">
                    <input type="hidden" name="operacao" value="d">
                    <input type="hidden" name="id" value="<?php echo $table[$i]['id']?>">
                    <input type="submit" value="excluir">
                </form>
            </td>
            <?php //TODO: ALTERAR A TRANSFERÊNCIA DE DADOS DO ID. COLOCAR POR GET AO INVÉS DE POST:?>
            <!--           <td>-->
            <!--               <form action="index.php" method="post">-->
            <!--                  <input type="hidden" name="operacao" value="a">-->
            <!--                    <input type="hidden" name="id" value="--><?php //////echo $table[$i]['id'] ?><!--">-->
            <!--            <a href="?x=alteraPessoa&id=--><?php ////echo $table[$i]['id'] ?><!--">alterar</a>-->
            <!--                   <input type="submit" value="alterar">-->
            <!--                </form>-->
            <!--           </td>-->
            <!--            -->
            <td>
                <form action="../index.php" method="post">
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