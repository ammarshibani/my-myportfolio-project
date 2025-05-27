    // // Certificate Filtering
    // document.querySelectorAll('.filter-btn').forEach(btn => {
    //     btn.addEventListener('click', function() {
    //         document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    //         this.classList.add('active');
            
    //         const filter = this.dataset.filter;
    //         const certificateItems = document.querySelectorAll('.certificate-item');
            
    //         certificateItems.forEach(item => {
    //             if (filter === 'all' || item.dataset.issuer === filter) {
    //                 item.style.display = 'block';
    //                 setTimeout(() => {
    //                     item.style.opacity = '1';
    //                     item.style.transform = 'translateY(0)';
    //                 }, 50);
    //             } else {
    //                 item.style.opacity = '0';
    //                 item.style.transform = 'translateY(20px)';
    //                 setTimeout(() => {
    //                     item.style.display = 'none';
    //                 }, 300);
    //             }
    //         });
    //     });
    // });

    // // Certificate Modal
    // const certificateModal = document.getElementById('certificateModal');
    // if (certificateModal) {
    //     certificateModal.addEventListener('show.bs.modal', function(event) {
    //         const button = event.relatedTarget;
    //         document.getElementById('modalCertificateName').textContent = button.dataset.name;
    //         document.getElementById('modalCertificateIssuer').textContent = button.dataset.issuer;
    //         document.getElementById('modalCertificateDate').textContent = button.dataset.date;
    //         document.getElementById('modalCertificateDescription').textContent = button.dataset.description;
    //         document.getElementById('modalCertificateImage').src = button.dataset.image;
    //         document.getElementById('modalCertificateDownload').href = button.dataset.image;
    //     });
    // }

    // // Initialize Masonry Grid
    // document.addEventListener('DOMContentLoaded', function() {
    //     // Certificates Timeline
    //     const certificates = @json($certificates->map(function($certificate) {
    //         return {
    //             name: $certificate->name_en,
    //             issuer: $certificate->issuer_en,
    //             date: $certificate->date->format('Y-m-d'),
    //             image: asset('storage/' . $certificate->image),
    //             description: $certificate->description_en
    //         };
    //     }));
        
    //     const timeline = document.getElementById('certificatesTimeline');
        
    //     certificates.sort((a, b) => new Date(b.date) - new Date(a.date)).forEach(cert => {
    //         const timelineItem = document.createElement('div');
    //         timelineItem.className = 'timeline-item';
            
    //         timelineItem.innerHTML = `
    //             <div class="timeline-date">${new Date(cert.date).toLocaleDateString('en-US', { month: 'short', year: 'numeric' })}</div>
    //             <div class="timeline-content">
    //                 <div class="row align-items-center">
    //                     <div class="col-md-4">
    //                         <img src="${cert.image}" class="img-fluid rounded" alt="${cert.name}">
    //                     </div>
    //                     <div class="col-md-8">
    //                         <h4>${cert.name}</h4>
    //                         <p class="text-primary">${cert.issuer}</p>
    //                         <p class="text-muted">${cert.description || ''}</p>
    //                     </div>
    //                 </div>
    //             </div>
    //         `;
            
    //         timeline.appendChild(timelineItem);
    //     });

    //     // Animate items on scroll
    //     const observer = new IntersectionObserver((entries) => {
    //         entries.forEach(entry => {
    //             if (entry.isIntersecting) {
    //                 entry.target.classList.add('animate');
    //             }
    //         });
    //     }, { threshold: 0.1 });

    //     document.querySelectorAll('.certificate-item').forEach(item => {
    //         observer.observe(item);
    //     });
    // });
