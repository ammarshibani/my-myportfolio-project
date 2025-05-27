    // // Skill Filtering
    // document.querySelectorAll('.filter-btn').forEach(btn => {
    //     btn.addEventListener('click', function() {
    //         // Update active button
    //         document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    //         this.classList.add('active');
            
    //         const filter = this.dataset.filter;
    //         const skillItems = document.querySelectorAll('.skill-item');
            
    //         skillItems.forEach(item => {
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

    // // Skill Modal
    // const skillModal = document.getElementById('skillModal');
    // if (skillModal) {
    //     skillModal.addEventListener('show.bs.modal', function(event) {
    //         const button = event.relatedTarget;
    //         document.getElementById('modalSkillName').textContent = button.dataset.name;
    //         document.getElementById('modalSkillCategory').textContent = button.dataset.category;
    //         document.getElementById('modalSkillPercentage').textContent = button.dataset.percentage;
    //         document.getElementById('modalSkillDescription').textContent = button.dataset.description;
            
    //         // Create radial progress
    //         const percentage = parseInt(button.dataset.percentage);
    //         const radialHtml = `
    //             <div class="radial-progress-bar" 
    //                  style="--percentage: ${percentage}; 
    //                         --progress-color: ${getProgressColor(percentage)};">
    //                 <span>${percentage}%</span>
    //             </div>
    //         `;
    //         document.getElementById('modalRadialProgress').innerHTML = radialHtml;
    //     });
    // }

    // // Skills Chart
    // document.addEventListener('DOMContentLoaded', function() {
    //     const categories = @json($categories);
    //     const skillsData = @json($skills->groupBy('category')->map(function($items) {
    //         return $items->avg('percentage');
    //     }));
        
    //     const ctx = document.getElementById('skillsChart').getContext('2d');
    //     const skillsChart = new Chart(ctx, {
    //         type: 'radar',
    //         data: {
    //             labels: categories,
    //             datasets: [{
    //                 label: 'Skill Level',
    //                 data: categories.map(cat => skillsData[cat] || 0),
    //                 backgroundColor: 'rgba(52, 152, 219, 0.2)',
    //                 borderColor: 'rgba(52, 152, 219, 1)',
    //                 borderWidth: 2,
    //                 pointBackgroundColor: 'rgba(52, 152, 219, 1)',
    //                 pointRadius: 4,
    //                 pointHoverRadius: 6
    //             }]
    //         },
    //         options: {
    //             scales: {
    //                 r: {
    //                     angleLines: {
    //                         display: true
    //                     },
    //                     suggestedMin: 0,
    //                     suggestedMax: 100,
    //                     ticks: {
    //                         stepSize: 20
    //                     }
    //                 }
    //             },
    //             plugins: {
    //                 legend: {
    //                     display: false
    //                 },
    //                 tooltip: {
    //                     callbacks: {
    //                         label: function(context) {
    //                             return `${context.dataset.label}: ${context.raw}%`;
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     });
    // });

    // // Helper function to get progress color based on percentage
    // function getProgressColor(percentage) {
    //     if (percentage >= 80) return '#2ecc71'; // Green
    //     if (percentage >= 60) return '#3498db'; // Blue
    //     if (percentage >= 40) return '#f39c12'; // Orange
    //     return '#e74c3c'; // Red
    // }
