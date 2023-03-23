<section>
    <h2>Add Vehical</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <div>
            <input type="hidden" name="action" value="add_vehicle2">
            <label>year: </label>
            <input type="text" name="year" maxlength="4" placeholder="year" required>
            <label>model: </label>
            <input type="text" name="model" maxlength="50" placeholder="model" required>
            <label>year: </label>
            <input type="text" name="price" maxlength="15" placeholder="price" required>

            <select name="type_id" required>
                    <option value="0">Types</option>
                    <?php foreach ($types as $type) : ?>
                        <?php if ($type_id == $type['ID']) { ?>
                            <option value="<?= $type['ID']; ?>" selected>
                            <?php } else { ?>
                            <option value="<?= $type['ID']; ?>">
                            <?php } ?>
                            <?= $type['type']; ?>
                            </option>
                        <?php endforeach; ?>
                </select>

                <select name="class_id" required>
                    <option value="0">Classes</option>
                    <?php foreach ($classes as $class) : ?>
                        <?php if ($class_id == $class['ID']) { ?>
                            <option value="<?= $class['ID']; ?>" selected>
                            <?php } else { ?>
                            <option value="<?= $class['ID']; ?>">
                            <?php } ?>
                            <?= $class['class']; ?>
                            </option>
                        <?php endforeach; ?>
                </select>

                <select name="make_id" required>
                    <option value="0">Makes</option>
                    <?php foreach ($makes as $make) : ?>
                        <?php if ($make_id == $make['ID']) { ?>
                            <option value="<?= $make['ID']; ?>" selected>
                            <?php } else { ?>
                            <option value="<?= $make['ID']; ?>">
                            <?php } ?>
                            <?= $make['make']; ?>
                            </option>
                        <?php endforeach; ?>
                </select> 

        </div>
        <div class="add_item">
            <button class="add-button-bold">add</button>
        </div>
    </form>
</section>

<p><a href=".?action=vehicals_list">View Vehicals</a></p>
<p><a href=".?action=list_types">View Types</a></p>
<p><a href=".?action=list_classes">View Classes</a></p>
<p><a href=".?action=list_makes">View Makes</a></p>
<?php include('view/footer.php'); ?>