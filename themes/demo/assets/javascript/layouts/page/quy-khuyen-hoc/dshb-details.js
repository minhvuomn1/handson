function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
  }
  
  document.addEventListener('DOMContentLoaded', function () {
    const studentId = getQueryParam('id');
    if (!studentId) return;
  
    fetch('/api/scholarship-students')
      .then(res => res.json())
      .then(data => {
        const student = data.find(item => item.student.id == studentId);
        if (!student) {
          document.getElementById('scholarshipDetailContainer').innerHTML = '<p>Không tìm thấy học sinh.</p>';
          return;
        }
  
        const container = document.getElementById('scholarshipDetailContainer');
        const template = document.getElementById('scholarship-template');
        const clone = template.content.cloneNode(true);
        
        // Hiển thị ảnh đại diện
        const avatarImage = clone.querySelector('.student-avatar');
        if (avatarImage && student.student.avt) {
            avatarImage.src = student.student.avt; // Hiển thị ảnh đại diện học sinh
        }
        
         // Ảnh chính
        const mainImage = clone.querySelector('.main-image');
        if (mainImage && student.images.length > 0) {
            mainImage.src = student.images[0]?.url || '/themes/yourtheme/assets/images/scholarship-main.jpg';
        }

        // Gallery ảnh nhỏ
        const galleryContainer = clone.querySelector('.gallery-images');
        if (galleryContainer) {
            student.images.forEach(img => {
            const imgEl = document.createElement('img');
            imgEl.src = img.thumb;
            imgEl.className = 'img-thumbnail flex-fill gallery-thumbnail';
            imgEl.addEventListener('click', function () {
                mainImage.src = img.url; // Thay ảnh chính khi click vào ảnh nhỏ
            });
            galleryContainer.appendChild(imgEl);
            });
        }
  
        // Thông tin học sinh
        clone.querySelector('.student-name').textContent = student.student.name;
        clone.querySelector('.school-name').textContent = student.student.school.name;
        clone.querySelector('.student-grade').textContent = student.student.grade;
        clone.querySelector('.student-school-year').textContent = student.student.school_year;
        clone.querySelector('.student-location').textContent = student.student.location;
        clone.querySelector('.sponsor-name').textContent = student.scholarship.sponsors.name;
        clone.querySelector('.student-sex').textContent = student.student.sex;
        clone.querySelector('.student-dob').textContent = student.student.dob;
        clone.querySelector('.student-family').textContent = student.student.family_manner;
        clone.querySelector('.result_activity').textContent = student.result_activity;
  
        container.appendChild(clone);
      })
      .catch(err => {
        console.error('Lỗi khi lấy dữ liệu học bổng:', err);
      });
  });
  