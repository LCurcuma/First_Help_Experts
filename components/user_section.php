<div class="top_container">
    <!--the container with points-->
    <?php include "components/money_container.php" ?>
</div>
<!--the avatar container-->
<?php include "components/avatar.php" ?>
<!--the score container-->
<?php include "components/score_container_user.php" ?>
<!--container med links-->
<section class="links_section_desk">
    <a href="#" class="link_tile_desk" style="background: linear-gradient(180deg, #b68ed1 0%, #826099 100%);" onclick="alert('Funktion kommer snart')">
        <h2 class="h2_bold">Check ind</h2>
        <div class="plus_money_desk">
            <h2>+5</h2>
            <img src="img/icons/3d-icons/money.png" class="money_plus_image_desk" alt="Points">
        </div>
    </a>
    <a href="shop.php?id=<?php echo $id?>" class="link_tile_desk" style="background: linear-gradient(180deg, #fcc260 0%, #daa953 100%);">
        <div>
            <h2 class="h2_bold">Point shop</h2>
            <p>350 tilgængelige rewards</p>
        </div>
        <img src="img/icons/3d-icons/money.png" class="money_image_big" alt="Points">
    </a>
    <a href="#" class="link_tile_desk" style="background: linear-gradient(180deg, #77e37d 0%, #46b14c 100%);" onclick="alert('Funktion kommer snart')">
        <div>
            <h2 class="h2_bold_desktop_small">Din førstehjælps<br/>bevis</h2>
            <h2 class="h2_bold_desktop_big">Din førstehjælpsbevis</h2>
            <p>Gyldig til <span>12.04.2026</span></p>
        </div>
        <img src="img/icons/3d-icons/checkmark2.png" class="money_image_big" alt="Check">
    </a>
</section>

<a href="index.php" class="logout">Log ud</a>
