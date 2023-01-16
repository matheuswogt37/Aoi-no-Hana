<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<form action="efetuar_login.php" method="POST" class="container w-50 border rounded bg-light py-2 px-3 mt-5 needs-validation" novalidate>
    <h3 class="text-center mb-5 mt-0 fw-bold fs-5">Aoi no Hana - Área Admin</h3>

    <?php
        if (isset($_GET['msg'])):
    ?>

        <div class="alert alert-danger" role="alert">
            <?=$_GET['msg']?>
        </div>

    <?php
        endif;
    ?>

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
        <button type="submit" class="border rounded text-light py-2 mx-auto w-25" style="background-color:#301c41">Entrar</button> 
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
</body>
</html>