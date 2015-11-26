<?php include "../view/header.php"; ?>
<div id="main"><h2>Change password</h2>
    <form action="." method="post">
        <fieldset>
            <p>
                <label for="current_password">Current Password</label>
                <input type="text" id="current_password" name="current_password" value="<?= $current_password ?>" maxlength="40" />
            </p>
            <p>
                <label for="new_password">New Password</label>
                <input type="text" id="new_password" name="new_password" value="<?= $new_password ?>" maxlength="40" />
            </p>
            <p>
                <label for="phpro_username">Confirm New Password</label>
                <input type="text" id="confirmed_password" name="confirmed_password" value="<?= $confirmed_password ?>" maxlength="40" />
            </p>
            <p>
                <button  type="button" onclick="window.location='.?action=show_user_form';return false;">&rarr; Cancel</button>
                <input type="submit" value="&rarr; Modify" />
                <input type="hidden" name="action" value="change_password" />
            </p>
        </fieldset>
    </form></div>

<?php include "../view/footer.php"; ?>