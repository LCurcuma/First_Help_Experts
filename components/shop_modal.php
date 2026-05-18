
<!-- Modal -->
<div class="modal fade" id="<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column mx-3">
                <img src="<?php echo $img_src ?>" alt="<?php echo $alt ?>" class="img-fluid border rounded-5 object-fit-cover height_modal_img mb-3">
                <div class="d-flex flex-row align-items-center justify-content-between mx-1">
                    <div>
                    <h2 class="fw-bold"><?php echo $name ?></h2>
                    <p class="fw-bold fs-5"><?php echo $desc ?></p>
                    </div>
                    <div class="d-flex flex-row align-items-center gap-3 modal_text">
                        <p class="fw-bold fs-4"><?php echo $points ?></p>
                        <img src="../img/icons/3d-icons/money.png" class="money_image_modal" alt="Points">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--Jeg vil prøve at tilføje "rigtig" withdraw-container, men lige nu den er en knap-->
                <button type="button" class="btn btn-primary mx-auto text-white">Withdraw</button>
            </div>
        </div>
    </div>
</div>
