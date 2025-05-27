    // // Project Filtering
    // document.querySelectorAll('.filter-btn').forEach(btn => {
    //     btn.addEventListener('click', function() {
    //         // Update active button
    //         document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    //         this.classList.add('active');
            
    //         const filter = this.dataset.filter;
    //         const projectItems = document.querySelectorAll('.project-item');
            
    //         projectItems.forEach(item => {
    //             if (filter === 'all' || item.dataset.category === filter) {
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

    // // Project Modal
    // const projectModal = document.getElementById('projectModal');
    // if (projectModal) {
    //     projectModal.addEventListener('show.bs.modal', function(event) {
    //         const button = event.relatedTarget;
    //         document.getElementById('modalProjectTitle').textContent = button.dataset.title;
    //         document.getElementById('modalProjectCategory').textContent = button.dataset.category;
    //         document.getElementById('modalProjectDate').textContent = button.dataset.date;
    //         document.getElementById('modalProjectTechnologies').textContent = button.dataset.technologies;
    //         document.getElementById('modalProjectDescription').textContent = button.dataset.description;
    //         document.getElementById('modalProjectImage').src = button.dataset.image;
            
    //         const linkBtn = document.getElementById('modalProjectLink');
    //         if (button.dataset.link) {
    //             linkBtn.href = button.dataset.link;
    //             linkBtn.style.display = 'inline-block';
    //         } else {
    //             linkBtn.style.display = 'none';
    //         }
    //     });
    // }

    // // Initialize Vanilla Tilt for project cards
    // document.querySelectorAll('.project-card').forEach(card => {
    //     VanillaTilt.init(card, {
    //         max: 15,
    //         speed: 400,
    //         glare: true,
    //         'max-glare': 0.2,
    //     });
    // });

    // // Toggle Favorite
    // document.querySelectorAll('.toggle-favorite').forEach(btn => {
    //     btn.addEventListener('click', function() {
    //         const icon = this.querySelector('i');
    //         icon.classList.toggle('far');
    //         icon.classList.toggle('fas');
    //         icon.classList.toggle('text-danger');
            
    //         // Here you would typically send an AJAX request to save the favorite status
    //         const projectId = this.dataset.projectId;
    //         console.log(`Project ${projectId} favorited`);
    //     });
    // });

    // // Projects Timeline
    // document.addEventListener('DOMContentLoaded', function() {
    //     const projects = @json($projects->map(function($project) {
    //         return {
    //             title: $project->title_en,
    //             date: $project->date->format('Y-m-d'),
    //             category: $project->category,
    //             technologies: $project->technologies,
    //             image: asset('storage/' . $project->image),
    //             link: $project->link;
    //         };
    //     }));
        
    //     const timeline = document.getElementById('projectsTimeline');
        
    //     projects.sort((a, b) => new Date(b.date) - new Date(a.date)).forEach(project => {
    //         const timelineItem = document.createElement('div');
    //         timelineItem.className = 'timeline-item';
            
    //         timelineItem.innerHTML = `
    //             <div class="timeline-date">${new Date(project.date).toLocaleDateString('en-US', { month: 'short', year: 'numeric' })}</div>
    //             <div class="timeline-content">
    //                 <div class="row">
    //                     <div class="col-md-4">
    //                         <img src="${project.image}" class="img-fluid rounded" alt="${project.title}">
    //                     </div>
    //                     <div class="col-md-8">
    //                         <h4>${project.title}</h4>
    //                         <div class="d-flex flex-wrap gap-2 mb-2">
    //                             <span class="badge bg-primary">${project.category}</span>
    //                             ${project.technologies.split(',').map(tech => `<span class="badge bg-secondary">${tech.trim()}</span>`).join('')}
    //                         </div>
    //                         ${project.link ? `<a href="${project.link}" class="btn btn-sm btn-outline-primary" target="_blank">View Project</a>` : ''}
    //                     </div>
    //                 </div>
    //             </div>
    //         `;
            
    //         timeline.appendChild(timelineItem);
    //     });
    // });