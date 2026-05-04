const form = document.querySelector('#queryForm');
const succes = document.querySelector(".success");
const error = document.querySelector(".error");

form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const query = document.querySelector('#sqlEditor').value.trim();

    if (!query) {
        error.innerHTML = '<div class="alert-reket">Requête vide.</div>';
        succes.style.display = "none";
        error.style.display = "block";
        return;
    }

    try {
        const formData = new FormData(form);
        formData.append('query', query);

        const reponse = await fetch("./api/requete.php", {
            method: "POST",
            body: formData
        });


        if (!reponse.ok) throw new Error("Erreur serveur (HTTP " + reponse.status + ")");
        const result = await reponse.json();

        if (result) {
            if (result.statut === "error") {
                error.innerHTML = `<div class="alert-reket">${result.data}</div>`;
                succes.style.display = "none";
                error.style.display = "block";
            } else {
                error.style.display = "none";
                succes.style.display = "block";
                succes.innerHTML = result.html; // data.data : tableau de lignes

            }
        }

    } catch (err) {
        console.log("Fetch error :", err);
    }
});
