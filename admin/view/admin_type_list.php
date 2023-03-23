<?php include('view/header.php'); ?> 


<?php if ($types) {  ?>
    <?php foreach ($types as $type) : ?>
        <div class="list__row">
            <div class="list__item">

                <p>ID: <?= $type['ID'] ?></p>

                <p>Type: <?= $type['type'] ?></p>
            </div>
            <div class="list__removeItem">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_type">
                    <input type="hidden" name="type_id" value="<?= $type['ID'] ?>">
                    <button>Remove</button>
                </form>
            </div>
            <br>
        </div>
    <?php endforeach; ?>

<?php } else { ?>
    <br>
    <?php if ($type_id) { ?>
        <p>No types currenty</p>
    <?php } else { ?>
        <p>No types currenty.</p>
    <?php } ?>
    <br>
<?php } ?>
</section>

<section>
    <h2>Add Type</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <div>

            <input type="hidden" name="action" value="add_type">
            <label>Type: </label>
            <input type="text" name="type_name" maxlength="50" placeholder="Type" required>

        </div>
        <div class="add_item">
            <button class="add-button-bold">add</button>
        </div>
    </form>
</section>

<p><a href=".?action=vehicals_list">View Vehicals</a></p>
<p><a href=".?action=add_vehicle">Add Vehicle</a></p>
<p><a href=".?action=list_classes">View Classes</a></p>
<p><a href=".?action=list_makes">View Makes</a></p>
<?php include('view/footer.php'); ?>
