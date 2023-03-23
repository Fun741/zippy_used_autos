<?php include('view/header.php'); ?> 
<?php //include('view/main.css'); ?> 

<?php //type seclection  ?> 

    <section id="list" class="list">
        <header class="list_row_header">
            <h1>Vehical Options List</h1>
            <form action="." method="post" id="list_header_select" class="list_header_select">
                <input type="hidden" name="action" value="list_items">

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
                
                <input type="hidden" name="action" value="list_items">
                    <select name="year_price" required>
                        <option value="1">price</option>
                        <option value="2">year</option>
                    </select>

                <button class="add_button_bold">Select</button>
            </form>
        </header>
    </section>




<?php if ($vehicles) {  ?>
        <?php foreach ($vehicles as $vehicle) : ?>
            <div class="list__row">
                <div class="list__item">

                    <p>Year: <?= $vehicle['year'] ?></p>

                    <p>Model: <?= $vehicle['model'] ?></p>

                    <p>Price: <?= $vehicle['price'] ?></p>

                    <p>Type: <?= $vehicle['type'] ?></p>

                    <p>Class: <?= $vehicle['class'] ?></p>

                    <p>Make: <?= $vehicle['make'] ?></p>

                    <br>

                </div>

            </div>
        <?php endforeach; ?>

    <?php } else { ?>
        <br>
        <?php if ($type_id) { ?>
            <p>No tasks for this category.</p>
        <?php } else { ?>
            <p>No vehicals currently.</p>
        <?php } ?>
        <br>
    <?php } ?>
</section>