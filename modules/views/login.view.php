<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= PATH ?>public/css/bootstrap.min.css">
  <!-- Material Icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Login</title>
</head>
<body>

<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-md-5 m-auto">
      
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Form Login</h4>
          <form action="<?= SITE_URL . '?page=Login&action=login' ?>" method="post">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="material-icons">person</i>
                </div>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Username">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="material-icons">lock</i>
                </div>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">
              </div>
            </div>

            <input type="submit" value="Masuk" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= PATH ?>public/js/bootstrap.min.js"></script>

</body>
</html>