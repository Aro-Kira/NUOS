document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const findOrgButton = document.getElementById('find-org-button');
    const findOrgModal = document.getElementById('find-org-modal');
    const findOrgModalCloseButton = findOrgModal.querySelector('.close-button');
    const orgSearchInput = document.getElementById('org-search');
    const orgList = document.getElementById('org-list');
    const productCards = document.querySelectorAll('.product-card');

    // Organization Details Modal
    const orgDetailsModal = document.getElementById('org-details-modal');
    const closeOrgDetailsButton = document.getElementById('close-org-details');
    const orgPicture = document.getElementById('org-picture');
    const orgNameElement = document.getElementById('org-name');
    const orgDescriptionElement = document.getElementById('org-description');
   

    // Manage Events Modal
    const manageEventsModal = document.getElementById("manage-events-modal");
    const openManageEventsButton = document.getElementById("open-manage-events");
    const closeManageEventsButton = document.getElementById("close-manage-events");

    const eventTitleInput = document.getElementById("event-title");
    const eventDateInput = document.getElementById("event-date");
    const eventLocationInput = document.getElementById("event-location");
    const eventDescriptionInput = document.getElementById("event-description");
    const eventList = document.getElementById("event-list");
    const saveEventButton = document.getElementById("save-event");

    // Additional Info Modal
    const additionalInfoModal = document.getElementById('additional-info-modal');
    const closeAdditionalInfoButton = document.getElementById('close-additional-info');
    const additionalInfoTitle = document.getElementById('additional-info-title');
    const additionalInfoContent = document.getElementById('additional-info-content');

    // Modals
    const joinRequestsModal = document.getElementById("join-requests-modal");
    const applicationDetailsModal = document.getElementById("application-details-modal");
    const viewMembersModal = document.getElementById("view-members-modal");

    // Buttons
    const seeRequestsBtn = document.getElementById("open-join-requests");
    const viewMembersBtn = document.getElementById("open-view-members");
    const closeRequestsBtn = document.getElementById("close-join-requests");
    const closeApplicationBtn = document.getElementById("close-application-details");
    const closeMembersBtn = document.getElementById("close-view-members");

    // Containers
    const requestList = document.getElementById("request-list");
    const membersList = document.getElementById("members-list");

    // Application Details Elements
    const applicantNameEl = document.getElementById("applicant-name");
    const applicantStudentNumberEl = document.getElementById("applicant-student-id");
    const applicantProgramEl = document.getElementById("applicant-program");
    const applicantSectionEl = document.getElementById("applicant-section");
    const applicantEmailEl = document.getElementById("applicant-email");
    const applicantContactEl = document.getElementById("applicant-contact");
    const applicantAddressEl = document.getElementById("applicant-address");
    const applicantSkillsEl = document.getElementById("applicant-skills");
    const applicantReasonEl = document.getElementById("applicant-reason");

    // Sample Join Requests Data
    const joinRequests = [
        {
            name: "John Doe",
            studentNumber: "2019101234",
            program: "BSIT",
            section: "A",
            email: "johndoe@email.com",
            contact: "09123456789",
            address: "123 Street, City",
            skills: "HTML, CSS, JavaScript",
            reason: "I love programming clubs!"
        },
        {
            name: "Jane Smith",
            studentNumber: "201910567",
            program: "BSIT",
            section: "B",
            email: "janesmith@email.com",
            contact: "09123456789",
            address: "456 Avenue, Town",
            skills: "Python, Java, C++",
            reason: "I want to improve my coding skills."
        },
        {
            name: "Mark Lee",
            studentNumber: "201910890",
            program: "BSIT",
            section: "C",
            email: "marklee@email.com",
            contact: "09123456789",
            address: "789 Road, Province",
            skills: "React, Node.js, MongoDB",
            reason: "Looking for a tech community!"
        }
    ];

    // Approved Members Data
    const members = [];

    // Mock organization data (replace with actual data fetching)
    const organizations = [{
            id: 'codability-tech',
            name: 'Codability Tech',
            description: 'For students passionate about technology and coding.',
            imageUrl: 'coda2.png'
        },
        {
            id: 'green-earth-alliance',
            name: 'Green Earth Alliance',
            description: 'Focused on environmental sustainability.',
            imageUrl: 'green2.png'
        },
        {
            id: 'campus-film-club',
            name: 'Campus Film Club',
            description: 'A community for film enthusiasts and aspiring filmmakers.',
            imageUrl: 'film2.png'
        },
        {
            id: 'debate-dynamics',
            name: 'Debate Dynamics',
            description: 'Sharpening critical thinking and public speaking skills.',
            imageUrl: 'debate.png'
        },
        {
            id: 'literary-quill-society',
            name: 'Literary Quill Society',
            description: 'Celebrating creative writing, poetry, and literature.',
            imageUrl: 'quill.png'
        },
        {
            id: 'entrepreneurship-hub',
            name: 'Entrepreneurship Hub',
            description: 'For aspiring student entrepreneurs and business leaders.',
            imageUrl: 'brain.png'
        },
        {
            id: 'artistic-vibes-collective',
            name: 'Artistic Vibes Collective',
            description: 'A haven for visual artists, designers, and creatives.',
            imageUrl: 'paint.png'
        },
        {
            id: 'global-cultures-club',
            name: 'Global Cultures Club',
            description: 'Promoting cultural exchange and diversity awareness.',
            imageUrl: 'culture.png'
        },
        {
            id: 'health-wellness-advocates',
            name: 'Health & Wellness Advocates',
            description: 'Encouraging mental health, fitness, and well-being.',
            imageUrl: 'helti.png'
        },
        {
            id: 'campus-music-guild',
            name: 'Campus Music Guild',
            description: 'Uniting students with a passion for music, bands, and performances.',
            imageUrl: 'mujic.png'
        },
        {
            id: 'women-in-leadership-network',
            name: 'Women in Leadership Network',
            description: 'Empowering future female leaders on campus.',
            imageUrl: 'leadership.png'
        },
        {
            id: 'astronomy-enthusiasts-club',
            name: 'Astronomy Enthusiasts Club',
            description: 'Exploring the wonders of the universe through stargazing and discussions.',
            imageUrl: 'astro.png'
        },
        {
            id: 'robotics-ai-society',
            name: 'Robotics & AI Society',
            description: 'Building the future with robotics, AI, and innovation projects.',
            imageUrl: 'robot.png'
        },
        {
            id: 'sports-recreation-council',
            name: 'Sports & Recreation Council',
            description: 'Organizing intramurals, tournaments, and fitness programs.',
            imageUrl: 'sports.png'
        },
        {
            id: 'photography-explorers-group',
            name: 'Photography Explorers Group',
            description: 'Capturing stories through lenses and photo walks.',
            imageUrl: 'photo.png'
        },
        {
            id: 'volunteer-corps',
            name: 'Volunteer Corps',
            description: 'Dedicated to community service and outreach programs.',
            imageUrl: 'volunteer2.png'
        },
        {
            id: 'finance-investment-club',
            name: 'Finance & Investment Club',
            description: 'For students interested in personal finance, stocks, and investing.',
            imageUrl: 'finance.png'
        },
        {
            id: 'theatre-arts-guild',
            name: 'Theatre Arts Guild',
            description: 'Bringing stories to life through acting, directing, and stage production.',
            imageUrl: 'theatre.png'
        },
        {
            id: 'gamers-den',
            name: 'Gamer’s Den',
            description: 'A community for video game enthusiasts and e-sports tournaments.',
            imageUrl: 'gaming.png'
        },
        {
            id: 'campus-journalists-association',
            name: 'Campus Journalists Association',
            description: 'Reporting campus news and fostering investigative journalism.',
            imageUrl: 'journalism.png'
        },
    ];

    let events = []; // Initialize an empty array for events

    // FIND ORG MODAL ALONG WITH ORG DETAILS MODAL
    // Function to display organization details in the modal
    function showOrgDetails(orgId) {
        const org = organizations.find(org => org.id === orgId);
        if (org) {
            orgPicture.src = org.imageUrl;
            orgPicture.alt = org.name;
            orgNameElement.textContent = org.name;
            orgDescriptionElement.textContent = org.description;
            orgDetailsModal.style.display = 'block';
        } else {
            alert('Organization not found.');
        }
    }
    // Function to close a modal
    function closeModal(modal) {
        modal.style.display = 'none';
    }

    // Event listeners for opening and closing modals
    findOrgButton.addEventListener('click', () => {
        findOrgModal.style.display = 'block';
    });
    findOrgModalCloseButton.addEventListener('click', () => closeModal(findOrgModal));
    closeOrgDetailsButton.addEventListener('click', () => closeModal(orgDetailsModal));
    closeManageEventsButton.addEventListener('click', () => closeModal(manageEventsModal));
    closeAdditionalInfoButton.addEventListener('click', () => closeModal(additionalInfoModal));

    // Event listener for product card clicks
    productCards.forEach(card => {
        card.addEventListener('click', () => {
            const orgId = card.dataset.orgId;
            showOrgDetails(orgId);
        });
    });

    // Organization search functionality
    orgSearchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        orgList.innerHTML = ''; // Clear previous results

        const filteredOrgs = organizations.filter(org =>
            org.name.toLowerCase().includes(searchTerm) || org.description.toLowerCase().includes(searchTerm)
        );

        filteredOrgs.forEach(org => {
            const li = document.createElement('li');
            li.textContent = org.name;
            li.addEventListener('click', () => {
                showOrgDetails(org.id);
                closeModal(findOrgModal);
            });
            orgList.appendChild(li);
        });
    });

    // MANAGE EVENTS MODAL
    // Open modal
    if (openManageEventsButton) {
        openManageEventsButton.addEventListener("click", () => {
            manageEventsModal.style.display = "block";
        });
    }

    // Close modal
    if (closeManageEventsButton) {
        closeManageEventsButton.addEventListener("click", () => {
            manageEventsModal.style.display = "none";
        });
    }

    // Function to display events
    function displayEvents() {
        eventList.innerHTML = ""; // Clear the list

        if (events.length === 0) {
            const li = document.createElement("li");
            li.textContent = "No events added yet.";
            eventList.appendChild(li);
        } else {
            events.forEach((event, index) => {
                const li = document.createElement("li");
                li.classList.add("event-item"); // Add a class for styling

                // Check if image is available
                const imageHtml = event.imageUrl ?
                    `<img src="${event.imageUrl}" alt="Event Image" style="width: 80px; height: 80px; border-radius: 5px; margin-right: 10px;">` :
                    "";

                li.innerHTML = `
                    <div class="event-content">
                        ${imageHtml}
                        <span>📅 <strong>${event.title}</strong> - ${event.date}</span>
                        <br>📍 ${event.location}
                        <br>📝 ${event.description}
                    </div>
                    <button class="delete-event" data-index="${index}">❌</button>
                `;

                eventList.appendChild(li);
            });

            // Add delete event listeners
            document.querySelectorAll(".delete-event").forEach((button) => {
                button.addEventListener("click", deleteEvent);
            });
        }
    }

    // Save event
    saveEventButton.addEventListener("click", function() {
        const title = eventTitleInput.value.trim();
        const date = eventDateInput.value.trim();
        const location = eventLocationInput.value.trim();
        const description = eventDescriptionInput.value.trim();
        const imageInput = document.getElementById("event-image");
        let imageUrl = "";

        if (!title || !date || !location || !description) {
            alert("Please fill in all event details.");
            return;
        }

        // Check if an image is selected
        if (imageInput.files.length > 0) {
            const file = imageInput.files[0];
            imageUrl = URL.createObjectURL(file); // Create a temporary URL for the image
        }

        // Add event to array with image
        events.push({
            title,
            date,
            location,
            description,
            imageUrl
        });

        // Update event list
        displayEvents();

        // Clear input fields
        eventTitleInput.value = "";
        eventDateInput.value = "";
        eventLocationInput.value = "";
        eventDescriptionInput.value = "";
        imageInput.value = "";
    });

    // Delete event function
    function deleteEvent(event) {
        const index = event.target.getAttribute("data-index");
        events.splice(index, 1); // Remove event from array
        displayEvents(); // Update display
    }

    // Close modal when clicking outside
    window.addEventListener("click", function(event) {
        if (event.target == manageEventsModal) {
            manageEventsModal.style.display = "none";
        }
    });

    // Initial display of events
    displayEvents();

    // Close the modal if the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (event.target == findOrgModal) {
            closeModal(findOrgModal);
        }
        if (event.target == orgDetailsModal) {
            closeModal(orgDetailsModal);
        }
        if (event.target == manageEventsModal) {
            closeModal(manageEventsModal);
        }
        if (event.target == additionalInfoModal) {
            closeModal(additionalInfoModal);
        }
        if (event.target == joinRequestsModal) {
            closeModal(joinRequestsModal);
        }
        if (event.target == applicationDetailsModal) {
            closeModal(applicationDetailsModal);
        }
        if (event.target == viewMembersModal) {
            closeModal(viewMembersModal);
        }
    });

    // Render Join Requests List
    function renderJoinRequests() {
        requestList.innerHTML = "";
        joinRequests.forEach(request => {
            const listItem = document.createElement("li");
            listItem.innerHTML = `
                <span class="applicant-name">${request.name}</span>
                <button class="view-application-button"
                        data-name="${request.name}"
                        data-student-id="${request.studentNumber}"
                        data-program="${request.program}"
                        data-section="${request.section}"
                        data-email="${request.email}"
                        data-contact="${request.contact}"
                        data-address="${request.address}"
                        data-skills="${request.skills}"
                        data-reason="${request.reason}">
                    View Application
                </button>
            `;
            requestList.appendChild(listItem);
        });
    }

    // Render Join Requests
    function renderJoinRequests() {
        requestList.innerHTML = "";
        joinRequests.forEach(request => {
            const listItem = document.createElement("li");
            listItem.innerHTML = `
                <span class="applicant-name">${request.name}</span>
                <button class="view-application-button"
                        data-name="${request.name}"
                        data-student-id="${request.studentNumber}"
                        data-program="${request.program}"
                        data-section="${request.section}"
                        data-email="${request.email}"
                        data-contact="${request.contact}"
                        data-address="${request.address}"
                        data-skills="${request.skills}"
                        data-reason="${request.reason}">
                    View Application
                </button>
            `;
            requestList.appendChild(listItem);
        });
    }

    // Render Approved Members List
    function renderMembersList() {
        membersList.innerHTML = "";
        members.forEach(member => {
            const listItem = document.createElement("li");
            listItem.textContent = `${member.name} (${member.email})`;
            membersList.appendChild(listItem);
        });
    }

    // Display Application Details
    function displayApplicationDetails(name, studentNumber, program, section, email, contact, address, skills, reason) {
        applicantNameEl.textContent = name;
        applicantStudentNumberEl.textContent = studentNumber;
        applicantProgramEl.textContent = program;
        applicantSectionEl.textContent = section;
        applicantEmailEl.textContent = email;
        applicantContactEl.textContent = contact;
        applicantAddressEl.textContent = address;
        applicantSkillsEl.textContent = skills;
        applicantReasonEl.textContent = reason;

        // Show Modal
        applicationDetailsModal.style.display = "block";
    }

    // Handle View Application Click
    requestList.addEventListener('click', function(event) {
        if (event.target.classList.contains('view-application-button')) {
            const dataset = event.target.dataset;
            displayApplicationDetails(
                dataset.name, dataset.studentId, dataset.program, dataset.section,
                dataset.email, dataset.contact, dataset.address, dataset.skills, dataset.reason
            );
        }
    });

    // Handle Approve Request
    document.querySelector(".approve-request").addEventListener("click", function() {
        const email = applicantEmailEl.textContent;
        const requestIndex = joinRequests.findIndex(request => request.email === email);

        if (requestIndex !== -1) {
            const approvedRequest = joinRequests[requestIndex]; // Get the approved request
            members.push(approvedRequest); // Move to members list
            joinRequests.splice(requestIndex, 1); // Remove from requests
            renderJoinRequests();
            renderMembersList();
            applicationDetailsModal.style.display = "none";

            // Show approval popup
            alert(`${approvedRequest.name} has been approved!`);
        }
    });

    // Handle Reject Request
    document.querySelector(".reject-request").addEventListener("click", function() {
        const email = applicantEmailEl.textContent;
        const requestIndex = joinRequests.findIndex(request => request.email === email);

        if (requestIndex !== -1) {
            const rejectedRequest = joinRequests[requestIndex]; // Get the rejected request
            joinRequests.splice(requestIndex, 1); // Remove from requests
            renderJoinRequests();
            applicationDetailsModal.style.display = "none";

            // Show rejection popup
            alert(`${rejectedRequest.name} has been rejected.`);
        }
    });

    // Event Listeners for Opening Modals
    seeRequestsBtn.addEventListener("click", () => {
        joinRequestsModal.style.display = "block";
        renderJoinRequests();
    });

    viewMembersBtn.addEventListener("click", () => {
        viewMembersModal.style.display = "block";
        renderMembersList();
    });

    // Close Modals
    closeRequestsBtn.addEventListener("click", () => joinRequestsModal.style.display = "none");
    closeApplicationBtn.addEventListener("click", () => applicationDetailsModal.style.display = "none");
    closeMembersBtn.addEventListener("click", () => viewMembersModal.style.display = "none");

    // Initial Render
    renderJoinRequests();
    renderMembersList();
});

