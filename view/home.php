<?php
// view/home.php
?>
<h2>Posts Recentes</h2>

<?php if (empty($posts)): ?>
    <div style="text-align: center; padding: 50px; background: #2c2f33; border-radius: 12px; margin: 30px 0; border: 2px dashed #5865F2;">
        <p style="font-size: 1.2em; margin-bottom: 25px; color: #888;">Nenhum post encontrado...</p>
        <a href="index.php?action=create" style="background: #5865F2; color: white; padding: 15px 30px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1.1em; transition: all 0.3s ease;">
        Criar o Primeiro Post
        </a>
    </div>
<?php else: ?>
    <?php foreach ($posts as $p): ?>
        <div class="post">
            <h3><?php echo htmlspecialchars($p['titulo']); ?></h3>
            <div class="post-meta">Publicado em: <?php echo htmlspecialchars($p['data_publicacao']); ?></div>
            <p style="margin: 15px 0; line-height: 1.7; color: #ddd;"><?php echo nl2br(htmlspecialchars(mb_strimwidth($p['conteudo'], 0, 350, '...'))); ?></p>
            <div class="actions">
                <a href="index.php?action=view&id=<?php echo $p['id']; ?>">Ver Completo</a>
                <a href="index.php?action=edit&id=<?php echo $p['id']; ?>">Editar</a>
                <a href="index.php?action=delete&id=<?php echo $p['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este post?')">Excluir</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>