<?php
header('Content-Type: text/plain');
echo "--- Link Debug ---\n";
echo "Current Dir: " . getcwd() . "\n";
$target = __DIR__ . '/storage';
if (file_exists($target)) {
    echo "Path 'storage' exists: $target\n";
    echo "Is link: " . (is_link($target) ? 'Yes' : 'No') . "\n";
    if (is_link($target)) {
        echo "Link target: " . readlink($target) . "\n";
    }
} else {
    echo "Path 'storage' DOES NOT EXIST in " . __DIR__ . "\n";
}

$volume = '/app/storage/app/public';
echo "\n--- Volume Check ---\n";
if (is_dir($volume)) {
    echo "Volume dir exists: $volume\n";
    echo "Readable: " . (is_readable($volume) ? 'Yes' : 'No') . "\n";
    echo "Files in volume/img:\n";
    print_r(scandir($volume . '/img'));
} else {
    echo "Volume dir NOT found: $volume\n";
}
?>
