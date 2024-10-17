<?php while ($car = mysqli_fetch_array($cars)) { ?>
    <option value="<?= $car['id']; ?>"><?= $car['name']; ?></option>
<?php } ?>