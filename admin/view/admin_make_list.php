<?php include('view/header.php'); ?> 


<?php if ($makes) {  ?>
    <?php foreach ($makes as $make) : ?>
        <div class="list__row">
            <div class="list__item">

                <p>ID: <?= $make['ID'] ?></p>

                <p>Make: <?= $make['make'] ?></p>
            </div>
            <div class="list__removeItem">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_make">
                    <input type="hidden" name="make_id" value="<?= $make['ID'] ?>">
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
    <h2>Add Make</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <div>

            <input type="hidden" name="action" value="add_make">
            <label>Make: </label>
            <input type="text" name="make_name" maxlength="50" placeholder="make" required>

        </div>
        <div class="add_item">
            <button class="add-button-bold">add</button>
        </div>
    </form>
</section>

<p><a href=".?action=vehicals_list">View Vehicals</a></p>
<p><a href=".?action=add_vehicle">Add Vehicle</a></p>
<p><a href=".?action=list_types">View Types</a></p>
<p><a href=".?action=list_classes">View Classes</a></p>
<?php include('view/footer.php'); ?>