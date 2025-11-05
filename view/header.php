<?php
// view/header.php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Slowed Tellonym - Discord.gg/slowed</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            background: #0a0a0a; 
            color: #ffffff;
            line-height: 1.6;
        }
        .container { 
            width: 95%; 
            max-width: 1000px; 
            margin: 20px auto; 
            background: #1a1a1a; 
            padding: 30px; 
            border-radius: 15px;
            border: 2px solid #5865F2;
            box-shadow: 0 8px 25px rgba(88, 101, 242, 0.3);
        }
        .header-top {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 300px;
            height: auto;
            border-radius: 10px;
        }
        header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #5865F2;
        }
        h1 {
            color: #5865F2;
            margin: 0;
            font-size: 2.5em;
            text-shadow: 0 2px 4px rgba(88, 101, 242, 0.5);
        }
        nav {
            display: flex;
            gap: 12px;
        }
        nav a { 
            text-decoration: none; 
            color: #ffffff;
            font-weight: bold;
            padding: 10px 18px;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: #2c2f33;
            border: 1px solid #40444b;
        }
        nav a:hover {
            background: #5865F2;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(88, 101, 242, 0.4);
        }
        .discord-btn {
            background: #5865F2 !important;
            border-color: #5865F2 !important;
        }
        .discord-btn:hover {
            background: #4752c4 !important;
        }
        .post { 
            background: #2c2f33;
            border: 1px solid #40444b;
            border-radius: 10px;
            padding: 20px; 
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .post:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(88, 101, 242, 0.2);
        }
        .flash { 
            background: rgba(88, 101, 242, 0.15); 
            padding: 15px; 
            margin-bottom: 20px; 
            border-left: 5px solid #5865F2;
            border-radius: 8px;
            color: #ffffff;
            font-weight: 500;
        }
        form textarea, form input { 
            width: 100%; 
            min-height: 200px; 
            background: #2c2f33;
            border: 2px solid #5865F2;
            color: white;
            padding: 15px;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            resize: vertical;
        }
        form input {
            min-height: auto;
            padding: 15px;
        }
        label {
            color: #5865F2;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .actions a { 
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9em;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        button {
            background: #5865F2;
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        button:hover {
            background: #4752c4;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(88, 101, 242, 0.4);
        }
        .actions a:nth-child(1) { background: #5865F2; color: white; }
        .actions a:nth-child(2) { background: #2c2f33; color: white; border: 1px solid #40444b; }
        .actions a:nth-child(3) { background: #ed4245; color: white; }
        .actions a:hover { 
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        h2, h3 {
            color: #5865F2;
            margin-top: 0;
            margin-bottom: 15px;
        }
        
        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #333;
            color: #888;
            text-align: center;
            font-size: 0.9em;
        }
        
        article {
            background: #2c2f33;
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
            border: 1px solid #40444b;
        }
        
        .post-content {
            font-size: 1.1em;
            line-height: 1.8;
        }
        
        .post-meta {
            color: #888;
            font-size: 0.9em;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .header-top {
                flex-direction: column;
                text-align: center;
            }
            .logo {
                max-width: 250px;
                margin-bottom: 15px;
            }
            header {
                flex-direction: column;
                gap: 15px;
            }
            nav {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Logo Slowed -->
    <div class="header-top">
        <img src="slowee.jpg" alt="Slowed - Discord.gg/slowed" class="logo" />
    </div>

    <header>
        <h1>Slowed Tellonym</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="index.php?action=create">Criar Post</a>
            <a href="https://discord.gg/slowed" target="_blank" class="discord-btn">Nosso Discord</a>
        </nav>
    </header>

    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="flash"><?php echo htmlspecialchars($_SESSION['flash']); unset($_SESSION['flash']); ?></div>
    <?php endif; ?>