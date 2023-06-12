var tableau = document.getElementsByTagName("table")[0];
var thDate = tableau.getElementsByTagName("th")[5]; // Index 5 pour la colonne de date (base 0)
var lignes = Array.from(tableau.getElementsByTagName("tr")).slice(1);
var triAscendant = true;
var imgSort = document.getElementById("sortImg");

thDate.addEventListener("click", function() {
    lignes.sort(function(a, b) {
        var dateA = new Date(a.cells[5].textContent);
        var dateB = new Date(b.cells[5].textContent);

        if (triAscendant) {
            return dateA - dateB;
        } else {
            return dateB - dateA;
        }
    });

    triAscendant = !triAscendant;

    lignes.forEach(function(ligne) {
        tableau.appendChild(ligne);
    });

            // Changer l'image du mode de tri
            if (triAscendant) {
                imgSort.src = "../Assets/picture/icons8-down-button-64.png";
                imgSort.alt = "Ascendant";
            } else {
                imgSort.src = "../Assets/picture/icons8-slide-up-64.png";
                imgSort.alt = "Descendant";
            }
});