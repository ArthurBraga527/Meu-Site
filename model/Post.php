<?php
// model/Post.php
require_once 'DiscordWebhook.php';

class Post {
    private $dataFile;
    private $discordWebhook;

    public function __construct($dataFile = __DIR__ . '/../data/posts.json') {
        $this->dataFile = $dataFile;
        if (!file_exists($this->dataFile)) {
            file_put_contents($this->dataFile, json_encode([]));
        }
        
        // URL DO WEBHOOK
        $webhookUrl = "https://discord.com/api/webhooks/1435360972981403718/rJ5kpHcORhB7oGK_mZOdWjU8ECIWnwjK6-hEqSLYNWKG0L5P9G_TbhNZmjrmNtkFK4Sx";
        $this->discordWebhook = new DiscordWebhook($webhookUrl);
    }

    public function all() {
        if (!file_exists($this->dataFile)) {
            return [];
        }
        $posts = json_decode(file_get_contents($this->dataFile), true);
        if (!is_array($posts)) {
            return [];
        }
        usort($posts, function($a, $b){
            return strtotime($b['data_publicacao']) - strtotime($a['data_publicacao']);
        });
        return $posts;
    }

    public function find($id) {
        $posts = $this->all();
        foreach ($posts as $p) {
            if ($p['id'] == $id) return $p;
        }
        return null;
    }

    public function create($titulo, $conteudo) {
        $posts = $this->all();
        $ids = array_column($posts, 'id');
        $next = $ids ? max($ids) + 1 : 1;
        $post = [
            'id' => $next,
            'titulo' => $titulo,
            'conteudo' => $conteudo,
            'data_publicacao' => date('Y-m-d H:i:s'),
        ];
        $posts[] = $post;
        file_put_contents($this->dataFile, json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        
        // Enviar para o Discord (sem GD)
        try {
            $this->discordWebhook->sendPostToDiscord($titulo, $conteudo);
        } catch (Exception $e) {
            // Ignora erros silenciosamente
        }
        
        return $next;
    }

    public function update($id, $titulo, $conteudo) {
        $posts = $this->all();
        foreach ($posts as &$p) {
            if ($p['id'] == $id) {
                $p['titulo'] = $titulo;
                $p['conteudo'] = $conteudo;
                file_put_contents($this->dataFile, json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                return true;
            }
        }
        return false;
    }

    public function delete($id) {
        $posts = $this->all();
        $new = array_filter($posts, function($p) use ($id) {
            return $p['id'] != $id;
        });
        $new = array_values($new);
        file_put_contents($this->dataFile, json_encode($new, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return true;
    }
}