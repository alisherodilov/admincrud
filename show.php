<?php
include './partials/_header.php';

include './partials/_config.php';

$id = $_GET['id'];
$result = $baza->query("select * from $tablename where id = $id");


$fetch_fields = $result->fetch_fields();
$cols_count = count($fetch_fields);
$cols_array = [];

for ($i = 0; $i < $cols_count; $i++) {
    $cols_array[] = $fetch_fields[$i]->orgname;
}

if (in_array('id', $cols_array)) {
    $inde_of_id = array_search('id', $cols_array);
    unset($cols_array[$inde_of_id]);
}

?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="change.php" method="post">
                    <input type="hidden" value="<?= $id ?>" name="id">
                    <?php

                    while ($row = $result->fetch_assoc()) {
                        foreach ($cols_array as $cols) {
                    ?>

                            <div class="form-group">
                                <label for="<?= $cols; ?> "><?= $cols ?> </label>
                                <input readonly class="form-control bg-dark" type="text" name="<?= $cols ?>" id="<?= $cols; ?> " placeholder="Enter <?= $cols ?>" value="<?= $row[$cols] ?>">
                            </div>


                    <?php
                        }
                    }
                    ?>

                    <a href="index.php" class="btn btn-dark">Exit</a>
                </form>
            </div>
        </div>
    </div>
</div>






<?php
include './partials/_footer.php';

?>