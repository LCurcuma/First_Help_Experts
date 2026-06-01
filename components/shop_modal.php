<!-- Modal til shop side -->
<div class="modal fade" id="modal_<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Selve modal -->
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <!-- Indhold -->
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <!-- Lukeknap -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Body af modal -->
            <div class="modal-body d-flex flex-column mx-3">
                <!-- Billede -->
                <img src="<?php echo $img_src ?>" alt="<?php echo $alt ?>" class="img-fluid border rounded-5 object-fit-cover height_modal_img mb-3">
                <!-- Tekst, som er navn, tekst om item og points, som den koster -->
                <div class="d-flex flex-row align-items-center justify-content-between mx-1">
                    <!-- Navn og beskrivelse -->
                    <div>
                    <h2 class="fw-bold"><?php echo $name ?></h2>
                    <p class="fw-bold fs-5"><?php echo $desc ?></p>
                    </div>
                    <!-- Points -->
                    <div class="d-flex flex-row align-items-center gap-3 modal_text">
                        <p class="fw-bold fs-4"><?php echo $points ?></p>
                        <img src="img/icons/3d-icons/money.png" class="money_image_modal" alt="Points">
                    </div>
                </div>
            </div>
            <!-- Withdraw knap I form af form, som sender data om points, som skal betales, og brugers id, som køber den ting -->
            <form method="post">
                <!-- Data, som sendes, når bruger klikker på knap -->
                <input type="hidden" name="withdraw_points" value="<?php echo $points ?>">
                <input type="hidden" name="user_id" value="<?php echo $userData[0]->id ?>">
                <!-- Footer af modal, som er selve withdraw knap -->
            <div class="modal-footer">
                <!-- Den er som knap, da knap kan have type="submit", som vi skal bruge for at indsende data fra form -->
                <button class="withdraw_button border-0" type="submit" onclick="startWithdraw(this.form)">
                    <!-- Runde knap, som gå fra venstre til højre, når du klikker på container -->
                    <div id="arrow_button" class="swipe_btn" style="position: relative; right: 30%;">
                        <!-- Pil -->
                        <i class="fa-solid fa-chevron-right" style="color: rgb(0, 0, 0);"></i>
                    </div>
                    <!-- Withdraw tekst på container -->
                    <p id="withdraw_text" class="withdraw">Withdraw</p>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>