// Modal elements
const joinModal = document.getElementById("joinModal");
const leaveModal = document.createElement("div");
leaveModal.classList.add("modal");
leaveModal.id = "leaveModal";
leaveModal.innerHTML = `
    <div class="modal-content">
        <span class="close" id="closeLeave">&times;</span>
        <h2>Leave Organization</h2>
        <p>Are you sure you want to leave <strong id="orgNamePlaceholder"></strong>?</p>
        <button class="confirmLeave" id="confirmLeave">Yes, Leave</button>
        <button class="cancelLeave" id="cancelLeave">Cancel</button>
    </div>
    <style>
        .confirmLeave { background-color: #f44336; color: white; }
        .confirmLeave:hover { background-color: rgb(255, 17, 0); }
        .cancelLeave { background-color: rgb(235, 235, 235); color: black; }
        .cancelLeave:hover { background-color: rgb(200, 200, 200); }
        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.4); }
        .modal.show { display: flex; justify-content: center; align-items: center; }
        .modal-content { background: white; padding: 20px; border-radius: 8px; text-align: center; }
    </style>
`;
document.body.appendChild(leaveModal);

// Button elements
const joinButton = document.querySelector(".join-btn");
const closeJoinButton = document.querySelector("#joinModal .close");
const confirmJoinButton = document.getElementById("confirmJoin");
const cancelJoinButton = document.getElementById("cancelJoin");

const closeLeaveButton = document.getElementById("closeLeave");
const confirmLeaveButton = document.getElementById("confirmLeave");
const cancelLeaveButton = document.getElementById("cancelLeave");

let membershipStatus = null;
let orgID = null;
let studentID = null;

// Fetch student status from tbl_status on page load
document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const pageOrgID = parseInt(urlParams.get("id")); // Get org_id from URL

    fetch(`fetch_data.php?id=${pageOrgID}`)
        .then(response => response.json())
        .then(data => {
            if (data.student_id) studentID = data.student_id;
            if (data.status) membershipStatus = data.status;
            orgID = pageOrgID;

            // Set button text based on membership status
            updateJoinButtonText();
        })
        .catch(error => console.error("Error fetching student status:", error));
});

// Function to update button text based on status
function updateJoinButtonText() {
    if (membershipStatus === "Pending") {
        joinButton.innerText = "Pending";
        joinButton.disabled = true;
    } else if (membershipStatus === "Approved") {
        joinButton.innerText = "Joined";
        joinButton.classList.add("leave-btn");
        joinButton.disabled = false;
    } else if (membershipStatus === "Rejected") {
        joinButton.innerText = "Rejected";
        joinButton.disabled = true;
    } else {
        joinButton.innerText = "Join";
        joinButton.classList.remove("leave-btn");
        joinButton.disabled = false;
    }
}

// Open Join or Leave modal based on status
joinButton.onclick = function () {
    if (membershipStatus === "Approved") {
        leaveModal.classList.add("show");
    } else if (membershipStatus === null || membershipStatus === "Rejected") {
        joinModal.classList.add("show");
    }
};

// Close modals
closeJoinButton.onclick = () => joinModal.classList.remove("show");
cancelJoinButton.onclick = () => joinModal.classList.remove("show");
closeLeaveButton.onclick = () => leaveModal.classList.remove("show");
cancelLeaveButton.onclick = () => leaveModal.classList.remove("show");

// Confirm joining
confirmJoinButton.onclick = function () {
    if (!studentID) {
        alert("Error: Student ID not found.");
        return;
    }

    if (validateForm()) {
        fetch("join_organization.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ student_id: studentID, org_id: orgID }) 
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Your application is pending approval.");
                membershipStatus = "Pending";
                updateJoinButtonText();
                joinModal.classList.remove("show");
            } else {
                alert("Error joining organization.");
            }
        })
        .catch(error => console.error("Error:", error));
    }
};

// Confirm leaving
confirmLeaveButton.onclick = function () {
    if (!studentID || !orgID) {
        alert("Error: Missing student or organization ID.");
        return;
    }

    fetch("leave_organization.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ student_id: studentID, org_id: orgID })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("You have left the organization.");
            membershipStatus = null;
            updateJoinButtonText();
            leaveModal.classList.remove("show");
        } else {
            alert("Error leaving organization.");
        }
    })
    .catch(error => console.error("Error:", error));
};

// Form validation function
function validateForm() {
    const fields = ["name", "program", "section", "email", "contact", "address", "skills", "reason"];
    let isValid = true;

    for (const field of fields) {
        const input = document.getElementById(field);
        if (!input || !input.value.trim()) {
            alert(`Please fill in the ${input?.placeholder || field} field.`);
            if (input) input.style.border = "2px solid red";
            isValid = false;
            break;
        } else {
            input.style.border = "";
        }
    }
    return isValid;
}
