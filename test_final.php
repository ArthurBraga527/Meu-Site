<?php
// test_final.php
require_once 'model/DiscordWebhook.php';

$webhook = new DiscordWebhook("https://discord.com/api/webhooks/1435360972981403718/rJ5kpHcORhB7oGK_mZOdWjU8ECIWnwjK6-hEqSLYNWKG0L5P9G_TbhNZmjrmNtkFK4Sx");
$result = $webhook->sendPostToDiscord(
    "Teste Corrigido", 
    "Agora está funcionando sem a extensão GD!"
);
echo $result ? "Funcionou! Verifique o Discord." : "Erro";