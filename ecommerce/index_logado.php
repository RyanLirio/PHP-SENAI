<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    $nome = $_SESSION['nome_usuario'] ?? 'Visitante';

    require_once('conexao.php');
    $stmt = $pdo->query("SELECT * FROM produtos ORDER BY id_produto LIMIT 5");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamerStore - Loja de Peças para PC</title>
    <link rel="stylesheet" href="index_logado.css">
</head>
<body>
    <div class="header-container">
        <div class="logo">
            <img src="./imagens/logo.png" alt="Logo GamerStore">
            
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="categorias.php">Categorias</a></li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="monteseupc.php">Monte Seu PC</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-container">
        <div class="welcome">Olá, <?php echo htmlspecialchars($nome); ?>!</div>
        <div class="subtitle">Encontre as melhores peças para turbinar seu computador!</div>

        <section class="destaques">
            <h2 class="section-title">Produtos em Destaque</h2>
            <div class="carousel-container">
                <button class="carousel-btn prev">&lt;</button>
                <div class="carousel-wrapper">
                    <div class="carousel">
                        <?php foreach ($produtos as $produto): ?>
                        <div class="carousel-item">
                            <img src="<?php echo htmlspecialchars($produto['imagem_url_produto']); ?>" alt="<?php echo htmlspecialchars($produto['nome_produto']); ?>">
                            <h3><?php echo htmlspecialchars($produto['nome_produto']); ?></h3>
                            <div class="product-desc">
                                <?php echo htmlspecialchars($produto['descricao_produto']); ?>
                            </div>
                            <div class="product-price">
                                R$ <?php echo number_format($produto['preco_produto'], 2, ',', '.'); ?>
                            </div>
                            <div class="product-stock">
                                <span>Estoque: <?php echo $produto['estoque_produto']; ?></span>
                            </div>
                            <a href="produto.php?id=<?php echo $produto['id_produto']; ?>" class="details-btn">
                                Ver detalhes
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="carousel-btn next">&gt;</button>
            </div>
        </section>

        <section class="categorias-individuais">
            <h2 class="section-title">Peças Individuais</h2>
            <div class="category-list">
                <a href="categorias.php?cat=processadores" class="category-btn">
                    Processadores
                </a>
                <a href="categorias.php?cat=placas-mae" class="category-btn">
                    Placas-mãe
                </a>
                <a href="categorias.php?cat=memorias" class="category-btn">
                    Memórias RAM
                </a>
                <a href="categorias.php?cat=armazenamento" class="category-btn">
                    SSDs & HDs
                </a>
                <a href="categorias.php?cat=fontes" class="category-btn">
                    Fontes
                </a>
            </div>
        </section>
    </div>

    <script>
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');
    let currentIndex = 0;

    function showItem(index) {
        if (items.length === 0) return;
        
        const itemWidth = items[0].offsetWidth;
        const gap = 16;
        const totalOffset = itemWidth + gap;

        carousel.style.transform = `translateX(-${index * totalOffset}px)`;
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

    window.addEventListener('resize', () => {
        showItem(currentIndex);
    });

    showItem(currentIndex);
    </script>
</body>
</html>