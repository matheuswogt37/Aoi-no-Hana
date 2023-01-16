<?php
    include('header.php')
?>
<body>
    <main class="" style="height:1000px;">
        <div style="background-image: url(img/backgroundLogin.jpeg); padding-top: 250px; padding-bottom: 250px; background-size: contain; height:100%;">
            <section class="container bg-light p-4">
                <h3>Insira seus dados</h3>
                <form>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="emailInput" class="form-label">Email:</label>
                            <input type="email" class="form-control inputLogin" id="emailInput"
                                placeholder="email@exemple.com" pattern="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$"
                                required>
                        </div>
                        <div class="col-6">
                            <label for="nameInput" class="form-label">Nome completo:</label>
                            <input type="text" class="form-control inputLogin" id="nameInput"
                                placeholder="José da Cruz Baixada" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="cpfInput" class="form-label">CPF:</label>
                            <input type="text" class="form-control inputLogin" id="cpfInput" placeholder="123.456.789-10"
                                pattern="^([-\.\s]?(\d{3})){3}[-\.\s]?(\d{2})$" required>
                        </div>
                        <div class="col-6">
                            <label for="cepInput" class="form-label">CEP:</label>
                            <input type="text" class="form-control inputLogin" id="cepInput" placeholder="79843-050"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="passwordInput" class="form-label">Crie uma senha</label>
                            <input type="password" class="form-control inputLogin" id="passwordInput" placeholder="************"
                                required>
                            <small class="form-text">Use pelo menos 8 caracteres contendo também números e letras
                                maiúsculas</small>
                        </div>
                        <div class="col-6">
                            <label for="passwordRepetInput" class="form-label">Repita sua senha:</label>
                            <input type="password" class="form-control inputLogin" id="passwordRepetInput"
                                placeholder="************" required>
                        </div>
                    </div>

                    <div class="form-check justify-content-center mb-2">
                        <div class="col-6 mx-auto">
                            <input type="checkbox" class="form-check-input" id="checkTerm" required>
                            <label class="form-check-label">Ao Criar uma conta, você concorda com os <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><i>Termos de Usuário</i></a> da Aoi no Hana</label>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Termos de Usuário</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque beatae culpa consectetur esse recusandae? Minus, velit voluptate, numquam molestiae tenetur, natus pariatur at libero voluptas accusantium tempora! Corrupti, ipsum quod. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni minus quasi doloribus facilis doloremque deleniti! Officiis aliquid voluptatem alias neque saepe reprehenderit id! Sint numquam est corporis. Labore, voluptate esse. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto, impedit atque! Eligendi reprehenderit, earum quod veniam dolorem, doloribus in mollitia ipsum ipsam iste totam? Consectetur error quasi aut culpa possimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate incidunt a fuga molestias voluptatem temporibus esse minima ullam, corporis minus dolore, excepturi nam libero eaque voluptas? Nostrum impedit repellendus sequi? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe culpa dicta corporis, ab suscipit aliquid natus atque soluta repellendus labore ullam, veniam minus magnam animi reprehenderit commodi deserunt, cupiditate maiores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint asperiores dolorem voluptates obcaecati maxime labore. Aliquid perferendis ratione voluptatum error hic dolor tenetur aperiam voluptates repellat quasi, pariatur, molestias saepe? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore, rerum! Voluptate, doloremque. Quis, repellendus est. Enim, tempora fugiat laborum harum dolor nesciunt cupiditate vero nihil ipsa consequatur! Harum, maiores odio? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem fugit accusamus ullam, vel laboriosam repellat fugiat expedita soluta nihil libero porro dignissimos cupiditate esse accusantium tempore odit dolores aut. Accusamus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi assumenda, autem id blanditiis aliquid sint provident doloribus harum mollitia voluptas quam deleniti asperiores animi esse voluptatibus numquam ea sit porro. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ex, delectus minima et facere dicta necessitatibus ipsam sapiente expedita, culpa soluta id quibusdam laudantium inventore recusandae. Eveniet, ipsam dignissimos. Amet! Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, eaque quibusdam? Aut exercitationem voluptates enim, assumenda cum sapiente possimus consequatur quisquam. Nam itaque magnam harum quisquam. Neque accusantium quos itaque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid quasi officiis saepe aspernatur nam! Iure quasi rerum dolore perspiciatis explicabo aliquam repellendus quibusdam magnam dicta minima! Alias illum adipisci modi?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal" onclick="checkTermFalse();">Não concordo</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="checkTermTrue();">Concordo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 mx-auto">
                        <a href="#"><button type="submit" class="btn w-100"
                                style="background-color: #301C41; color: #6F95FF;">
                                <h5 class="my-0">CADASTRAR</h5>
                            </button></a>



                    


                    </div>

                </form>
            </section>
        </div>
    </main>

    <?php
    include('footer.php')
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        function checkTermTrue(){
            check = document.getElementById('checkTerm');
            check.checked = true;
        }
        function checkTermFalse(){
            check = document.getElementById('checkTerm');
            check.checked = false;
        }
    </script>
</body>

</html>