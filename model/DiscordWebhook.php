<?php
// model/DiscordWebhook.php - VERSÃO COM BALÃO CORRIGIDA
class DiscordWebhook {
    private $webhookUrl;
    
    public function __construct($webhookUrl) {
        $this->webhookUrl = $webhookUrl;
    }
    
    public function sendPostToDiscord($titulo, $conteudo) {
        // Imagem de balão de chat
        $imageUrl = "https://i.imgur.com/R2Fp2Jl.png"; // Balão Discord
        
        $message = [
            'username' => 'Slowed Blog',
            'avatar_url' => 'https://cdn.discordapp.com/embed/avatars/0.png',
            'embeds' => [
                [
                    'title' => " " . $titulo,
                    'description' => $this->formatContent($conteudo),
                    'color' => 7506394,
                    'thumbnail' => [
                        'url' => $imageUrl
                    ],
                    'fields' => [
                        [
                            'name' => ' Publicado',
                            'value' => date('d/m/Y à\s H:i'),
                            'inline' => true
                        ],
                        [
                            'name' => ' Blog',
                            'value' => '[Acessar](http://localhost/projeto/public/index.php)',
                            'inline' => true
                        ]
                    ],
                    'footer' => [
                        'text' => ' Slowed Blog • discord.gg/slowed'
                    ],
                    'timestamp' => date('c')
                ]
            ]
        ];
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->webhookUrl,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($message),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        ]);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result !== false;
    }
    
    private function formatContent($conteudo) {
        // Limita o conteúdo e adiciona emojis
        $content = substr($conteudo, 0, 250);
        if (strlen($conteudo) > 250) {
            $content .= '...';
        }
        return "*" . $content . "*";
    }
}