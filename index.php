<?php
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
include './partials/_config.php';
include './partials/_header.php';
$result = $baza->query("select * from $tablename");
$fetch_fieldlar = $result->fetch_fields();
$cols_count = count($fetch_fieldlar);


if ($result) {
?>

    <div class="page-header">
        <h3 class="page-title"><?= strtoupper($tablename) ?><br></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $tablename ?></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <a class="btn btn-success mb-4 justify-content-end" data-bs-toggle="modal" data-bs-target="#exampleModal2">Add column</a>
                                    <a class="btn btn-info mb-4 mx-2" href="_create.php">Crete <?= $tablename ?></a>
                                </tr>
                                <tr>
                                    <?php
                                    for ($i = 0; $i < $cols_count; $i++) {
                                        echo "<th>" . $fetch_fieldlar[$i]->name . "</th>";
                                    }
                                    ?>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    echo "<tr>";
                                    for ($i = 0; $i < $cols_count; $i++) {
                                        echo "<td>" . $row[$fetch_fieldlar[$i]->orgname] . "</td>";
                                    }
                                ?>
                                    <td style="font-size: 20px;">
                                        <a class="" href="show.php?id=<?= $id ?>"><i class="mdi mdi-eye"></i></a>
                                        <a class="" href="update.php?id=<?= $id ?>"><i class="mdi mdi-border-color"></i></a>
                                        <a class="" href="delete.php?id=<?= $id ?>"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                <?php
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==== -->

    <!-- ==== -->

    <!-- main-panel ends -->
<?php
}
include './partials/_footer.php';
?>