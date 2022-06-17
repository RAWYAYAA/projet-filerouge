 <div class="wrapper"> 
        <!-- Sidebar  -->
        <nav id="sidebar">
        <ul class="d-flex flex-column align-items-start justify-content-start">
                <li class="">
                  <img class="ms-0" src="<?= URLROOT ?>/assets/Group 5.png" alt="logo" > 
                </li>
                <li class="d-flex flex-column align-items-center">
                    <img class="rounded-circle" src="<?= URLROOT ?>/assets/WhatsApp Image 2022-04-23 at 13.59.58.jpeg" style="width:90px;height:90px;" alt="image youcode">
                    <p class="text-black m-3 fw-bold fs-5">Admin</p>
                </li>
                </ul>
            <ul class="list-unstyled components ms-4">
                <li class="active d-flex align-items-center ">
                <i class="bi bi-house-door-fill"></i>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" >Home</a>
                </li>
                <!-- <li class="active d-flex align-items-center">
                <i class="bi bi-people-fill"></i>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" >Demander</a>
                </li> -->
                <li class="active d-flex align-items-center">
                <i class="bi bi-bookmark-fill"></i>
                    <a href="#">Livres</a>
                </li>
                <li class="active d-flex align-items-center">
                <i class="bi bi-arrow-bar-up"></i>
                    <a href="#">Demandes</a>
                </li>
                <li class="active d-flex align-items-center mt-5">
                <i class="bi bi-box-arrow-left"></i>
                    <a href="#">logout</a>
                </li>
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
                <input class="form-control  bg-white opacity-50 me-5" type="search" placeholder="Rechercher" aria-label="Rechercher">
              </form>
              <div class=" d-flex me-3">
                <span class="ms-5" style="font-size: 20px;"><i class="bi bi-person-check-fill"></i></span>
                <span class="ms-2" style="font-size: 20px;"><i class=" bi bi-bell-fill"></i></span>
              </div>
              </div>
            </div>
          </nav> 
