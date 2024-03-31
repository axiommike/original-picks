// searchFunction.js
document.addEventListener("DOMContentLoaded", function() {
    // Add input event listener to dynamically filter the table
    var input = document.getElementById("myInput");
    input.addEventListener("input", filterTable);

    function filterTable() {
        // Declare variables
        var filter = input.value.toUpperCase();
        var table = document.getElementById("myTable");
        var rows = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those that don't match the search query
        for (var i = 1; i < rows.length; i++) {
            var playerCell = rows[i].getElementsByTagName("td")[0]; // Assuming the player name is in the first column

            if (playerCell) {
                var playerName = playerCell.textContent || playerCell.innerText;

                if (playerName.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
});
