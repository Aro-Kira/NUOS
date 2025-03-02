document.addEventListener("DOMContentLoaded", () => {
    const acadGridContainer = document.getElementById("acad-grid-container");
    const nonAcadGridContainer = document.getElementById("non-acadgrid-container");

    // Fetch data from the server
    fetch("fetch_orgs.php")
        .then(response => response.json())
        .then(data => {
            const acadCards = data.filter(org => org.org_type_id === 1);
            const nonAcadCards = data.filter(org => org.org_type_id === 2);

            generateCards(acadCards, acadGridContainer);
            generateCards(nonAcadCards, nonAcadGridContainer);
        })
        .catch(error => console.error("Error fetching organization data:", error));

    // Function to generate cards
    function generateCards(cards, container) {
        container.innerHTML = ""; // Clear container first
        cards.forEach((cardData) => {
            const card = document.createElement("div");
            card.classList.add("card");
            card.setAttribute("data-id", cardData.org_id);

            card.innerHTML = `
                <img src="${cardData.org_logo}" alt="${cardData.org_name}">
                <div class="card-label">${cardData.org_name}</div>
                <button class="join-btn" onclick="joinOrganization(${cardData.org_id}, '${cardData.org_name}', '${cardData.org_logo}')">Join</button>
            `;

            container.appendChild(card);
        });
    }
});

// Redirect function
function joinOrganization(id, name, image) {
    window.location.href = `org_page.php?id=${id}&name=${encodeURIComponent(name)}&image=${encodeURIComponent(image)}`;
}
