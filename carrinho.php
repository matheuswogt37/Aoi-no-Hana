<?php
    include('header.php');
    require_once "adm/src/ProdutoDAO.php";
    $produtoDAO = new ProdutoDAO();

    
    
    $idproduto = $_REQUEST['idproduto']??null;
    $operacao = $_REQUEST['operacao']??null;
    $carrinho = $_SESSION['carrinho']??[];

    if ($operacao=="inserir") {
        $exist = false;
        foreach ($carrinho as $x => $item) {
            if ($idproduto==$item['idproduto']) {
                $item['quantidade'] ++;
                $carrinho[$x] = $item;
                $exist = true;
                break;
            }
        }
        if ($exist==false) {
            $item['idproduto'] = $idproduto;
            $item['quantidade'] = 1;
            $carrinho[] = $item;
        }


    }else if ($operacao=="remover") {
        for ($x = 0; $x <= array_key_last($carrinho); $x++) {
            $cart = $carrinho[$x]??null;
            if ($cart != null &&  $cart['idproduto']==$idproduto) {
                unset($carrinho[$x]);
            }
        }
    }
    $_SESSION['carrinho'] = $carrinho;
    
?>
<body>
    <main>
        <section class="my-3 d-flex container">
                <!-- finalizar compra e total -->
                

                <!-- produtos, quantidade, preço -->

                <div class="col-md-8 order-md-1">
      
                    <div class="d-flex justify-content-between">
                        <h5 class="col-2">Produto</h5>
                        <h5 class="col-2">Quantidade</h5>
                        <h5 class="col-2">Preço</h5>
                    </div>
                    <?php
                    $val_total = 0;
                    foreach ($carrinho as $i => $item):
                        $produtoItem = $produtoDAO->consultarPorId($item['idproduto']);
                        if ($produtoItem['promotion']!=0) {
                            $val_item = $produtoItem['value']*((100-$produtoItem['promotion'])/100);
                        } else {
                            $val_item = $produtoItem['value'];
                        }
                        $item['value'] = $val_item;
                        $carrinho[$i] = $item;
                        $val_total += $val_item*$item['quantidade'];
                    ?>
                        <div class="d-flex justify-content-between my-3">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($produtoItem['image']);?>" class="mx-2" alt="..." style="max-width: 100%; width:150px;">
                            <div class="row col-4">
                                <h5><?=$produtoItem['name']?></h5>
                                <h6>Volume <?=$produtoItem['volume']?></h6>
                            </div>
                            <div class="dropdown col-3">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?=$item['quantidade']?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">2</a></li>
                                    <li><a class="dropdown-item" href="#">3</a></li>
                                    <li><a class="dropdown-item" href="#">4</a></li>
                                </ul>
                            </div>
                            <div class="row mx-4">
                            <?php
                                $_SESSION['total'] = $val_item;
                                $_SESSION['carrinho'] = $carrinho;
                            ?>
                                <p class="mb-0">R$ <?=number_format($val_item, 2, ",", ".")?></p>
                                <a class="mx-2 text-decoration-none" style="color: #919191;" href="/carrinho.php?operacao=remover&idproduto=<?=$produtoItem['id_product']?>">excluir</a>
                            </div>
                        </div>

                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="col-md-4 order-md-2 mb-4">
                            <div class="row">
                                <ul>
                                    <li class="list-group-item mx-none">
                                        <div>
                                            <h4>TOTAL: R$ <?=$val_total?></h4>
                                        </div>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <button type="button" class="btn btn-block btn-lg" style="color: #6f95ff;
                                            background-color: #301c41;
                                            border-color: #301c41;"><a href="pagPagamento.php"
                                            class="text-decoration-none"><b>Continuar Compra</b></a></button>
                                </div>
                            </div>
                </div>
            
        </section>

        

        <!-- <section class="container">
            <div class="row ms-auto text-end">
                <div class="mx-3">
                    <h4>TOTAL</h4>
                    <h6>R$399,98</h6>
                </div>
                <div class="py-4">
                    <button type="button" class="btn" style="color: #6f95ff;
                            background-color: #301c41;
                            border-color: #301c41;"><a href="#" class="text-decoration-none"><b>Finalizar
                                Compra</b></a></button>
                </div>
            </div>
        </section> -->

        <h4 class="mt-4 container">Aproveite Também</h4>
        <section  id="aproveite" >
            <div class="container py-3">
                <div class="row">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="heigth: 300px">
                        <div class="carousel-inner">
                            
                            <div class="carousel-item active" >
                                <div class="col">
                                    <div class="col-8 d-inline-block my-4 overflow-auto">
                                    <p class="mx-4 my-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam minima qui nihil architecto esse consequatur ut commodi neque tempore reiciendis. Magnam quia vel sint obcaecati aliquid tempora labore, veniam inventore?Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus in eveniet fugiat maxime ipsam voluptate quas quibusdam corporis recusandae debitis dolore quos, sed laborum officiis at. Reiciendis sit dolor corrupti. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti, reprehenderit itaque quibusdam tempore quaerat sequi, consequatur dicta natus, rem odit soluta iure dolores enim dolorum adipisci doloremque placeat aperiam illum. Lorem ipsum dolor sit amet consectetur adipisicing elit. A, soluta non in explicabo ipsum quaerat autem, exercitationem, eos quod reprehenderit nesciunt? Autem reiciendis, facilis ipsum voluptatibus mollitia iusto perferendis ex? Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis a tempora veniam. Obcaecati quo harum recusandae, dolore eum labore laborum impedit quaerat ad consequuntur mollitia doloremque debitis, vitae minus possimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam cumque veritatis cum nobis dolorem non autem, sapiente minus totam ducimus fuga minima et tempore nihil, odio ex iure. Quibusdam, ducimus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate illum temporibus, laudantium dolorem commodi sequi quod, laboriosam enim velit corporis explicabo asperiores saepe, rerum consequuntur odio at? Est, hic molestias. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum est voluptatem provident autem tempore animi magnam, reprehenderit quod officia cupiditate expedita quibusdam maiores labore nobis obcaecati ducimus culpa. Facere, debitis? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic optio eum ut voluptate sequi dolor, nihil voluptatum voluptates tempora, officiis placeat recusandae ab laudantium minima expedita consequuntur possimus nisi fugiat? Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta omnis qui eligendi distinctio quos neque eos, sint facilis quibusdam. Natus sequi laboriosam expedita, asperiores rem accusamus tempora repudiandae illo. Dolor?</p>
                                    
                                    </div>
                                    <a href="#" class="text-decoration-none">
                                    </a>
                                    <div class="float-end d-flex col-4" style="display: flex ;flex-direction: row-reverse;"><a
                                            href="#" class="text-decoration-none">
                                            <img src="img/kimetsu24vol.webp" class="" alt="...">
                                        </a>
                                        <div class="text-center"><a href="#" class="text-decoration-none">
                                                <p>Kimetsu no Yaiba 24 Volumes</p>
                                                <p>R$1000,00</p>
                                            </a><button type="button" class="btn" style="color: #6f95ff;
                                        background-color: #301c41;
                                        border-color: #301c41;"><a href="#" class="text-decoration-none ancoraAproveite"></a><a
                                                    href="#" class="text-decoration-none"><b>Ver mais</b></a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    include('footer.php')
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>