// Save Event Button nd pic? parang di pa gumagana
document.addEventListener("DOMContentLoaded", function () {
    const eventImageInput = document.getElementById("event-image");
    const imagePreviewContainer = document.getElementById("image-preview-container");
    const previewImg = document.getElementById("preview-img");
    const removeImageBtn = document.getElementById("remove-image-btn");


    if (!eventImageInput || !imagePreviewContainer || !previewImg || !removeImageBtn) {
        console.error("One or more image elements not found!");
        return;
    }


    eventImageInput.addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImg.src = e.target.result;
                imagePreviewContainer.style.display = "flex"; // Show image preview
            }

            reader.readAsDataURL(file);
        } else {
            // No file selected, hide the preview
            previewImg.src = "";
            imagePreviewContainer.style.display = "none";
        }
    });

    removeImageBtn.addEventListener("click", function () {
        eventImageInput.value = ""; // Clear the file input
        previewImg.src = ""; // Clear the preview image
        imagePreviewContainer.style.display = "none"; // Hide image preview
    });
    
});

/*document.addEventListener("DOMContentLoaded", () => {
    const organizationsContainer = document.getElementById("organizations-container");
    const addOrgCard = document.querySelector(".add-org-card");
    const addOrgModal = document.getElementById("addOrgModal");
    const addOrgForm = document.getElementById("addOrgForm");
    const closeModalButton = document.querySelector(".close");

    let organizations = [
        {
            name: "Campus Journalists Association",
            description: "Reporting campus news and fostering investigative journalism.",
            image: "https://via.placeholder.com/150", // Example placeholder image
        },
        {
            name: "Debate Club",
            description: "Honing public speaking and critical thinking skills.",
            image: "https://via.placeholder.com/150", // Example placeholder image
        },
    ];

    // Function to create a card element with unique IDs
    function createCard(org, index) {
        const card = document.createElement("div");
        card.classList.add("product-card");
        card.id = `org-card-${index}`; // Unique card ID

        card.innerHTML = `
            <div class="card-header"></div>
            <h2>${org.name}</h2>
            <p>${org.description}</p>
            <img src="${org.image}" alt="${org.name}" class="journ-image" id="org-image-${index}">
        `;

        return card;
    }

    // Function to render organizations
    function renderOrganizations() {
        // Clear existing cards (except the "Add Organization" card)
        while (organizationsContainer.children.length > 1) {
            organizationsContainer.removeChild(organizationsContainer.lastChild);
        }

        organizations.forEach((org, index) => {
            const card = createCard(org, index);
            organizationsContainer.appendChild(card);
        });
    }

    // Initial render
    renderOrganizations();

    // Event listener for the "Add Organization" card
    addOrgCard.addEventListener("click", () => {
        addOrgModal.style.display = "block"; // Show the modal
    });

    // Event listener for closing the modal
    closeModalButton.addEventListener("click", () => {
        addOrgModal.style.display = "none"; // Hide the modal
    });

    // Event listener for submitting the form
    addOrgForm.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent the default form submission

        const orgName = document.getElementById("orgName").value;
        const orgDescription = document.getElementById("orgDescription").value;
        const orgImage = document.getElementById("orgImage").value || "https://via.placeholder.com/150"; // Default image

        const newOrg = {
            name: orgName,
            description: orgDescription,
            image: orgImage,
        };

        organizations.push(newOrg); // Add the new organization to the array
        renderOrganizations(); // Re-render the organization cards
        addOrgModal.style.display = "none"; // Hide the modal

        // Clear the form
        addOrgForm.reset();
    });

    // Close the modal if the user clicks outside of it
    window.addEventListener("click", (event) => {
        if (event.target == addOrgModal) {
            addOrgModal.style.display = "none";
        }
    });
});*/




