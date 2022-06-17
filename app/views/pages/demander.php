<?php require APPROOT . '/views/inc/header.php'; ?> 
<?php require APPROOT . '/views/inc/sidebaruser.php'; ?> 


<div class="d-flex justify-content-between align-items-center mt-5"> 
             <h3 class="fs-2 fw-bolder mx-3"> Mes Demandes </h3>
            <!-- <div>
            <button type="button" class="btn btn-primary text-white px-1 px-md-3 rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >ADD NEW <i class="bi bi-person-plus-fill"></i></button>
            </div> -->
            </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col" ></th>
      <th scope="col" class="text-muted">Nom et Prénom</th>
      <th scope="col" class="text-muted">Livre demandé</th>
      <th scope="col" class="text-muted">Date voulu</th>
      <th scope="col" class="text-muted">Date retour</th>
      <th> </th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <tr class="">
      <th scope="row">  <img class="rounded-circle" src="./assets/WhatsApp Image 2022-04-23 at 13.59.58.jpeg" style="width:30px;height:30px;" alt="image youcode"> </th>
      <td>Mark</td>
      <td>Otto</td>
      <td>2/10</td>
      <td>10/10</td>
      <th> <button type="button" class="btn btn-primary text-white px-1 px-md-3 rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Demander </button>
      </th>
    </tr>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?> 



