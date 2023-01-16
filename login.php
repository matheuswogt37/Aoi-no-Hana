<?php
    include('header.php')
    ?>
<body style="height: 100%;">

    <main class="" style="height:1000px;">
        <div style="background-image: url(img/backgroundLogin.jpeg); padding-top: 250px; padding-bottom: 250px; background-size: contain; height:100%;">
            <section class="container bg-light p-4">
                <h3>Insira seus dados</h3>
                <form>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="emailInput" class="form-label">Email:</label>
                            <input type="email" class="form-control inputLogin" id="emailInput" placeholder="email@exemple.com" pattern="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$" required>
                        </div>
                        <div class="col-6">
                            <label for="passwordInput" class="form-label">Insira a senha</label>
                            <input type="password" class="form-control inputLogin" id="passwordInput" placeholder="************" required>
                            <small class="form-text"></small>
                        </div>
                    </div>
                    <div class="col-6 mx-auto mt-3">
                        <a href="#"><button type="submit" class="btn w-100" style="background-color: #301C41; color: #6F95FF;"><h5 class="my-0">LOGIN</h5></button></a>
                        <p>Não possui uma conta? <a href="/registro.php" class="text-decoration-none"><i>Registre-se Aqui</i></a></p>
                    </div>

                </form>
            </section>
        </div>
    </main>

    <?php
    include('footer.php')
    ?>





</body>
</html>