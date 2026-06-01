<!-- Kort på shop side -->
<div class="card shop_card" style="background: <?php echo $color; ?>" data-bs-toggle="modal" data-bs-target="#modal_<?php echo $id ?>">
    <!-- Billede -->
    <img src="<?php echo $img_src ?>" class="card-img-top" style="height: 100px; object-fit: cover;" alt=<?php echo $alt ?>>
    <!-- Tekst på kort -->
    <div class="card-body card_text">
        <!-- Points -->
        <h2 class="card-text card_h2"><?php echo $points ?></h2>
        <!-- Billede af penge -->
        <img src="img/icons/3d-icons/money.png" class="money_image_card" alt="Points">
    </div>
</div>
