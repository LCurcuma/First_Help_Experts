<?php
/**
 * @var db $db
 */

require "settings/init.php";
//$users = $db->sql("SELECT * FROM users");
?>

<script>
    function login(username, password){
        <?php $data = $db->sql("SELECT * FROM users"); ?>
        const users = <?php echo json_encode($data); ?>;
        let success = false;
        let id = null;
        users.forEach((user, index) => {
            if(username === user.username && password === user.password){
                success = true;
                id = index + 1;
            }
        })

        if(success){
            window.location.href = `forside.php?id=${id}`;
        } else {
            alert("Wrong username or password");
        }
    }
</script>
