<!-- Avatar komponent, som bruges på user.php mobile version og user-component på desktop version -->
    <div class="avatar_container">
        <!-- Avatar billede -->
        <img src="img/icons/3d-icons/avater.png" class="avatar" alt="Avatar"/>
        <!-- Settings knap -->
        <a class="settings_button" href="" onclick="alert('Funktion kommer snart')">
            <!-- Settings ikon -->
            <i class="fa-solid fa-gear"></i>
        </a>
    </div>
<!-- Brugernavn -->
    <h1 class="username"><?php echo $userData[0]->name?></h1>


