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
    <div class="sidebar" data-background-color="dark" >
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
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Emprunts</h4>
                    
                  </div>
                </div>
                <div class="card-body">
              
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header border-0">
                          <h5 class="modal-title">
                            <span class="fw-mediumbold">Modification d'emprunt</span>
                          </h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="message" class="alert d-none" role="alert"></div>

                          <form action="update_emprunt.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <input type="hidden" id="empruntId" name="id_emprunt">

                            <input type="hidden" id="livreId" name="id_livre">

                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Date d'emprunt</label>
                                  <input id="addDateDebut" type="date" name="date_emprunt" class="form-control" required />
                                </div>
                              </div>
                          
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Date de retour</label>
                                  <input id="addDateFin" type="date" name="date_retour_prevue" class="form-control" required />
                                </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group form-group-default">
                                  <label>Le livre a été remis à la date prévue?</label>
                                  <select name="date_retour_effective" id="addDateRemise" class="form-control">
                                    <option value="Oui">Oui</option>
                                    <option value="Non">Non</option>
                                  </select>
                                </div>
                              </div>
                          
                              <div class="col-12 mt-3 d-flex justify-content-end">
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
                          <th>Etudiant</th>
                          <th>Livre</th>             
                          <th>Date d'emprunt</th>
                          <th>Date de retour prévue</th>
                          <th>Date de retour effective</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php
                          require('../based.php');

                          if (!$connection) {
                              die("Pas de connexion : " . mysqli_connect_error());
                          }

                        $sql = "SELECT 
                          emprunts.id_emprunt,
                          emprunts.date_emprunt,
                          emprunts.date_retour_prevue,
                          emprunts.date_retour_effective,
                          etudiants.nom AS etudiant_nom, 
                          etudiants.prenom AS etudiant_prenom, 
                          livres.titre AS livre_titre,
                          livres.id_livre AS livre_id 
                          FROM emprunts
                          INNER JOIN etudiants ON emprunts.id_etudiant = etudiants.id_etudiant
                          INNER JOIN livres ON emprunts.id_livre = livres.id_livre";

                        $result = mysqli_query($connection, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row["id_emprunt"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["etudiant_nom"] . " " . $row["etudiant_prenom"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["livre_titre"]); ?> | (<?php echo htmlspecialchars($row["livre_id"]); ?>)</td>
                                    <td><?php echo htmlspecialchars($row["date_emprunt"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["date_retour_prevue"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["date_retour_effective"]); ?></td>
                                    <td>
                                      <div class="form-button-action">
                                        <button type="button" class="btn btn-link btn-primary btn-lg btn-edit"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addRowModal"
                                            data-id="<?php echo $row['id_emprunt']; ?>"
                                            data-date_emprunt="<?php echo $row['date_emprunt']; ?>"
                                            data-date_retour_prevue="<?php echo $row['date_retour_prevue']; ?>"
                                            data-date_retour_effective="<?php echo $row['date_retour_effective']; ?>"
                                            data-id_livre="<?php echo $row['livre_id']; ?>"
                                            data-etudiant="<?php echo $row['etudiant_nom'] . ' ' . $row['etudiant_prenom']; ?>"
                                            title="Modifier">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-danger btn-delete" 
                                                data-id="<?php echo $row['id_emprunt']; ?>" title="Supprimer">
                                            <i class="fa fa-times"></i>
                                        </button>
                                      </div>
                                    </td>
                                </tr>
                              <?php
                            }
                        } else {
                            echo '<tr><td colspan="7" class="text-center">Aucun emprunt enregistré.</td></tr>';
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

            <div class="card">
                <div class="card-header">
                  <div class="card-title">Livres à retourner aujourd’hui (
                    <?= date("d-m-Y") ?>)
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-danger">
                      <thead>
                        <tr>
                          <th>Titre du Livre</th>
                          <th>Nom & Prénom de l'étudiant</th>
                          <th>Date Retour Prévue</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "gestion_bibliotheque";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        if (!$conn) {
                            die("Pas de connexion : " . mysqli_connect_error());
                        }

                        $date_aujourdhui = date("Y-m-d");
                        $sql = "SELECT emprunts.id_emprunt, livres.titre, etudiants.nom, etudiants.prenom, emprunts.date_retour_prevue 
                        FROM emprunts 
                        JOIN livres ON emprunts.id_livre = livres.id_livre
                        JOIN etudiants ON emprunts.id_etudiant = etudiants.id_etudiant
                        WHERE emprunts.date_retour_prevue = '$date_aujourdhui'";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                        <tr>
                          <td>
                            <?= htmlspecialchars($row["titre"]) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($row["nom"] . " " . $row["prenom"]) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($row["date_retour_prevue"]) ?>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                    <?php
                            }
                        } else {
                            echo '<tr><td colspan="4" class="text-center">Aucun retour de livre prévu pour aujourd\'hui.</td></tr>';
                        }
                    // Fermeture de la connexion
                    mysqli_close($conn);
                    ?>
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
    $(document).ready(function () {
    $(".btn-edit").click(function () {
        let id = $(this).data("id");
        let date_emprunt = $(this).data("date_emprunt");
        let date_retour_prevue = $(this).data("date_retour_prevue");
        let date_retour_effective = $(this).data("date_retour_effective");
        let id_livre = $(this).data("id_livre");

        $("#empruntId").val(id);
        $("#addDateDebut").val(date_emprunt);
        $("#addDateFin").val(date_retour_prevue);
        $("#addDateRemise").val(date_retour_effective);
        $("#livreId").val(id_livre);
    });
    });


    $(".btn-delete").click(function () {
    if (confirm("Voulez-vous vraiment supprimer cet emprunt ?")) {
        let id = $(this).data("id");

        $.post("delete_emprunt.php", { id: id }, function (response) {
            if (response.trim() === "success") {
                location.reload();
            }   
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