document.addEventListener("DOMContentLoaded", function () {
    fetch("../php/fetch_data_admin.php")
        .then(response => response.json())
        .then(data => {
            console.log("Fetched organizations:", data);
            const container = document.getElementById("org-container");

            if (!container) {
                console.error("Container element #org-container not found.");
                return;
            }

            container.innerHTML = "";

            const addOrgCard = document.createElement("div");
            addOrgCard.classList.add("product-card", "add-org-card");
            addOrgCard.dataset.orgId = "add-org";
            addOrgCard.innerHTML = `
                <div class="card-header">Add Organization</div>
                <h2>Add Organization</h2>
                <p>Click to add a new organization.</p>
                <i class="fa fa-plus" style="font-size: 24px;"></i>
            `;

            container.prepend(addOrgCard);

            data.forEach(org => {
                const card = document.createElement("div");
                card.classList.add("product-card");
                card.dataset.orgId = org.id;
                card.style.background = getRandomGradient();
                card.innerHTML = `
                    <div class="card-header">Technology</div>
                    <h2>${org.name}</h2>
                    <p>${org.description}</p>
                    <img src="${org.image_url}" alt="${org.name}" class="coda-image">
                `;

                card.addEventListener("click", function () {
                    openOrgDetailsModal(org);
                });

                container.appendChild(card);
            });

            setupModals();
        })
        .catch(error => console.error("Error fetching data:", error));
});

