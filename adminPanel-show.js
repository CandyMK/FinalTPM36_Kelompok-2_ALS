document.addEventListener("DOMContentLoaded", function () {
    const teamList = document.querySelectorAll(".team");
    const searchInput = document.getElementById("team-search");
    const sortButton = document.getElementById("sort-button");
    const sortOptions = document.getElementById("sort-options");

    document.querySelectorAll(".edit").forEach(button => {
        button.addEventListener("click", function () {
            const teamName = this.closest(".team").querySelector("h2").innerText;
            window.location.href = `adminPanel-view.html?team=${encodeURIComponent(teamName)}`;
        });
    });

    document.querySelectorAll(".view").forEach(button => {
        button.addEventListener("click", function () {
            const teamName = this.closest(".team").querySelector("h2").innerText;
            window.location.href = `adminPanel-view.html?team=${encodeURIComponent(teamName)}`;
        });
    });

    document.querySelectorAll(".delete").forEach(button => {
        button.addEventListener("click", function () {
            const teamElement = this.closest(".team");
            const teamName = teamElement.querySelector("h2").innerText;

            const confirmation = confirm(`Are you sure you want to delete "${teamName}"?`);
            if (confirmation) {
                teamElement.remove();
                alert(`Team "${teamName}" has been deleted.`);
            }
        });
    });

    searchInput.addEventListener("input", function () {
        const searchText = searchInput.value.toLowerCase();
        teamList.forEach(team => {
            const teamName = team.querySelector("h2").innerText.toLowerCase();
            team.style.display = teamName.includes(searchText) ? "block" : "none";
        });
    });

    sortButton.addEventListener("click", function () {
        sortOptions.classList.toggle("hidden");
    });

    document.querySelectorAll(".sort-option").forEach(option => {
        option.addEventListener("click", function () {
            const sortType = this.getAttribute("data-sort");
            sortTeams(sortType);
            sortOptions.classList.add("hidden");
        });
    });

    function sortTeams(criteria) {
        const teamsContainer = document.querySelector(".teams");
        const teamsArray = Array.from(document.querySelectorAll(".team"));

        teamsArray.sort((a, b) => {
            const nameA = a.querySelector("h2").innerText.toLowerCase();
            const nameB = b.querySelector("h2").innerText.toLowerCase();
            const dateA = a.dataset.registrationDate;
            const dateB = b.dataset.registrationDate;

            switch (criteria) {
                case "name-asc":
                    return nameA.localeCompare(nameB);
                case "name-desc":
                    return nameB.localeCompare(nameA);
                case "oldest":
                    return new Date(dateA) - new Date(dateB);
                case "latest":
                    return new Date(dateB) - new Date(dateA);
                default:
                    return 0;
            }
        });

        teamsArray.forEach(team => teamsContainer.appendChild(team));
    }
});
