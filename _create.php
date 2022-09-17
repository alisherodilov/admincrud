<?php
ini_set('display_errors', 1);

include './partials/_config.php';
include './partials/_header.php';

$result = $baza->query("select * from $tablename");


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
                <h4 class="card-title">CREATE <?= strtoupper($tablename) ?></h4>
                <form class="forms-sample" action="store.php" method="POST">




                    <?php
                    foreach ($cols_array as $cols) :
                    ?>

                        <div class="form-group">
                            <label for="<?= $cols; ?> "><?= $cols ?> </label>
                            <input class="form-control" type="text" name="<?= $cols ?>" id="<?= $cols; ?> " placeholder="Enter <?= $cols ?> ">
                        </div>


                    <?php
                    endforeach;
                    ?>




                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="index.php" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include './partials/_footer.php';
?>