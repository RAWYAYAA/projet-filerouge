<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="m-3">
    <div class="d-flex justify-content-between align-items-center mt-5">
        <h3 class="fs-2 fw-bolder mx-3">Livres List </h3>
        <div>
            <a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/livres/add">ADD NEW <i class="bi bi-person-plus-fill"></i></a>
        </div>
    </div>
    <table class="table  table-responsive">
        <thead>
            <tr>
                <th scope="col">image</th>
                <th scope="col" class="text-muted">#</th>
                <th scope="col" class="text-muted">type</th>
                <th scope="col" class="text-muted">titre</th>
                <th scope="col" class="text-muted">écrivain</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($data['livres'] as $livre) : ?>
                <tr>
                    <td><img class="rounded-circle"
                            src="data:image/*;charset=utf8;base64,<?php echo base64_encode($livre->image); ?>"
                            alt="" width="45" height="45">
                        </td>
                    <td><?= $livre->id; ?></td>
                    <td><?= $livre->type; ?></td>
                    <td class="title"><?= $livre->titre; ?></td>
                    <td><?= $livre->ecrivain; ?></td>
                    <td><a href="<?php echo URLROOT; ?>/livres/edit/<?= $livre->id; ?>"><i class="bi bi-pencil-fill"></i></a></td>
                    <td><a href="<?php echo URLROOT; ?>/livres/delete/<?= $livre->id; ?>"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<script>
    let searchInput = document.getElementById('search');
    let titles = document.querySelectorAll('.title')

    searchInput.addEventListener('input', () => {
        let searchValue = searchInput.value.toLowerCase();
        titles.forEach(title => {
            let titleValue = title.textContent.toLowerCase();
            console.log(titleValue);
            console.log(searchValue);
            if (titleValue.startsWith(searchValue)) {
                title.parentElement.style.display = 'table-row';
            } else {
                title.parentElement.style.display = 'none';
            }
        })
    })
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>