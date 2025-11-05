<?php
// view/form.php
$editing = isset($post) && !empty($post);
$action = $editing ? 'index.php?action=edit&id=' . $post['id'] : 'index.php?action=create';
$titulo = $editing ? $post['titulo'] : '';
$conteudo = $editing ? $post['conteudo'] : '';
?>
<h2><?php echo $editing ? 'Editar Post' : 'Criar Novo Post'; ?></h2>

<form method="post" action="<?php echo $action; ?>">
    <div style="margin-bottom: 20px;">
        <label for="titulo">Título</label>
        <input id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" placeholder="Digite o título do post..." required />
    </div>
    <div style="margin-bottom: 25px;">
        <label for="conteudo">Conteúdo</label>
        <textarea id="conteudo" name="conteudo" placeholder="Escreva o conteúdo do post..." required><?php echo htmlspecialchars($conteudo); ?></textarea>
    </div>
    <div style="display: flex; gap: 15px; align-items: center;">
        <button type="submit"><?php echo $editing ? 'Salvar Alterações' : 'Publicar Post'; ?></button>
        <a href="index.php" style="background: #2c2f33; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; border: 1px solid #40444b; transition: all 0.3s ease;">
            Cancelar
        </a>
    </div>
</form>