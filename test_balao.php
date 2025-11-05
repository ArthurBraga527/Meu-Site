<?php
// test_balao.php - Crie na pasta raiz do projeto
require_once 'model/DiscordWebhook.php';

$webhook = new DiscordWebhook("https://discord.com/api/webhooks/1435360972981403718/rJ5kpHcORhB7oGK_mZOdWjU8ECIWnwjK6-hEqSLYNWKG0L5P9G_TbhNZmjrmNtkFK4Sx");

echo " Enviando mensagem com balão...<br><br>";

$result = $webhook->sendPostToDiscord(
    "Músicas Slowed da Semana", 
    "Confira as melhores músicas slowed que postamos esta semana! \n\n• Música 1\n• Música 2\n• Música 3"
);
if ($result) {
    echo "<strong>Mensagem com balão enviada!</strong><br>";
    echo "Verifique o Discord - deve aparecer com um balão!";
} else {
    echo " <strong>Erro ao enviar mensagem.</strong>";
}