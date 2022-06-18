
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
        <ul class="d-flex flex-column align-items-start justify-content-start ">
        <?php if(isset($_SESSION['user_id'])) : ?>
                <li class="">
                  <img class="ms-0" src="<?= URLROOT ?>/assets/Group 5.png" alt="logo" > 
                </li>
                <li class="d-flex flex-column align-items-center">
                  <h2 class="fw-bold mb-3">Bienvenue</h2>
                    <p class="text-black m-3 fw-bold fs-5"><?php echo $_SESSION['user_nomcomplete']?></p>
                </li>
                </ul>
            <ul class="list-unstyled components ms-4">
                <li class="active d-flex align-items-center ">
                <i class="bi bi-house-door-fill"></i>
                <?php if($_SESSION['role'] == '1'): ?>
                    <a href="<?php echo URLROOT; ?>/pages/index"  >Home</a>
                    <?php else: ?>
                    <a href="<?php echo URLROOT; ?>/pages/index"  >Home</a>
                    <?php endif ;?>
                </li>
                <li class="active d-flex align-items-center">
                <i class="bi bi-bookmark-fill"></i>
                <?php if($_SESSION['role'] == '1'): ?>
                    <a href="<?php echo URLROOT; ?>/pages/crudlivres">Livres</a>
                    <?php else: ?>
                    <a href="<?php echo URLROOT; ?>/pages/indexstaf">Livres</a>
                    <?php endif ;?>

                </li>
                <li class="active d-flex align-items-center">
                <i class="bi bi-file-earmark-diff-fill"></i>
                    <?php if($_SESSION['role'] == '1'): ?>
                      <a href="<?php echo URLROOT; ?>/demandes/demandeaffichage">Demandes</a>
                    <?php else: ?>
                      <a href="<?php echo URLROOT; ?>/demandes/satffdemande">Demandes</a>
                    <?php endif ;?>
                </li>
                <li class="active d-flex align-items-center mt-5">
                <i class="bi bi-box-arrow-left"></i>
                    <a href="<?php echo URLROOT; ?>/users/login">logout</a>
                </li>
                <?php else : ?>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
          <nav class="navbar navbar-expand-lg  bg-primary">
            <div class="container-fluid ">
              <button class="bg-transparent border-0" type="button"  id="sidebarCollapse" >
                <i class="bi bi-arrow-left-circle-fill "></i>
              </button>
                    <!-- <nav class="navbar d-flex   navbar-expand-lg  position-fixed end-0 m-0" id="navbar" > -->
              <button class="navbar-toggler outline-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class=""><i class="bi bi-list"></i></span>
              </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <div class="d-flex justify-content-end w-100">
              <form class="d-flex align-items-center gap-3" role="search">
                <input id="search" class="form-control  bg-white opacity-50 me-5" type="search" placeholder="Rechercher" aria-label="Rechercher">
              </form>

              <div class=" d-flex me-3">
              <?php if($_SESSION['role'] == '1'): ?>
                <!-- <span class="ms-2" style="font-size: 20px;"><a href="<?php URLROOT  ?>/demandes/demandeaffichage"><i class=" bi bi-bell-fill"></i></a></span> -->
                <span class="ms-2 position-relative" style="font-size: 20px;"><a href="<?php echo URLROOT; ?>/demandes/demandeaffichage"><i class=" bi bi-bell-fill"></i></a></span>
                <span class="position-absolute translate-middle badge border border-light rounded-circle bg-danger" style="padding: 2px;"><?php echo $data['countiddemande']?></span>
                <?php else: ?>
              
                <span class="ms-2" style="font-size: 20px;"><a href="<?php URLROOT  ?>/demandes/demandeaffichage"><i class=" bi bi-bell-fill"></i></a></span>

                <?php endif ;?>
              </div>
              </div>
            </div>
          </nav>
