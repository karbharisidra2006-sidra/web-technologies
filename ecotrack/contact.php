<?php include "config.php"; ?>

<form method="POST">
    Message: <textarea name="msg"></textarea>
    <button name="send">Send</button>
</form>

<?php
if(isset($_POST['send'])){
    echo "Message received!";
}
?>