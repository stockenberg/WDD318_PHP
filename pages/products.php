
<?php
/**
 * @var \app\dtos\Products $product
 */
foreach ($app->data as $product) :
?>
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?= $product->getTitle(); ?></h5>
        <p class="card-text"><?= $product->getDescription(); ?></p>
        <a href="?p=products&action=addToCart&id=<?= $product->getId(); ?>" class="btn btn-primary">Add to Cart</a>
    </div>
</div>
<?php endforeach; ?>


<!--
       ...

    Holen alle Produkte aus der DB
    Warenkorb Button -> klick
        SPeichern der Produkte in die Session


    warenkorb page
        auslesen der Produkte

 -->