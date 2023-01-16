<?php
    include('header.php');
    require_once('adm/src/ProdutoDAO.php');
?>
<body>
    <main>

        <section>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                        aria-label="Slide 6"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                        aria-label="Slide 7"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"
                        aria-label="Slide 8"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8"
                        aria-label="Slide 9"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9"
                        aria-label="Slide 10"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10"
                        aria-label="Slide 11"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="11"
                        aria-label="Slide 12"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="12"
                        aria-label="Slide 13"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="13"
                        aria-label="Slide 14"></button>
                </div>
                <div class="carousel-inner" style="background-color:#413b6b; background-image: url(img/fundoSlide.webp); background-image: repeat-y;">
                    <div class="carousel-item active">
                        <a href="#">
                            <img src="img/blackCloverSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Slide de Black Clover">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/jujutsuKaisenSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Jujutsu Kaisen">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/onePieceSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de One Piece">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/ft100yearsSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Fairy Tail">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/coupleOfCuckoosSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Couple Of Cuckoos">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/kaijuNo8Slide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Kaiju No8">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/akatsukiNoYonaSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Akatsuki no Yona">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/martialPeakSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Martial Peak">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/kingdomSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Kingdom">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/mashleSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Mashle">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/chainsawManSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Chainsaw Man">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/tomodachiGameSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Tomodachi Game">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/tbateSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de The Beggining After The End">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="img/BerserkerSlide.webp" class="imgSlide d-block mx-auto"
                                alt="Wallpaper de Berserker">
                        </a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section class="container card-produtos">
            <h2 class="mt-3">Promoção</h2>
            <div class="row mt-3 mx-auto g-2">

            <?php
                $produtoDAO = new produtoDAO();
                $products = $produtoDAO->consultarProdutosPromocao(6);
                foreach ($products as $p):
                    $val = $p['value']*((100-$p['promotion'])/100);
                    
                $link_id = $p['id_product'];
            ?>

                <div class="col-2">
                    <div class="card h-100" style="max-width: 250px;">
                        <div class="img-container">
                            <a href="/infoProduto.php?id_product=<?=$link_id?>">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p['image']);?>" class="card-img-top img-card-width" alt="..." style="max-width: 100%;"></a>
                        </div>
                        <div class="card-body pt-1 pb text-center">
                            <a href="/infoProduto.php?id_product=<?=$link_id?>" class="ancoraCard">
                                <p class="card-text mb-1"><?=$p['name']?></p>
                                <p class="card-text mb-1">Volume <?=$p['volume']?></p>
                                <p class="card-text mb-1 text-decoration-line-through">R$ <?=number_format($p['value'], 2, ",", ".")?>
                                <p class="card-text position-absolute bottom-0 start-50 translate-middle-x mb-1">R$ <?=number_format($val, 2, ",", ".")?>
                            </a>
                        </div>
                    </div>
                </div>

            <?php
                endforeach;
            ?>

            </div>
        </section>

        <section class="container card-produtos">
            <h2 class="mt-3">Melhores produtos</h2>
            <div class="row mt-3 mx-auto g-2">

            <?php
                $produtoDAO = new produtoDAO();
                $products = $produtoDAO->consultar();
                foreach ($products as $p):
                $link_id = $p['id_product'];
            ?>

                <div class="col-2">
                    <div class="card h-100" style="max-width: 250px;">
                        <div class="img-container">
                            <a href="/infoProduto.php?id_product=<?=$link_id?>">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p['image']);?>" class="card-img-top img-card-width" alt="..." style="max-width: 100%;"></a>
                        </div>
                        <div class="card-body pt-1 pb text-center">
                            <a href="/infoProduto.php?id_product=<?=$link_id?>" class="ancoraCard">
                                <p class="card-text mb-3"><?=$p['name']?></p>
                                <p class="card-text position-absolute bottom-0 start-50 translate-middle-x mb-1">R$ <?=number_format($p['value'], 2, ",", ".")?>
                            </a>
                        </div>
                    </div>
                </div>

            <?php
                endforeach;
            ?>

            </div>
        </section>

        <section class="container mt-4" id="gostar">
            <h2 class="my-4">Você pode gostar!</h2>
            <div class="row">
                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="float-end d-flex" style="display: flex ;flex-direction: row-reverse;">
                            <img src="img/card-fairytailalmangas.jpg" class="mx-3" style="max-width: 300px;" alt="...">
                            <div class="text-center">
                                <p>Fairy Tail</p>
                                <p>Combo - 63 volumes</p>
                                <p>R$1.000.000,00</p>
                                <button type="button" class="btn" style="color: #6f95ff;
                            background-color: #301c41;
                            border-color: #301c41;"><a href="#" class="text-decoration-none"><b>Ver
                                            mais</b></a></button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="float-start" style="display: flex ;flex-direction: row-reverse;">
                            <img src="img/card-oniepieceallmangas.webp" class="mx-3" style="max-width: 300px;" alt="...">
                            <div class="text-center ">
                                <p>One Piece</p>
                                <p>Combo - 91 Volumes</p>
                                <p>R$1.000.000,00</p>
                                <button type="button" class="btn" style="color: #6f95ff;
                            background-color: #301c41;
                            border-color: #301c41;"><a href="#" class="text-decoration-none"><b>Ver
                                            mais</b></a></button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="mt-4 py-5" style="background-color:#e8e8e8;">
            <div class="container">
                <div class="row">
                    <div class="col-6 align-self-center text-center">
                        <img src="img/credit-card.svg" class="d-block mx-auto" alt="" width="100px">
                        <h4>Escolha como pagar</h4>
                        <p>Você pode pagar com cartão, boleto, pix ou em até 12x no boleto.</p>
                    </div>
                    <div class="col-6 align-self-center text-center">
                        <img src="img/box-seam.svg" alt="" class="d-block mx-auto" alt="" width="100px">
                        <h4>Frete grátis a partir de R$90,00 em compras</h4>
                        <p>Só por estar cadastrado no Aoi no Hana, você tem frete grátis em milhares de produtos</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    include('footer.php');
    ?>
</body>

</html>