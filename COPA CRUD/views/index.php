<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>COPA DO MUNDO - Gerenciamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">COPA DO MUNDO 2026</div>
        <div class="menu">
            <a href="index.php">INÍCIO</a>
            <a href="#">DESTAQUES</a>
            <a href="#">CALENDÁRIO</a>
            <a href="index.php?action=criar" class="active">CADASTRO</a>
            <a href="#">GRUPOS</a>
            <a href="#">INGRESSOS</a>
        </div>
    </nav>

    <header class="hero">
        <h1>O MAIOR CAMPEONATO DO MUNDO</h1>
        <p>Sinta a batida do mundo em cada gol da Copa 2026. A jornada rumo ao topo do futebol internacional, completa para você.</p>
    </header>

    <main class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 class="section-title">Gerenciamento de Times</h2>
            <a href="index.php?action=criar" class="btn">+ Novo Cadastro</a>
        </div>

        <?php
        $porGrupo = [];
        foreach ($selecoes as $row) {
            $porGrupo[$row['grupo']][] = $row;
        }
        ksort($porGrupo);

        $grupos = array_keys($porGrupo);
        $chunks = array_chunk($grupos, 3);
        ?>

        <?php foreach ($chunks as $linhaGrupos): ?>
        <div class="grupos-grid">
            <?php foreach ($linhaGrupos as $grupo): ?>
            <div class="grupo-bloco">
                <h3 class="grupo-titulo">Grupo <?= htmlspecialchars($grupo) ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Seleção</th>
                            <th>Títulos</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($porGrupo[$grupo] as $row): ?>
                        <tr>
                            <td>#<?= htmlspecialchars($row['id']) ?></td>
                            <td style="font-weight: bold;"><?= htmlspecialchars($row['nome']) ?></td>
                            <td><?= htmlspecialchars($row['titulos']) ?> 🏆</td>
                            <td>
                                <a href="index.php?action=editar&id=<?= $row['id'] ?>" class="action-link">Editar</a>
                                <a href="index.php?action=excluir&id=<?= $row['id'] ?>" class="action-link delete" onclick="return confirm('Excluir este clube permanentemente?');">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>

    </main>

</body>
</html>