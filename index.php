Não pode criar, editar nem carregar conteúdo … Não tem armazenamento suficiente para guardar conteúdo no Drive, fazer cópias de segurança para o Google Fotos nem usar o Gmail. Obtenha 30 GB de armazenamento por R$ 4,50 R$ 1,00/mês durante 3 meses.
<?php
// Variáveis PHP para personalizar o conteúdo da página
$siteTitle = "Exemplo de HTML e PHP Integrados";
$pageHeading = "Bem-vindo ao Meu Site";
$introText = "Aqui você encontra informações e imagens interessantes, tudo gerado com PHP.";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteTitle; ?></title>
    <!-- Link para o CSS externo -->
    <link rel="stylesheet" href="style.css">
    <!-- Link para o animate.css via CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <!-- Cabeçalho do site -->
    <header id="home">
        <h1 class="animate__animated animate__bounceIn"><?php echo $pageHeading; ?></h1>
        <p class="animate__animated animate__fadeInUp"><?php echo $introText; ?></p>
    </header>

    <!-- Menu de navegação -->
    <nav class="animate__animated animate__fadeInDown">
        <ul>
            <li><a href="#home">Início</a></li>
            <li><a href="#gallery">Galeria</a></li>
            <li><a href="#table">Tabela</a></li>
            <li><a href="#contact">Contato</a></li>
            <li><a href="#rodape">Rodapé</a></li>
        </ul>
    </nav>

    <!-- Conteúdo Principal -->
    <main>
        <!-- Galeria de imagens -->
        <!-- <section id="gallery">
            <h2 class="animate__animated animate__fadeInDown">Galeria de Imagens</h2>
            <div class="gallery-container">
                <?php
                // Gerando imagens dinamicamente com PHP
                for ($i = 1; $i <= 6; $i++) {
                    echo "<img class='animate__animated animate__fadeInUp' src='https://via.placeholder.com/150' alt='Imagem $i'>";
                }
                ?>
            </div>
        </section> -->
        <section id="gallery">
    <h2>Galeria de Imagens</h2>
    <div class="gallery-container">
        <?php
        // Definindo o diretório das imagens
        $imageDirectory = "assets/img/";

        // Iterar sobre as imagens numeradas (imagem1.jpg até imagem6.jpg)
        for ($i = 1; $i <= 6; $i++) {
            // Definindo o nome do arquivo dinamicamente
            $imagePath = $imageDirectory . "imagem" . $i . ".png";
            
            // Verificar se o arquivo existe antes de exibir
            if (file_exists($imagePath)) {
                echo "<img src='$imagePath' alt='Imagem $i'>";
            }
        }
        ?>
    </div>
</section>

        <!-- Tabela de informações -->
        <section id="table">
            <h2 class="animate__animated animate__fadeInLeft">Tabela de Informações</h2>
            <table class="animate__animated animate__fadeInRight">
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Profissão</th>
                </tr>
                <?php
                // Dados fictícios em PHP
                $dados = [
                    ["João Silva", 30, "Engenheiro"],
                    ["Maria Oliveira", 28, "Designer"],
                    ["Pedro Costa", 35, "Desenvolvedor"]
                ];

                // Gerar linhas da tabela dinamicamente
                foreach ($dados as $pessoa) {
                    echo "<tr>";
                    foreach ($pessoa as $info) {
                        echo "<td>$info</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </section>
    </main>

    <!-- Rodapé do site -->
    <footer id="rodape">
        <nav>
            <ul>
                <li><a href="#home">Início</a></li>
                <li><a href="#gallery">Galeria</a></li>
                <li><a href="#table">Tabela</a></li>
                <li><a href="#contact">Contato</a></li>
            </ul>
        </nav>
        <p>&copy; 2024 Meu site. Todos os direitos reservados</p>
    </footer>
    <script>
// Espera a página carregar completamente antes de aplicar o efeito de scroll suave
document.addEventListener("DOMContentLoaded", function() {
    // Seleciona todos os links de âncora que iniciam com "#"
    const scrollLinks = document.querySelectorAll('a[href^="#"]');

    // Adiciona um evento de clique para cada link
    scrollLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault(); // Evita o comportamento padrão do clique no link

            const target = document.querySelector(this.getAttribute("href")); // Seleciona o elemento alvo com base no ID

            if (target) {
                // Faz a rolagem suave manualmente utilizando intervalos para controle total do movimento
                scrollToSmooth(target);
            }
        });
    });

    // Função para rolagem suave
    function scrollToSmooth(target) {
        const targetPosition = target.getBoundingClientRect().top; // Posição do alvo em relação ao topo
        const startPosition = window.pageYOffset; // Posição atual de rolagem
        const distance = targetPosition; // Distância a percorrer
        const duration = 800; // Duração da animação (em milissegundos)
        let start = null;

        // Função de animação
        function animation(currentTime) {
            if (start === null) start = currentTime;
            const timeElapsed = currentTime - start;
            const run = ease(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation); // Continua a animação até atingir a duração
        }

        // Função de suavização (ease-in-out)
        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation); // Inicia a animação
    }
});
</script>


</body>
</html>