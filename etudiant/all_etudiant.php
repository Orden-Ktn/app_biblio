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
            <a href="add_etudiant.php">
              <span class="sub-item">Ajout d'étudiant</span>
            </a>     
            <a href="all_etudiant.php">
              <span class="sub-item">Liste des étudiants</span>
            </a>

            <hr><i class="fas fa-caret-square-right" style="margin-left: 5%">   EMPRUNT</i><hr>              
            <a href="../emprunt/add_emprunt.php">
              <span class="sub-item">Ajout d'emprunt</span>
            </a>            
            <a href="../emprunt/all_emprunt.php">
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
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Etudiants</h4>
                    
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                  <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header border-0">
                          <h5 class="modal-title">
                            <span class="fw-mediumbold">Modification d'Etudiant</span>
                          </h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="message" class="alert d-none" role="alert"></div>

                          <form action="update_etudiant.php" method="post" enctype="multipart/form-data">
                            <div class="row">

                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Nom</label>
                                  <input id="addName" type="text" name="nom" class="form-control" placeholder="Entrez le nom" required />
                                </div>
                              </div>
                          
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Prénom</label>
                                  <input id="addPrenom" type="text" name="prenom" class="form-control" placeholder="Entrez le prénom" required />
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Adresse</label>
                                  <input id="addAdresse" type="text" name="adresse" class="form-control" placeholder="Entrez l'adresse" required />
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Email</label>
                                  <input id="addEmail" type="text" name="email" class="form-control" placeholder="Entrez l'email" required />
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Téléphone</label>
                                  <input id="addTelephone" type="text" name="telephone" class="form-control" placeholder="Entrez le contact" required />
                                </div>
                              </div>
                          
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Classe</label>
                                  <input id="addClasse" type="text" name="classe" class="form-control" placeholder="Entrez la classe" required />
                                </div>
                              </div>
                                <input id="addid_etudiant" type="hidden" name="id" class="form-control" readonly />
                              <div class="col-md-6 mt-3 d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary me-2">Modifier</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                              </div>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Adresse</th>
                          <th>Email</th>
                          <th>Téléphone</th>
                          <th>Classe</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        require('../based.php');

                        if (!$connection) {
                            die("Pas de connexion : " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM etudiants";
                        $result = mysqli_query($connection, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // Affichage des logements disponibles
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row["id_etudiant"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["nom"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["prenom"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["adresse"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["telephone"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["classe"]); ?></td>
                                    <td>
                                      <div class="form-button-action">
                                        <button type="button" class="btn btn-link btn-primary btn-lg btn-edit"
                                            data-bs-toggle="modal" data-bs-target="#addRowModal"
                                            data-id="<?php echo htmlspecialchars($row['id_etudiant']); ?>"
                                            data-nom="<?php echo htmlspecialchars($row['nom']); ?>"
                                            data-prenom="<?php echo htmlspecialchars($row['prenom']); ?>"
                                            data-adresse="<?php echo htmlspecialchars($row['adresse']); ?>"
                                            data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                            data-telephone="<?php echo htmlspecialchars($row['telephone']); ?>"
                                            data-classe="<?php echo htmlspecialchars($row['classe']); ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-link btn-danger btn-delete"
                                            data-id="<?php echo htmlspecialchars($row['id_etudiant']); ?>"
                                            data-bs-toggle="tooltip" title="Supprimer">
                                            <i class="fa fa-times"></i>
                                        </button>

                                      </div>
                                    </td>

                                </tr>
                                <?php
                            }
                        } else {
                            // Affichage du message si aucun logement n'est enregistré
                            echo '<tr><td colspan="8" class="text-center">Aucun(e) étudiant(e) enregistré(e).</td></tr>';
                        }

                        // Fermeture de la connexion
                        mysqli_close($connection);
                        ?>
                      </tbody>

                    </table>
                  </div>
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
      $(".btn-edit").click(function () {
      let row = $(this).closest("tr");

      let id_etudiant = row.find("td:eq(0)").text(); // ID
      let nom = row.find("td:eq(1)").text();
      let prenom = row.find("td:eq(2)").text();
      let adresse = row.find("td:eq(3)").text();
      let email = row.find("td:eq(4)").text();
      let telephone = row.find("td:eq(5)").text();
      let classe = row.find("td:eq(6)").text();
      
      $("#addid_etudiant").val(id_etudiant);
      $("#addName").val(nom);
      $("#addPrenom").val(prenom);
      $("#addAdresse").val(adresse);
      $("#addEmail").val(email);
      $("#addTelephone").val(telephone);
      $("#addClasse").val(classe);
    });

    $(".btn-delete").click(function () {
    if (confirm("Voulez-vous vraiment supprimer cet(tte) étudiant(e) ?")) {
        let row = $(this).closest("tr");
        let id = row.find("td:eq(0)").text().trim();

        $.ajax({
            type: "POST",
            url: "delete_etudiant.php",
            data: { id: id },
            success: function(response) {
                location.reload();
            },
        });
    }
    });

  });
</script>

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

</html>