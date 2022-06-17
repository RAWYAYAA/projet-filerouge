<?php require APPROOT . '/views/inc/header.php'; ?> 
<?php require APPROOT . '/views/inc/sidebar.php'; ?> 
<div class="d-flex justify-content-between align-items-center mt-5"> 
             <h3 class="fs-2 fw-bolder mx-3">Users List</h3>
            <div >
            <button type="button" class="btn btn-primary text-white px-1 px-md-3 rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >ADD NEW <i class="bi bi-person-plus-fill"></i></button>
            </div>
            </div>
<table class="table ">
  <thead>
    <tr>
      <th scope="col" ></th>
      <th scope="col" class="text-muted">Nom et Prénom</th>
      <th scope="col" class="text-muted">Email</th>
      <th scope="col" class="text-muted">Salle</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <tr class="">
      <th scope="row">  <img class="rounded-circle" src="./assets/WhatsApp Image 2022-04-23 at 13.59.58.jpeg" style="width:30px;height:30px;" alt="image youcode"> </th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <th><a href=""><i class="bi bi-pencil-fill"></i></a></th>
      <th><a href=""><i class="bi bi-trash-fill"></i></a></th>
    </tr>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?> 
