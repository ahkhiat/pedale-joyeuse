document.addEventListener("DOMContentLoaded", () => {

    let factureContainer = document.getElementById("facture_container");
    
        if(factureContainer)
        {
            console.log("facture container script chargé")

            /* ------------------------ Ajout lignes sur facture ------------------------ */
            let btnAjoutLigne = document.querySelector("#btn_ajout_ligne");
            let lignesContainer = document.querySelector("#lignes_facture_container");
            let ligneInput = document.querySelector("#ligne_facture");
            let compteurLignes = 1;

            // let produits = ;
            let produits

            async function fetchProduits() {
                const res = await fetch("./api/fetch_produits.php", {
                    method: 'GET' 
                });
                produits = await res.json();
                console.log("produits :", produits);
                }
            async function getProduits() {
                await fetchProduits();
                }

        getProduits().then(() => {

            btnAjoutLigne.addEventListener("click", () => {

                let ligneFactureContainer = document.createElement("div");
                    ligneFactureContainer.classList.add("d-flex")
                    ligneFactureContainer.classList.add("justify-content-between")
                    ligneFactureContainer.classList.add("mb-3")

                let labelLigne = document.createElement("label")
                    labelLigne.setAttribute("class", "form-label")
                    labelLigne.innerText = "Ligne facture " + compteurLignes

                let selectProduit = document.createElement("select")
                    selectProduit.setAttribute("class", "form-select")
                    selectProduit.setAttribute("name", "produit")
                    selectProduit.classList.add("w-25")

                let defaultOption = document.createElement("option");
                    defaultOption.setAttribute("value", ""); 
                    defaultOption.textContent = "Produit"; 
                    defaultOption.setAttribute("selected", "selected"); 
                
                selectProduit.appendChild(defaultOption)

                produits.forEach(produit => {
                    console.log(produit)
                    let optionSelect = document.createElement("option")
                        optionSelect.value = produit.id;
                        optionSelect.text = produit.name
                    selectProduit.appendChild(optionSelect)

                })

                let selectQuantite = document.createElement("input")
                    selectQuantite.setAttribute("type", "number")
                    selectQuantite.setAttribute("placeholder", "Quantité")
                    selectQuantite.classList.add("form-control")
                    selectQuantite.classList.add("w-25")

                ligneFactureContainer.appendChild(labelLigne)    
                ligneFactureContainer.appendChild(selectProduit)
                ligneFactureContainer.appendChild(selectQuantite)

                lignesContainer.appendChild(ligneFactureContainer)

                compteurLignes++;
                })

        })

            

        }

})


   



