document.addEventListener("DOMContentLoaded", function () {
    // === 1. Load dropdown filter options ===
    const dropdownConfigs = [
        { id: "filter-sponsor", api: "/api/sponsors", textKey: "name" },
        { id: "filter-school", api: "/api/schools", textKey: "name" },
    ];

    dropdownConfigs.forEach(({ id, api, textKey }) => {
        fetch(api)
            .then((res) => res.json())
            .then((data) => {
                const select = document.getElementById(id);
                if (!select) return;

                data.forEach((item) => {
                    const opt = document.createElement("option");
                    opt.value = item[textKey]?.toLowerCase() || "";
                    opt.textContent = item[textKey] || "Không rõ";
                    select.appendChild(opt);
                });
            })
            .catch((err) => console.error(`Lỗi khi tải ${id}:`, err));
    });

    // Load thế hệ
    const generations = ["F12", "F13", "F14"];
    const genSelect = document.getElementById("filter-generation");
    generations.forEach((gen) => {
        const opt = document.createElement("option");
        opt.value = gen.toLowerCase();
        opt.textContent = gen;
        genSelect.appendChild(opt);
    });

    // Load năm sinh
    const dobSelect = document.getElementById("filter-dob");
    const currentYear = new Date().getFullYear();
    for (let year = 2000; year <= currentYear; year++) {
        const opt = document.createElement("option");
        opt.value = year;
        opt.textContent = year;
        dobSelect.appendChild(opt);
    }

    // Load quê quán
    const locations = [
        "An Giang",
        "Bà Rịa-Vũng Tàu",
        "Bắc Giang",
        "Bắc Kạn",
        "Bạc Liêu",
        "Bắc Ninh",
        "Bến Tre",
        "Bình Dương",
        "Bình Định",
        "Bình Phước",
        "Bình Thuận",
        "Cà Mau",
        "Cần Thơ",
        "Cao Bằng",
        "Đắk Lắk",
        "Đắk Nông",
        "Điện Biên",
        "Đồng Nai",
        "Đồng Tháp",
        "Gia Lai",
        "Hà Giang",
        "Hà Nam",
        "Hà Nội",
        "Hải Dương",
        "Hải Phòng",
        "Hậu Giang",
        "Hòa Bình",
        "Hồ Chí Minh",
        "Hưng Yên",
        "Khánh Hòa",
        "Kiên Giang",
        "Kon Tum",
        "Lai Châu",
        "Lâm Đồng",
        "Lạng Sơn",
        "Lào Cai",
        "Long An",
        "Nam Định",
        "Nghệ An",
        "Ninh Bình",
        "Ninh Thuận",
        "Phú Thọ",
        "Phú Yên",
        "Quảng Bình",
        "Quảng Nam",
        "Quảng Ngãi",
        "Quảng Ninh",
        "Quảng Trị",
        "Sóc Trăng",
        "Sơn La",
        "Tây Ninh",
        "Thái Bình",
        "Thái Nguyên",
        "Thanh Hóa",
        "Thừa Thiên-Huế",
        "Tiền Giang",
        "TP.HCM",
        "Trà Vinh",
        "Tuyên Quang",
        "Vĩnh Long",
        "Vĩnh Phúc",
        "Yên Bái",
    ];
    const locSelect = document.getElementById("filter-location");
    locations.forEach((loc) => {
        const opt = document.createElement("option");
        opt.value = loc.toLowerCase();
        opt.textContent = loc;
        locSelect.appendChild(opt);
    });

    // === 2. Load và render danh sách học bổng ===
    let allStudents = [];

    fetch("/api/scholarship-students")
        .then((res) => res.json())
        .then((data) => {
            allStudents = data;
            renderScholarshipCards(data);
        })
        .catch((error) => {
            console.error("Lỗi khi gọi API:", error);
        });

    function renderScholarshipCards(students) {
        const logoTemplate = document.getElementById("logo-template");
        const container = document.getElementById("scholarship-list");
        const template = document.getElementById("student-card-template");

        if (!container || !template || !logoTemplate) {
            console.error("Không tìm thấy phần tử DOM cần thiết.");
            return;
        }

        const logoSrc = logoTemplate.src;
        container.innerHTML = "";

        students.forEach((item) => {
            const student = item.student || {};
            const scholarship = item.scholarship || {};
            const sponsors = scholarship.sponsors || {};
            const school = student.school || {};

            const clone = template.content.cloneNode(true);
            clone.querySelector(".logo").src = logoSrc;
            clone.querySelector(".student-name").textContent =
                student.name || "Không rõ";
            clone.querySelector(".student-school").textContent =
                school.name || "Không rõ";
            clone.querySelector(".grade").textContent = student.grade || "N/A";
            clone.querySelector(".dob").textContent = student.dob || "N/A";
            clone.querySelector(".generation").textContent =
                student.generation || "Không rõ";
            clone.querySelector(".location").textContent =
                student.location || "Không rõ";
            clone.querySelector(".sponsors").textContent =
                sponsors.name || "Không rõ";

            const typeDiv = clone.querySelector(".scholarship-type");
            const typeText = scholarship.type || "Không rõ";
            typeDiv.textContent = typeText;
            typeDiv.classList.add(
                typeText.includes("Học bổng toàn phần") ? "full" : "partial"
            );

            const detailLink = clone.querySelector("a.student-card");
            if (detailLink) {
                detailLink.href = `/quy-khuyen-hoc/danh-sach-hoc-bong/chi-tiet?id=${student.id}`;
            }

            container.appendChild(clone);
        });
    }

    // === 3. Xử lý nút "Lọc" ===
    const filterBtn = document.querySelector(".button-filter");
    filterBtn?.addEventListener("click", () => {
        const sponsors = document.getElementById("filter-sponsor").value;
        const school = document.getElementById("filter-school").value;
        const generation = document.getElementById("filter-generation").value;
        const dob = document.getElementById("filter-dob").value;
        const location = document.getElementById("filter-location").value;

        const filtered = allStudents.filter((item) => {
            const student = item.student || {};
            const scholarship = item.scholarship || {};
            const sponsorName = scholarship.sponsors?.name?.toLowerCase() || "";
            const schoolName = student.school?.name?.toLowerCase() || "";
            const studentGeneration = student.generation?.toLowerCase() || "";
            const studentDob = student.dob || "";
            const studentLocation = student.location?.toLowerCase() || "";

            const studentYear = studentDob
                ? new Date(studentDob).getFullYear()
                : "";

            return (
                (!sponsors || sponsorName.includes(sponsors)) &&
                (!school || schoolName.includes(school)) &&
                (!generation || studentGeneration === generation) &&
                (!dob || studentDob === dob) &&
                (!location || studentLocation.includes(location))
            );
        });

        renderScholarshipCards(filtered);
    });
});
