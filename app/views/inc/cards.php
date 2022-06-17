<div class="container">
<div class="  row gap-5 mt-5 ms-5 ps-5" style="--bs-columns: 3;"> 
<div class="card g-col-6 g-col-md-4 " style="width: 18rem;background-color: #04C5C5; ">
  <i class="bi bi-book-fill" class="card-img-top" alt="..."></i> 
  <div class="card-body" >
    <p class="card-text text-dark fw-bold"><?php URLROOT ?>Totale des livres</p>
    <span class="fw-bold fs-5"><?php echo $data['countLivre'] ?></span>
  </div>
</div>
<div class="card g-col-6 g-col-md-4" style="width: 18rem; background-color:#0078FF">
  <i class="bi bi-book-half"  class="card-img-top" alt="..."></i>
  <div class="card-body">
    <p class="card-text text-dark fw-bold">Totale des utilisateurs</p>
    <span class="fw-bold fs-5"><?php echo $data['countUser'] ?></span>
  </div>
</div>
<div class="card g-col-6 g-col-md-4" style="width: 18rem; background-color:#7B2CFF">
<i class="bi bi-book" class="card-img-top" alt="..."></i>
  <div class="card-body">
    <p class="card-text text-dark fw-bold">Totale des demandes</p>
    <span class="fw-bold fs-5"><?php echo $data['countDemande'] ?></span>
  </div>
</div>
</div> 
</div>
