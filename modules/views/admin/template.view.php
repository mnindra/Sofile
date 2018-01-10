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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= PATH . 'public/css/custom.css' ?>">
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
      <button class="navbar-toggler" type="button" onclick="toggleSidebar()" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-md-2 col-lg-2" id="sidebar-container">
          <nav class="nav flex-column sidebar" id="sidebar">
            <a class="nav-link" id="dashboard_menu" href="<?= SITE_URL . '?page=admin/Home' ?>">
              <span class="inline-icon">
                <i class="material-icons">dashboard</i>
                Dashboard
              </span>
            </a>

            <a class="nav-link" id="project_menu" href="<?= SITE_URL . '?page=admin/Project' ?>">
              <span class="inline-icon">
                <i class="material-icons">library_books</i>
                Project
              </span>
            </a>

            <a class="nav-link" id="team_menu" href="<?= SITE_URL . '?page=admin/Team' ?>">
              <span class="inline-icon">
                <i class="material-icons">people</i>
                Team
              </span>
            </a>

            <a class="nav-link" id="service_menu" href="<?= SITE_URL . '?page=admin/Service' ?>">
              <span class="inline-icon">
                <i class="material-icons">devices</i>
                Service
              </span>
            </a>

            <a class="nav-link" id="user_menu" href="<?= SITE_URL . '?page=admin/User' ?>">
              <span class="inline-icon">
                <i class="material-icons">account_circle</i>
                User
              </span>
            </a>

            <a class="nav-link" id="position_menu" href="<?= SITE_URL . '?page=admin/Position' ?>">
              <span class="inline-icon">
                <i class="material-icons">nature_people</i>
                Position
              </span>
            </a>

            <a class="nav-link" id="message_menu" href="<?= SITE_URL . '?page=admin/Message' ?>">
              <span class="inline-icon">
                <i class="material-icons">message</i>
                Message
              </span>
            </a>

            <a class="nav-link" id="setting_menu" href="<?= SITE_URL . '?page=admin/Setting' ?>">
              <span class="inline-icon">
                <i class="material-icons">settings</i>
                Setting
              </span>
            </a>

            <a class="nav-link" style="color: #ff4538" href="<?= SITE_URL . '?page=admin/Login&action=logout' ?>">
              <span class="inline-icon">
                <i class="material-icons">exit_to_app</i>
                Logout
              </span>
            </a>
          </nav>
        </div>
        <div class="col-md-10 col-lg-10">

          <h1><?= $title ?></h1>
          <p class="text-muted"><?= $description ?></p>
          <nav class="breadcrumb mb-5">
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
    <script src="<?= PATH . '/public/js/jquery-dateFormat.min.js' ?>"></script>
    <script>
        $(document).ready(function() {
            $('#table-data').DataTable();

            $(`#${window.activePage}`).toggleClass("active");
        });

        let toggleSidebar = () => {
            $( "#sidebar" ).toggleClass("d-flex");
            $( "#sidebar-container" ).toggleClass("mb-3");
        };
    </script>
  </body>
</html>
