<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= PATH . 'public/css/bootstrap.min.css' ?>">
    <!--  Datatables  -->
    <link rel="stylesheet" href="<?= PATH . 'public/css/dataTables.bootstrap4.min.css' ?>">
    <!-- Material Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="<?= PATH . '/public/js/jquery-3.2.1.min.js' ?>"></script>
    <style>
      .content {
        padding-top: 80px;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Sofile Administrator</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= SITE_URL . '?page=admin/Home' ?>">
              Home <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?= SITE_URL . '?page=admin/Position' ?>">
              Position <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?= SITE_URL . '?page=admin/Team' ?>">
              Team <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?= SITE_URL . '?page=admin/Service' ?>">
              Service <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?= SITE_URL . '?page=admin/User' ?>">
              User <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
          <a class="btn btn-danger my-2 my-sm-0" href="<?= SITE_URL . '?page=admin/Login&action=logout' ?>">Logout</a>
      </div>
    </nav>

    <div class="container">
      <div class="row content">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <h1><?= $title ?></h1>
          <nav class="breadcrumb">
            <?php foreach ($breadcrumbs as $item) { ?>
              <a class="breadcrumb-item" href="<?= SITE_URL . $item['link'] ?>"><?= $item['label'] ?></a>
            <?php } ?>
          </nav>

          <?= $page ?>

        </div>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= PATH . '/public/js/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= PATH . '/public/js/jquery.dataTables.min.js' ?>"></script>
    <script src="<?= PATH . '/public/js/dataTables.bootstrap4.min.js' ?>"></script>
    <script>
        $(document).ready(function() {
            $('#table-data').DataTable();
        });
    </script>
  </body>
</html>
