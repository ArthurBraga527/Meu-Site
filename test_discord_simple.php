<?php
// test_simple.php
class DiscordTest {
    private $webhookUrl = "https://discord.com/api/webhooks/1435360972981403718/rJ5kpHcORhB7oGK_mZOdWjU8ECIWnwjK6-hEqSLYNWKG0L5P9G_TbhNZmjrmNtkFK4Sx";
    
    public function test() {
        $message = [
            'username' => 'Slowed Blog',
            'content' => "**Teste Simples**\n\nEsta é uma mensagem de teste normal do Discord."
        ];
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->webhookUrl,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($message),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_RETURNTRANSFER => true
        ]);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result !== false;
    }
}

$test = new DiscordTest();
if ($test->test()) {
    echo "Mensagem enviada!";
} else {
    echo "Falha ao enviar";
}