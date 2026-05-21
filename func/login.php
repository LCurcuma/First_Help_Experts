<?php
/**
 * @var db $db
 */

require "settings/init.php";
//$users = $db->sql("SELECT * FROM users");
?>

<script>
    function login(username, password){
        //tager data af alle user fra database
        <?php $data = $db->sql("SELECT * FROM users"); ?>
        //converterer til json, so JavaScript kan læse det
        const users = <?php echo json_encode($data); ?>;
        let success = false;
        let id = null;
        //looper imellem alle users
        users.forEach((user, index) => {
            //hvis brugernavn og adgangskode er rigtig for en af alle bruger
            if(username === user.username && password === user.password){
                //success er true og står data om den id af rigtig bruger
                success = true;
                id = index + 1; //+1 da arrays starter med id 0, men database starter med id 1
            }
        })

        //hvis success, så kommer bruger til forside, som har id af bruger
        if(success){
            window.location.href = `forside.php?id=${id}`;
            //ellers informere, at brugernavn eller adgangskode er forkert
        } else {
            alert("Wrong username or password");
        }
    }
</script>
