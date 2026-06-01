<!-- User-secrtion, som bruges på desktop version af forside og shop side -->
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
    <!-- Hvis check in date er ikke tomt -->
    <?php if(!EMPTY($userData[0]->check_in_date)){
        //Tager sidste check in date fra database
        $currentDate = $userData[0]->check_in_date;
        //Hvis man checked in ikke i dag
        if($today !== $currentDate){
            //tilføje form, som man kan trykke på for at tjekke ind
            echo '<form method="post" class="form_tile_desk">
                <input type="hidden" name="add_points" value="'.$add_points.'">
                <input type="hidden" name="check_in_date" value="'.$today.'">
                <input type="hidden" name="user_id" value="'.$userData[0]->id.'">
            <button class="link_tile_check_desk" type="submit" style="background: linear-gradient(180deg, #b68ed1 0%, #826099 100%);">
            <h2 class="h2_bold">Check ind</h2>
            <div class="plus_money_desk">
                <h2 class="plus_number">+5</h2>
                <img src="img/icons/3d-icons/money.png" class="money_plus_image_desk" alt="Points">
            </div>
            </button>
        </form>';
            //ellers tilføjer knap, som viser, at man checked ind
        }else{
            echo '<div class="link_tile_desk" style="background: linear-gradient(180deg, #cdc9d5 0%, #98949e 100%);">
            <h2 class="h2_bold">Næste check ind er i morgen</h2>
            <div class="plus_money_desk">
                <h2 class="plus_number">+5</h2>
                <img src="img/icons/3d-icons/money.png" class="money_plus_image_desk" alt="Points">
            </div>
            </div>
';
            //hvis date er tomt, tilføje form igen
        }}else{
        echo '<form method="post" class="form_tile_desk">
                <input type="hidden" name="add_points" value="'.$add_points.'">
                <input type="hidden" name="check_in_date" value="'.$today.'">
                <input type="hidden" name="user_id" value="'.$userData[0]->id.'">
            <button class="link_tile_check_desk" type="submit" style="background: linear-gradient(180deg, #b68ed1 0%, #826099 100%);">
            <h2 class="h2_bold">Check ind</h2>
            <div class="plus_money_desk">
                <h2 class="plus_number">+5</h2>
                <img src="img/icons/3d-icons/money.png" class="money_plus_image_desk" alt="Points">
            </div>
            </button>
        </form>';
    }?>
    <!-- Link til shop side -->
    <a href="shop.php?id=<?php echo $id?>" class="link_tile_desk" style="background: linear-gradient(180deg, #fcc260 0%, #daa953 100%);">
        <div>
            <h2 class="h2_bold">Point shop</h2>
            <p>350 tilgængelige rewards</p>
        </div>
        <img src="img/icons/3d-icons/money.png" class="money_image_big" alt="Points">
    </a>
    <!-- Din førstehjælpsvbevis knap -->
    <a href="#" class="link_tile_desk" style="background: linear-gradient(180deg, #77e37d 0%, #46b14c 100%);" onclick="alert('Funktion kommer snart')">
        <div>
            <h2 class="h2_bold_desktop_small">Din førstehjælps<br/>bevis</h2>
            <h2 class="h2_bold_desktop_big">Din førstehjælpsbevis</h2>
            <p>Gyldig til <span>12.04.2026</span></p>
        </div>
        <img src="img/icons/3d-icons/checkmark2.png" class="money_image_big" alt="Check">
    </a>
</section>
<!-- Log ud knap, som redirekter til index side -->
<a href="index.php" class="logout">Log ud</a>
