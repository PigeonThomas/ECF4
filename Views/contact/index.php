<?php $title = "Mon portfolio - contact" ?>
<h2>Contactez-moi</h2>
<p>Vous pouvez me contacter via le formulaire ci-dessous :</p>

<!-- Affichage des messages d'erreur ou de succes -->
<?php if (!empty($erreur)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $erreur; ?>
    </div>
<?php endif; ?>
<?php if (!empty($success)) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $success; ?>
    </div>
<?php endif; ?>

<!-- Inclusion du formulaire de contact -->
<form action="index.php?controller=contact&action=index" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>