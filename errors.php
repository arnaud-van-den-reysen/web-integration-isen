<?php  if (count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger text-center" role="alert">
                <strong>Oh snap!</strong> <?php echo $error ?>
            </div>
        <?php endforeach ?>
    </div>
<?php  endif ?>
