<?php
// view/post_view.php
?>
<article>
    <h2><?php echo htmlspecialchars($post['titulo']); ?></h2>
    <div class="post-meta">Publicado em: <?php echo htmlspecialchars($post['data_publicacao']); ?></div>
    <div class="post-content"><?php echo nl2br(htmlspecialchars($post['conteudo'])); ?></div>
    <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #40444b; display: flex; gap: 12px;">
        <a href="index.php?action=edit&id=<?php echo $post['id']; ?>" style="background: #5865F2; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">Editar Post</a>
        <a href="index.php?action=delete&id=<?php echo $post['id']; ?>" style="background: #ed4245; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;" onclick="return confirm('Tem certeza que deseja excluir este post?')">Excluir</a>
        <a href="index.php" style="background: #2c2f33; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; border: 1px solid #40444b;">← Voltar para Posts</a>
    </div>
</article>