<!DOCTYPE html>
<html lang="fr">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["../assets/css/fonts.min.css"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/plugins.min.css" />
  <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="../assets/css/demo.css" />
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="index.html" class="logo">
            <p style="color:white; font-family: fantasy; margin-top: 50%;">Gestion de <br> bibliothèque</p>
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <li class="nav-item">

              <hr><i class="fas far fa-book" style="margin-left: 5%">    LIVRE</i><hr>
              <a href="../livres/add_livre.php">
                <span class="sub-item">Ajout de livre</span>
              </a>
              <a href="../livres/all_livres.php">
                <span class="sub-item">Liste des livres</span>
              </a>

              <hr><i class="fas far fa-user" style="margin-left: 5%">     ETUDIANT</i><hr>            
              <a href="../etudiant/add_etudiant.php">
                <span class="sub-item">Ajout d'étudiant</span>
              </a>     
              <a href="../etudiant/all_etudiant.php">
                <span class="sub-item">Liste des étudiants</span>
              </a>

              <hr><i class="fas fa-caret-square-right" style="margin-left: 5%">   EMPRUNT</i><hr>              
              <a href="add_emprunt.php">
                <span class="sub-item">Ajout d'emprunt</span>
              </a>            
              <a href="all_emprunt.php">
                <span class="sub-item">Liste des emprunts</span>
              </a>

            </li>
          </ul>
      </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img src="../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">

        </nav>
        <!-- End Navbar -->
      </div>

      <div class="container">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Ajout d'emprunt</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <form action="validation_add_emprunt.php" method="post" enctype="multipart/form-data">
                      <div class="row">
                      <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <label for="debut">Date de l'emprunt</label>
                            <input type="date" class="form-control" id="date_emprunt" name="date_emprunt" required/>
                          </div>
                        </div>
                      
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <label for="fin">Date de retour</label>
                            <input type="date" class="form-control" id="date_retour_prevue" name="date_retour_prevue" required/>
                          </div>
                        </div>
                      
                        <div class="col-md-6 mb-3">
                          <div class="form-group form-group-default">
                            <label for="livre" required>Livre</label>
                            <select name="id_livre" class="form-select" id="livre" required>
                              <option>Sélectionnez le livre</option>
                            <?php
                              $servername = "localhost";
                              $username = "root";
                              $password = "";
                              $dbname = "gestion_bibliotheque";

                              $conn = mysqli_connect($servername, $username, $password, $dbname);

                              if (!$conn) {
                                  die("Pas de connexion : " . mysqli_connect_error());
                              }

                              $sql = "SELECT * FROM livres WHERE disponibilite='Disponible' ";
                              $result = mysqli_query($conn, $sql);

                              if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                      ?>
                                    <option value="<?php echo htmlspecialchars($row["id_livre"]); ?>"><?php echo htmlspecialchars($row["titre"])," | ", htmlspecialchars($row["auteur"]) ?></option>                           
                                  <?php
                                  }
                              } else {
                                  echo '<option value="">Aucun livre disponible.</option>';
                              }
                              mysqli_close($conn);
                            ?>
                        </select>
                          </div>
                        </div>
                      
                        <div class="col-md-6 mb-3">
                          <div class="form-group form-group-default">
                            <label for="etudiant" required>Etudiant</label>
                            <select name="id_etudiant" class="form-select" id="etudiant" required>
                            <option>Sélectionnez l'étudiant</option>
                            <?php
                              $servername = "localhost";
                              $username = "root";
                              $password = "";
                              $dbname = "gestion_bibliotheque";

                              $conn = mysqli_connect($servername, $username, $password, $dbname);
                              if (!$conn) {
                                  die("Pas de connexion : " . mysqli_connect_error());
                              }

                              $sql = "SELECT * FROM etudiants";
                              $result = mysqli_query($conn, $sql);

                              if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                      ?>                                
                                    <option value="<?php echo htmlspecialchars($row["id_etudiant"]); ?>"><?php echo htmlspecialchars($row["nom"])," ", htmlspecialchars($row["prenom"])," | ", htmlspecialchars($row["classe"]); ?></option> 
                                  <?php
                                  }
                              } else {
                                  echo '<option value="">Aucun(e) étudiant(e) enregistré(e).</option>';
                              }
                              mysqli_close($conn);
                            ?>
                        </select>
                          </div>
                        </div>

                        <div class="col-12 mt-3 d-flex justify-content-end">
                          <button type="submit" name="submit" class="btn btn-success me-2">Ajouter</button>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="../assets/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="../assets/js/setting-demo2.js"></script>
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
</body>

</html>x`