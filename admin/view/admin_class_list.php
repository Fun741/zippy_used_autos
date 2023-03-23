<?php include('view/header.php'); ?> 


<?php if ($classes) {  ?>
    <?php foreach ($classes as $class) : ?>
        <div class="list__row">
            <div class="list__item">

                <p>ID: <?= $class['ID'] ?></p>

                <p>Class: <?= $class['class'] ?></p>
            </div>
            <div class="list__removeItem">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_class">
                    <input type="hidden" name="class_id" value="<?= $class['ID'] ?>">
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
    <h2>Add Class</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <div>

            <input type="hidden" name="action" value="add_class">
            <label>Type: </label>
            <input type="text" name="class_name" maxlength="50" placeholder="class" required>

        </div>
        <div class="add_item">
            <button class="add-button-bold">add</button>
        </div>
    </form>
</section>

<p><a href=".?action=vehicals_list">View Vehicals</a></p>
<p><a href=".?action=add_vehicle">Add Vehicle</a></p>
<p><a href=".?action=list_types">View Types</a></p>
<p><a href=".?action=list_makes">View Makes</a></p>
<?php include('view/footer.php'); ?>