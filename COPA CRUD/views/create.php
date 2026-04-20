<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - COPA DO MUNDO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">COPA DO MUNDO 2026</div>
        <div class="menu">
            <a href="index.php">INÍCIO</a>
            <a href="index.php?action=criar" class="active">CADASTRO</a>
            <a href="index.php">TIMES</a>
        </div>
    </nav>

    <main class="container">
        <h2 class="section-title" style="text-align: center; border: none;">Cadastro de Nova Equipe</h2>
        
        <form action="index.php?action=salvar" method="POST">
            <label>Nome do Pais (Ex: Brasil, Japao):</label>
            <input type="text" name="nome" placeholder="Digite o nome do time..." required>
            
            <label>Grupo / Chave (A-Z):</label>
            <input type="text" name="grupo" maxlength="1" placeholder="A" required>
            
            <label>Títulos Mundiais:</label>
            <input type="number" name="titulos" value="0">
            
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <button type="submit" class="btn" style="flex: 1;">Salvar Equipe</button>
                <a href="index.php" class="btn btn-secondary" style="text-align: center; flex: 1;">Cancelar</a>
            </div>
        </form>
    </main>

</body>
</html>