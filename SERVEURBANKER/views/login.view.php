<?php ob_start(); ?>
    <form method="POST" action="<?= URL ?>back/connexion">
        <div class="mb-3">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="login">
        </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
        </div>
        <button type="submit" class="btn btn-dark">Valider</button>
    </form>
<?php 
$content= ob_get_clean();
$titre = "login ma couille";
require "views/commons/template.php";