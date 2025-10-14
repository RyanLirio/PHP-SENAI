<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    $nome = $_SESSION['nome_usuario'];

    require_once('conexao.php');
    $stmt = $pdo->query("SELECT * FROM produtos ORDER BY id_produto LIMIT 5");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="index_logado.css">
</head>
<body>
    <div class="header-container">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h1>GamerStore</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Pagina Inicial</a></li>
                <li><a href="categorias.php">Categorias</a></li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="monteseupc.php">Monte Seu PC</a>
            </ul>
        </nav>
    </div>

    <div class="main-container">
        <h1>Seja Bem Vindo <?php echo $nome;?></h1>

        <div class="carousel-container">
            <button class="carousel-btn prev">&lt;</button>
            <div class="carousel-wrapper">
                <div class="carousel">
                    <?php foreach ($produtos as $produto): ?>
                    <div class="carousel-item">
                        <img src="<?php echo htmlspecialchars($produto['imagem_url_produto']); ?>" alt="<?php echo htmlspecialchars($produto['nome_produto']); ?>">
                        <h3><?php echo htmlspecialchars($produto['nome_produto']); ?></h3>
                        <p>R$ <?php echo number_format($produto['preco_produto'], 2, ',', '.'); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="carousel-btn next">&gt;</button>
        </div>
    </div>


    <script>
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');
    let currentIndex = 0;

    function showItem(index) {
        const itemWidth = items[0].getBoundingClientRect().width;
        carousel.style.transform = `translateX(-${index * itemWidth}px)`;
    }

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showItem(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % items.length;
        showItem(currentIndex);
    });

    setInterval(() => {
        currentIndex = (currentIndex + 1) % items.length;
        showItem(currentIndex);
    }, 4000);

    showItem(currentIndex);
    </script>
</body>
</html>