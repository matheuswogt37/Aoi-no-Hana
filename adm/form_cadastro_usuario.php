<?php
    include "topo.php";
?>

<?php
    if (isset($_GET['msg'])):
?>

        <div class="alert alert-danger" role="alert">
            <?=$_GET['msg']?>
        </div>

<?php
    endif;
?>

<form action="cadastro_usuario.php" method="POST" class="container w-50 border rounded bg-light py-5 px-3 needs-validation" novalidate>
    <h3 class="text-center mb-5">Cadastro de Usuário</h3>
    <div class="mb-3">
        <label for="emailId" class="form-label">Email:</label>
        <input type="text" name="email" class="form-control" id="emailId" required>
        <div class="invalid-feedback">
            Email inválido.
        </div>
        <div class="valid-feedback">
            Email válido.
        </div>
    </div>

    <div class="mb-3">
        <label for="passwordId" class="form-label">Senha:</label>
        <input type="password" name="password" class="form-control" id="passwordId" required>
        <div class="invalid-feedback">
            Senha inválida.
        </div>
        <div class="valid-feedback">
            Senha válida.
        </div>
    </div>

    <div class="mb-3">
        <label for="password2Id" class="form-label">Repita sua senha:</label>
        <input type="password" name="password2" class="form-control" id="password2Id" required>
        <div class="invalid-feedback">
            Senha inválida.
        </div>
        <div class="valid-feedback">
            Senha válida.
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="border rounded text-light mt-5 mx-auto w-25" style="background-color:#301c41">Cadastrar</button> 
    </div>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

<?php
    include "rodape.php";
?>