function getRandomGradient() {
    const colors = [
        "#ff5733", "#33ff57", "#5733ff", "#ff33a8", "#33a8ff",
        "#ffcc33", "#a833ff", "#33ffa8", "#ffa833", "#a8ff33"
    ];
    const color1 = colors[Math.floor(Math.random() * colors.length)];
    const color2 = colors[Math.floor(Math.random() * colors.length)];
    const angle = Math.floor(Math.random() * 360);

    return `linear-gradient(${angle}deg, ${color1}, ${color2})`;
}

function setupModals() {
    const addOrgCard = document.querySelector(".add-org-card");
    const addOrgModal = document.getElementById("addOrgModal");
    const closeModal = document.querySelector("#addOrgModal .close");
    const addOrgForm = document.getElementById("addOrgForm");
    const orgTypeSelect = document.querySelector(".org-type");

    if (!addOrgCard || !addOrgModal || !closeModal || !addOrgForm || !orgTypeSelect) {
        console.error("One or more required elements are missing.");
        return;
    }

    function fetchOrgTypes() {
        fetch("../php/get_org_types.php")
            .then(response => response.json())
            .then(data => {
                console.log("Fetched organization types:", data);
                const orgTypeSelect = document.querySelector(".org-type");

                if (!orgTypeSelect) {
                    console.error("Dropdown element .org-type not found.");
                    return;
                }

                if (!Array.isArray(data)) {
                    console.error("Invalid data format received:", data);
                    return;
                }

                orgTypeSelect.innerHTML = data.length === 0
                    ? '<option value="">No types available</option>'
                    : data.map(type => `<option value="${type.org_type_id}">${type.org_type_name}</option>`).join('');
            })
            .catch(error => console.error("Error fetching organization types:", error));
    }

    addOrgCard.addEventListener("click", function () {
        addOrgModal.style.display = "block";
        fetchOrgTypes();
    });

    closeModal.addEventListener("click", function () {
        addOrgModal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === addOrgModal) {
            addOrgModal.style.display = "none";
        }
    });

    addOrgForm.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(addOrgForm);

        fetch("../php/add_org.php", { method: "POST", body: formData })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.status === "success") {
                    addOrgModal.style.display = "none";
                    location.reload();
                }
            })
            .catch(error => console.error("Error submitting form:", error));
    });
}

function openOrgDetailsModal(org) {
    const orgDetailsModal = document.getElementById("org-details-modal");
    if (!orgDetailsModal) {
        console.error("Organization details modal not found.");
        return;
    }

    document.getElementById("org-picture").src = org.image_url;
    document.getElementById("org-name").textContent = org.name;
    document.getElementById("org-description").textContent = org.description;

    orgDetailsModal.style.display = "block";

    document.getElementById("close-org-details").addEventListener("click", function () {
        orgDetailsModal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === orgDetailsModal) {
            orgDetailsModal.style.display = "none";
        }
    });
}
