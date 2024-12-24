<?php
    $_SESSION['avatar'] = checkAvatar() ?? "profile.jpg";
    if (isset($_FILES)) {
        addAvatar();
    }