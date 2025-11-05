<?php
// test_discord.php - Use este arquivo para testar o webhook
require_once 'model/DiscordWebhook.php';

$webhookUrl = "https://discord.com/api/webhooks/1435360972981403718/rJ5kpHcORhB7oGK_mZOdWjU8ECIWnwjK6-hEqSLYNWKG0L5P9G_TbhNZmjrmNtkFK4Sx";
$discord = new DiscordWebhook($webhookUrl);

$teste = $discord->sendPostToDiscord(
    "Teste do Webhook", 
    "Este é um teste do sistema de webhook do Slowed Blog!\n\nSe você está vendo esta mensagem, o webhook está funcionando perfeitamente! ✅"
);

if ($teste) {
    echo "Webhook enviado com sucesso! Verifique o Discord.";
} else {
    echo "Falha ao enviar webhook. Verifique a URL.";
}