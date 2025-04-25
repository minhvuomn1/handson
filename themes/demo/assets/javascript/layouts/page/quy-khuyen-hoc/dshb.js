const students = [
    {
        name: "Lê Dương Diễm My",
        school: "Đại học Ngoại thương CSII",
        grade: 3,
        dob: "16/11/2004",
        generation: "F12",
        location: "Hồ Chí Minh",
        sponsor: "Hands On",
        type: "Học bổng toàn phần",
    },
    {
        name: "Lê Gia Khánh",
        school: "Đại học Ngoại thương CSII",
        grade: 3,
        dob: "16/11/2004",
        generation: "F12",
        location: "Hồ Chí Minh",
        sponsor: "Hands On",
        type: "Học bổng bán phần",
    },
    {
        name: "Bùi Văn Anh Văn Anh",
        school: "Đại học Ngoại thương CSII",
        grade: 3,
        dob: "16/11/2004",
        generation: "F12",
        location: "Hồ Chí Minh",
        sponsor: "Hands On",
        type: "Học bổng bán phần",
    },
    {
        name: "Lê Dương Diễm My",
        school: "Đại học Ngoại thương CSII",
        grade: 3,
        dob: "16/11/2004",
        generation: "F12",
        location: "Hồ Chí Minh",
        sponsor: "Hands On",
        type: "Học bổng toàn phần",
    },
];

const logoSrc = document.getElementById("logo-template").src;
const container = document.getElementById("scholarship-list");
const template = document.getElementById("student-card-template");

students.forEach((student) => {
    const clone = template.content.cloneNode(true);

    clone.querySelector(".logo").src = logoSrc;
    clone.querySelector(".student-name").textContent = student.name;
    clone.querySelector(".student-school").textContent = student.school;
    clone.querySelector(".grade").textContent = student.grade;
    clone.querySelector(".dob").textContent = student.dob;
    clone.querySelector(".generation").textContent = student.generation;
    clone.querySelector(".location").textContent = student.location;
    clone.querySelector(".sponsor").textContent = student.sponsor;

    const typeDiv = clone.querySelector(".scholarship-type");
    typeDiv.textContent = student.type;
    typeDiv.classList.add(
        student.type.includes("toàn phần") ? "full" : "partial"
    );

    const detailLink = clone.querySelector("a.student-card");
    detailLink.href = `/public_html/quy-khuyen-hoc/danh-sach-hoc-bong/chi-tiet`;
    // detailLink.href = `/quy-khuyen-hoc/danh-sach-hoc-bong-chi-tiet?index=${index}`;
    container.appendChild(clone);
});
// document.addEventListener("DOMContentLoaded", function () {
//     fetchAndRenderStudents();

//     function fetchAndRenderStudents() {
//         // Gọi đúng tên handler có namespace component
//         $.request("ScholarshipComponent::onGetScholarshipStudents", {
//             success: function (response) {
//                 if (response.data) {
//                     renderScholarshipCards(response.data);
//                 } else {
//                     console.error("Không có dữ liệu trả về.");
//                 }
//             },
//             error: function (xhr) {
//                 console.error("Lỗi khi lấy dữ liệu:", xhr.responseText);
//             },
//         });
//     }

//     function renderScholarshipCards(students) {
//         const logoSrc = document.getElementById("logo-template").src;
//         const container = document.getElementById("scholarship-list");
//         const template = document.getElementById("student-card-template");

//         container.innerHTML = ""; // Xóa danh sách cũ

//         students.forEach((item) => {
//             const student = item.student;
//             const scholarship = item.scholarship;
//             const sponsorName = scholarship?.sponsors?.name || "Không rõ";

//             const clone = template.content.cloneNode(true);

//             clone.querySelector(".logo").src = logoSrc;
//             clone.querySelector(".student-name").textContent = student.name;
//             clone.querySelector(".student-school").textContent =
//                 student.school?.name || "N/A";
//             clone.querySelector(".grade").textContent = student.grade;
//             clone.querySelector(".dob").textContent = student.dob;
//             clone.querySelector(".generation").textContent =
//                 scholarship.generation;
//             clone.querySelector(".location").textContent = student.location;
//             clone.querySelector(".sponsor").textContent = sponsorName;

//             const typeDiv = clone.querySelector(".scholarship-type");
//             typeDiv.textContent = scholarship.type || "Không rõ";
//             typeDiv.classList.add(
//                 (scholarship.type || "").includes("toàn phần")
//                     ? "full"
//                     : "partial"
//             );

//             const detailLink = clone.querySelector("a.student-card");
//             detailLink.href = `/quy-khuyen-hoc/danh-sach-hoc-bong/chi-tiet?id=${student.id}`;

//             container.appendChild(clone);
//         });
//     }
// });
