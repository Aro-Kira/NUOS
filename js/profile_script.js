document.addEventListener("DOMContentLoaded", function () {
    const studentId = 2023133013; // Replace with actual student ID

    fetch(`fetch_profile.php?student_id=${studentId}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                let student = data[0];

                // Update profile details
                document.querySelector(".profile-container h2 strong").textContent = student.full_name;
                document.querySelector(".profile-container p").textContent = `Student ID: ${student.student_id}`;

                document.querySelector(".info-card").innerHTML = `
                    <p><strong>Full Name:</strong> ${student.full_name}</p>
                    <p><strong>Email:</strong> ${student.school_email}</p>
                    <p><strong>Description:</strong> ${student.user_description}</p>
                `;

                // Display organizations
                // let orgContainer = document.querySelector(".organizations");
                // orgContainer.innerHTML = ""; // Clear previous content

                // data.forEach(org => {
                //     if (org.org_name && org.org_logo) {
                //         let orgCard = document.createElement("div");
                //         orgCard.classList.add("org-card");
                //         orgCard.innerHTML = `
                //             <img src="${org.org_logo}" alt="Org Logo" onerror="this.src='default-logo.png';">
                //             <p>${org.org_name}</p>
                //         `;
                //         orgContainer.appendChild(orgCard);
                //     }
                // });
            // } else {
            //     console.log("No data found.");
            //     document.querySelector(".info-card").innerHTML = "<p>No profile data available.</p>";
            }
        })
        .catch(error => console.error("Error fetching profile:", error));
});
