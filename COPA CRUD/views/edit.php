<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Equipe - COPA DO MUNDOo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">COPA DO MUNDO 2026</div>
        <div class="menu">
            <a href="index.php">INÍCIO</a>
            <a href="index.php?action=criar">CADASTRO</a>
            <a href="index.php" class="active">TIMES</a>
        </div>
    </nav>

    <main class="container">
        <h2 class="section-title" style="text-align: center; border: none;">Editar Cadastro da Equipe</h2>
        
        <form action="index.php?action=atualizar" method="POST">
            <input type="hidden" name="id" value="<?= $this->selecao->id ?>">
            
            <label>Nome do Clube:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($this->selecao->nome) ?>" required>
            
            <label>Grupo / Chave (A-Z):</label>
            <input type="text" name="grupo" maxlength="1" value="<?= htmlspecialchars($this->selecao->grupo) ?>" required>
            
            <label>Títulos Mundiais:</label>
            <input type="number" name="titulos" value="<?= htmlspecialchars($this->selecao->titulos) ?>">
            
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <button type="submit" class="btn" style="flex: 1;">Atualizar Equipe</button>
                <a href="index.php" class="btn btn-secondary" style="text-align: center; flex: 1; padding-top: 12px;">Cancelar</a>
            </div>
        </form>
    </main>

</body>
</html>