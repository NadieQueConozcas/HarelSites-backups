<?php
$filename = basename(dirname(__DIR__)) . '_' . uniqid() . '.zip';
$directory = __DIR__;
$zip = new ZipArchive();
$tempFile = tempnam(sys_get_temp_dir(), 'zip');

if (!$tempFile) {
    die('Failed to create temporary file');
}

if ($zip->open($tempFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
    try {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
        foreach ($files as $file) {
            if (!$file->isDir() && $file->getFilename() !== 'send-zip.php' && $file->getFilename() !== '.htaccess') {
                $filePath = $file->getRealPath();
                $localPath = substr($filePath, strlen($directory) + 1);
                $zip->addFile($filePath, $localPath);
            }
        }
        $zip->close();

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($tempFile));
        readfile($tempFile);
        unlink($tempFile);

        exit;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Failed to create zip archive';
}
?>
