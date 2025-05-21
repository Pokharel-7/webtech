<?php
// Step 1: Write 100 integers to a file (or your test input for now)
$file = fopen("numbers.txt", "w");

// You can replace this with your own test input:
$sampleInput = [4,5,4,5,2,2,3,3,2,4]; // ← sample input
foreach ($sampleInput as $num) {
fwrite($file, $num . " ");
}

// Or write 100 random numbers (uncomment this if needed)
// for ($i = 0; $i < 100; $i++) {
//     fwrite($file, rand(1, 10) . " ");
// }

fclose($file);

// Step 2: Read 10 numbers at a time from the file
$file = fopen("numbers.txt", "r");
$allNumbers = [];

while (!feof($file)) {
$chunk = fread($file, 20); // Approx 10 numbers (2 characters + space)
$nums = array_filter(explode(" ", $chunk), 'is_numeric');
foreach ($nums as $num) {
$allNumbers[] = (int)$num;
}
}
fclose($file);

// Step 3: Count occurrences
$frequency = array_count_values($allNumbers);

// Step 4: Find numbers occurring odd number of times
echo "Output (odd occurrences): ";
foreach ($frequency as $num => $count) {
if ($count % 2 !== 0) {
echo $num . " ";
}
}
?>
