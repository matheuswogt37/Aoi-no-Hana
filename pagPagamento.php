<?php
    include('header.php');
    require_once "adm/src/ClienteDAO.php";
    $clienteDAO = new ClienteDAO();
    $cliente = $clienteDAO->consultarCliente("fabio.carvalho@botstrap.php");
    $_SESSION['id_cliente'] = $cliente['id_cliente'];

    $name = explode(' ',trim($cliente['name']))
?>
<body>
    <main class="my-2">
        <section class="container">
        <form action="finalizar_compra.php">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">Seu carrinho</h4>
                        <hr>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex mb-3 lh-condensed">
                                <div>
                                    <img src="img/card-noragamivol21.jpg" style="max-width: 80px;" alt="">
                                </div>
                                <div>
                                    <h6 class="my-0 p-2">Noragami Vol. 17</h6>
                                    <small class="p-2" style="color: #808080;">Edição PT-BR</small>
                                </div>
                                <span class="ms-auto p-2" style="color: #808080;">R$100</span>
                            </li>
                            <li class="list-group-item d-flex mb-3 lh-condensed">
                                <div>
                                    <img src="img/card-hanakovol11.jpg" style="max-width: 80px;" alt="">
                                </div>
                                <div>
                                    <h6 class="my-0 p-2">Jibaku Shounen Hanako-kun Vol. 11</h6>
                                    <small class="p-2" style="color: #808080;">Edição PT-BR</small>
                                </div>
                                <span class="ms-auto p-2" style="color: #808080;">R$100</span>
                            </li>
                            <li class="list-group-item d-flex mb-3 lh-condensed">
                                <div>
                                    <img src="img/card-jujutsuvol4.jpg" style="max-width: 80px;" alt="">
                                </div>
                                <div>
                                    <h6 class="my-0 p-2">Jujutsu Kaisen Vol. 4</h6>
                                    <small class="p-2" style="color: #808080;">Edição PT-BR</small>
                                </div>
                                <span class="ms-auto p-2" style="color: #808080;">R$100</span>
                            </li>
                        </ul> -->
                        <div class="row">
                            <ul>
                                <li class="list-group-item mx-none">
                                    <div>
                                        <h4>TOTAL: <?=number_format($_SESSION['total'], 2, ",", ".")?></h4>
                                    </div>
                                </li>
                            </ul>
                            <div class="py-2">
                                <button type="submit" class="btn btn-block btn-lg" style="color: #6f95ff;
                                        background-color: #301c41;
                                        border-color: #301c41;"><b>Finalizar Compra</b></button>
                            </div>
                        </div>
                </div>
                <div class="col-md-8 order-md-1">
                    
                    <h4 class="my-3">Endereço de envio</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="" value="<?=$name[0]?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" placeholder="" value="<?=$name[1]?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="nome@gmail.com"
                                value="<?=$cliente['email']?>">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" placeholder="49 9 99999999"
                                value="<?=$cliente['phone']?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" placeholder="Rua, nº, bairro" value="<?=$cliente['address']?>">
                        <div class="invalid-feedback">
                            Insira um endereço de entrega.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="complemento">Complemento</label>
                        <textarea type="text" class="form-control" id="complemento" rows="3"><?=$cliente['complement']?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="estado">Estado</label>
                            <select class="form-select d-block w-100" id="estado">
                                <option value="">Escolha...</option>
                                <option>São Paulo</option>
                                <option>Rio de Janeiro</option>
                                <option>Minas Gerais</option>
                                <option>Santa Catarina</option>
                                <option>Paraná</option>
                                <option>Rio Grande do Sul</option>
                            </select>
                            <div class="invalid-feedback">
                                Escolha um estado válido.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" placeholder="">
                            <div class="invalid-feedback">
                                Insira um CEP válido.
                            </div>
                            <small>Não sabe o seu CEP? <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" class="text-decoration-none text-dark" id="cep" target="_blank">Clique aqui!</a></small>
                        </div>
                    </div>

                    <h4 class="mb-3 my-4">Pagamento</h4>
                    <hr>
                    <div class="d-block my-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="creditCard">
                            <label class="form-check-label" for="creditCard">
                                Cartão de crédito
                            </label>
                        </div>
                        <div class="form-check ms-auto">
                            <input class="form-check-input" type="radio" name="payment"
                                id="ticket">
                            <label class="form-check-label" for="ticket">
                                Boleto
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="paypal">
                            <label class="form-check-label" for="paypal">
                                PayPal
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Número do cartão de crédito</label>
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <small for="">Data de vencimento</small>
                            <input type="date" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <small for="">Código de segurança</small>
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </section>
    </main>

    <?php
    include('footer.php')
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script>

    </script>

</body>

</html>