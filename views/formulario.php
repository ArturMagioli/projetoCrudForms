<section id="esquerda">
    <form id="alterar" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <h2><?php echo isset($data['operacao']) && $data['operacao'] == 'a' ? 'ATUALIZAR' : 'CADASTRAR' ?> PESSOA</h2>
        <label for="nome"> Nome<br></label>
        <input type="text" id="nome" name="nome"
               value="<?php echo isset($pessoa) ? htmlspecialchars($pessoa['nome']) : ''; ?>" required><br>
        <label for="telefone"> Telefone<br></label>
        <input type="number" id="telefone" name="telefone"
               value="<?php echo isset($pessoa) ? htmlspecialchars($pessoa['telefone']) : ''; ?>" required>
        <br>
        <label for="email"> Email<br></label>
        <input type="email" id="email" name="email"
               value="<?php echo isset($pessoa) ? htmlspecialchars($pessoa['email']) : ''; ?>" required>
        <input type="hidden" name="operacao"
               value="<?php echo isset($data['operacao']) && $data['operacao'] == 'a' ? 'a2' : 'c' ?>">
        <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : '' ?>">
        <br><br>
        <button type='submit'
                id="cadastro"><?php echo isset($data['operacao']) && $data['operacao'] == 'a' ? 'Atualizar' : 'Cadastrar' ?></button>
    </form>
</section>