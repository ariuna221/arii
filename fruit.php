<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pass Values Between Listboxes</title>
</head>
<body>

<!-- First Select (All Fruits) -->
<label for="allFruits">All Fruits:</label>
<select id="allFruits" multiple>
    <option value="apple">Apple</option>
    <option value="banana">Banana</option>
    <option value="orange">Orange</option>
    <option value="grape">Grape</option>
    <option value="kiwi">Kiwi</option>
</select>

<!-- Buttons for Transfer -->
<button onclick="moveSelected('allFruits', 'selectedFruits')">Add to Selection</button>
<button onclick="moveSelected('selectedFruits', 'allFruits')">Remove from Selection</button>

<!-- Second Select (Selected Fruits) -->
<label for="selectedFruits">Selected Fruits:</label>
<select id="selectedFruits" multiple></select>

<script>
    function moveSelected(sourceId, destinationId) {
        var sourceSelect = document.getElementById(sourceId);
        var destinationSelect = document.getElementById(destinationId);

        // Move selected options from source to destination
        for (var i = 0; i < sourceSelect.options.length; i++) {
            if (sourceSelect.options[i].selected) {
                var optionClone = sourceSelect.options[i].cloneNode(true);
                destinationSelect.appendChild(optionClone);
                sourceSelect.remove(i);
                i--;
            }
        }
    }
</script>

</body>
</html>
