document.getElementById('searchInput').addEventListener('keyup', function() {
    var input = this.value.toLowerCase();
    var rows = document.querySelectorAll('#studentTable tr');

    rows.forEach(function(row) {
        var cells = row.getElementsByTagName('td');
        var found = false;

        for (var i = 0; i < cells.length; i++) {
            if (cells[i].textContent.toLowerCase().indexOf(input) > -1) {
                found = true;
                break;
            }
        }

        row.style.display = found ? '' : 'none';
    });
});