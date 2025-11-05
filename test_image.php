<?php
// test_image.php
$webhookUrl = "https://discord.com/api/webhooks/1435360972981403718/rJ5kpHcORhB7oGK_mZOdWjU8ECIWnwjK6-hEqSLYNWKG0L5P9G_TbhNZmjrmNtkFK4Sx";

// Imagem de música/slowed (URL pública)
$imageUrl = "https://images.unsplash.com/photo-1571330735066-03aaa9429d89?w=800&h=400&fit=crop&crop=center";

$message = [
    'username' => 'Slowed Blog',
    'avatar_url' => 'https://cdn.discordapp.com/embed/avatars/0.png',
    'embeds' => [
        [
            'title' => "Novo Post: Músicas Slowed Incríveis",
            'description' => "Acabamos de publicar um novo post com as melhores músicas slowed da semana!",
            'color' => 7506394,
            'image' => [
                'url' => $imageUrl
            ],
            'fields' => [
                [
                    'name' => 'Publicado em',
                    'value' => date('d/m/Y à\s H:i'),
                    'inline' => true
                ],
                [
                    'name' => ' Acesse o blog',
                    'value' => '[Clique aqui](http://localhost/projeto/public/index.php)',
                    'inline' => true
                ]
            ],
            'footer' => [
                'text' => 'Slowed Blog • discord.gg/slowed'
            ]
        ]
    ]
];
echo "<h2>Teste de Imagem no Discord</h2>";
echo "<p>Enviando mensagem com imagem para o canal...</p>";
echo "<p><strong>Imagem usada:</strong> <a href='$imageUrl' target='_blank'>$imageUrl</a></p>";
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $webhookUrl,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($message),
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_TIMEOUT => 10
]);

$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($httpCode === 200) {
    echo "<div style='color: green; font-weight: bold; font-size: 18px;'> Mensagem com imagem enviada com sucesso!</div>";
    echo "<p>Verifique o canal do Discord agora! Deve aparecer uma imagem de fundo musical.</p>";
} else {
    echo "<div style='color: red; font-weight: bold;'> Erro ao enviar: HTTP Code $httpCode</div>";
    if ($error) {
        echo "<p>Erro: $error</p>";
    }
}

// Preview da imagem
echo "<br><hr><br>";
echo "<h3>Preview da imagem que será enviada:</h3>";
echo "<img src='$imageUrl' style='max-width: 500px; border-radius: 10px; border: 3px solid #5865F2;' alt='Preview'>";