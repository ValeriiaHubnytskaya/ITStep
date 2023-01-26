

<div class='profile-container'>
    <h1><?= $_PROF_DATA['title'] ?></h1>
    
    <img class='profile-avatar' src='/avatars/<?= empty($_PROF_DATA['avatar']) ? 'no-avatar.png' : $_PROF_DATA['avatar'] ?>' alt="avatar">
    
    <h3>Welcome,</h4>
    
    <h2 class='profile-name'><?= $_PROF_DATA['name'] ?></h3>
    
    <table class='profile-table' >
        <tr>
            <td>Login</td>
            <td><span class='profile-input' id='user-login' <?= @$is_my_profile ? 'contenteditable' : '' ?> ><?= $_PROF_DATA['login'] ?></span></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><span class='profile-input' id='user-name' <?= @$is_my_profile ? 'contenteditable' : '' ?>><?= $_PROF_DATA['name'] ?></span></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><span class='profile-input' type="email" id='user-email' <?= @$is_my_profile ? 'contenteditable' : '' ?> ><?= $_PROF_DATA['email'] ?></span></td>
        </tr>
    </table>

   
</div>