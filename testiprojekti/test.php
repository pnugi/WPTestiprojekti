<html>
    <head></head>
    <body>

<?php
// Variables
$firstName = "Pentti";
$lastName = "Eerikainen";
$fullName = $firstName . " " . $lastName;

// Arrays
$post_ids = [1, 2, 3];
$post_titles = ['Hello World', 'PHP for WP', 'WP Development'];

// Function
// Declaration
function testFunction($variableName)
{
    echo "<p>Here is your '$variableName' test variable</p>";
}
// Calling function
testFunction('Jipii');

?>
<!-- Variables -->
<p>His name was <?php echo $fullName ?></p>

<!-- Foreach looping array -->
<?php
foreach ($post_ids as $ids) {
    echo $ids;
}
?>

    </body>
</html>