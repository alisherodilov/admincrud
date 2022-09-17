<span class="float-none float-sm-left d-block mt-1 mt-sm-0 text-center"><a class="btn btn-success px-4 py-3 mr-2" href="../_createCrud.php">Create CRUD</a><a class="btn btn-outline-success px-4 py-3" href="../download.php">Download project</a></span>
<?php



$rootPath = realpath('./main');
$zip = new ZipArchive();
$zip->open('main.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

$files = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($rootPath),
  RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
  if ($name != 'download.php') {
    if (!$file->isDir()) {
      $filePath = $file->getRealPath();
      $relativePath = substr($filePath, strlen($rootPath) + 1);

      $zip->addFile($filePath, $relativePath);
    }
  }
}

$zip->close();

header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename = main.zip');
header('Content-Length:' . filesize('main.zip'));
header("Location: ./main.zip");
?>