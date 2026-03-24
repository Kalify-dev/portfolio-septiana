<?php
header('Content-Type: text/plain');

echo "--- Filesystem Diagnostic ---\n";
echo "Current Directory: " . getcwd() . "\n";
echo "Public Path: " . (function_exists('public_path') ? public_path() : 'N/A') . "\n";
echo "Storage Path: " . (function_exists('storage_path') ? storage_path() : 'N/A') . "\n\n";

echo "--- Symlink Check ---\n";
$link = '/app/public/storage';
if (file_exists($link)) {
    echo "Symlink exists: $link\n";
    echo "Is link: " . (is_link($link) ? 'Yes' : 'No') . "\n";
    echo "Target: " . readlink($link) . "\n";
    echo "Is target readable: " . (is_readable(readlink($link)) ? 'Yes' : 'No') . "\n";
} else {
    echo "Symlink NOT found: $link\n";
}

echo "\n--- Volume Content (/app/storage/app/public) ---\n";
$target = '/app/storage/app/public';
if (is_dir($target)) {
    echo "Directory exists: $target\n";
    $files = scandir($target);
    print_r($files);
    
    if (is_dir("$target/img")) {
        echo "\nSubdir 'img' exists:\n";
        print_r(scandir("$target/img"));
    }
} else {
    echo "Target directory NOT found: $target\n";
}
?>
