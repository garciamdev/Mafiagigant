<?php
/**
 * Einstellungen – Account verwalten: Passwort, E-Mail, Geschlecht, Profil.
 * Passwort-Hash wie im Spiel: sha1(md5(trim($pass))).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- Passwort ändern ---
    if (isset($_POST['change_password'])) {
        $cur = isset($_POST['current']) ? trim($_POST['current']) : '';
        $new = isset($_POST['new']) ? trim($_POST['new']) : '';
        $rep = isset($_POST['repeat']) ? trim($_POST['repeat']) : '';
        $curhash = sha1(md5($cur));

        if ($curhash !== $userdata[0]['password']) {
            $errors[] = "Dein aktuelles Passwort ist falsch.";
        } elseif (strlen($new) < 6) {
            $errors[] = "Das neue Passwort muss mindestens 6 Zeichen lang sein.";
        } elseif ($new !== $rep) {
            $errors[] = "Die neuen Passwörter stimmen nicht überein.";
        } else {
            $newhash = sha1(md5($new));
            $db->where(['id' => $userdata[0]['id']])->update('users', ['password' => $newhash]);
            $userdata[0]['password'] = $newhash;
            $success[] = "Passwort erfolgreich geändert. ✅";
        }
    }

    // --- Profil/Account ändern ---
    if (isset($_POST['change_profile'])) {
        $email   = isset($_POST['email']) ? trim($_POST['email']) : '';
        $gender  = isset($_POST['gender']) ? $_POST['gender'] : 'none';
        $profile = isset($_POST['profile']) ? trim($_POST['profile']) : '';

        if (!in_array($gender, ['none', 'male', 'female'], true)) { $gender = 'none'; }
        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Bitte gib eine gültige E-Mail-Adresse ein.";
        } elseif (mb_strlen($profile) > 2000) {
            $errors[] = "Dein Profiltext ist zu lang (max. 2000 Zeichen).";
        } else {
            $db->where(['id' => $userdata[0]['id']])->update('users', [
                'email'   => $email,
                'gender'  => $gender,
                'profile' => $profile,
            ]);
            $userdata[0]['email']   = $email;
            $userdata[0]['gender']  = $gender;
            $userdata[0]['profile'] = $profile;
            $success[] = "Profil gespeichert. ✅";
        }
    }
}
