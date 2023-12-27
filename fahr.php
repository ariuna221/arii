<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the temperature value from the form
    $temperature = $_POST['temperature'];

    // Check if the temperature is not empty
    if (!empty($temperature)) {
        // Convert Fahrenheit to Celsius
        $celsius = ($temperature - 32) * 5/9;
        echo "<p>Fahrenheit: $temperature°F</p>";
        echo "<p>Celsius: $celsius°C</p>";
    } else {
        echo "<p>Please enter a temperature value.</p>";
    }
}
?>

<form method="post" action="">
    <label for="temperature">Enter Fahrenheit temperature:</label>
    <input type="text" id="temperature" name="temperature" required>
    <button type="submit">Convert</button>
</form>
