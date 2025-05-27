// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 70,
                behavior: 'smooth'
            });
            
            // Update URL without page reload
            if (history.pushState) {
                history.pushState(null, null, targetId);
            } else {
                window.location.hash = targetId;
            }
        }
    });
});

// Active nav link based on scroll position
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if (pageYOffset >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});
// استبدل الكودين السابقين بهذا الكود الموحد
const contactForm = document.getElementById('contactForm');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('spinner');
        
        // Show loading spinner
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        // Reset validation
        document.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
        });
        
        // Submit form via AJAX
        fetch(contactForm.action, {
            method: 'POST',
            body: new FormData(contactForm),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                alert('Message sent successfully!');
                
                // Reset form
                contactForm.reset();
            } else {
                // Display validation errors or general error
                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const input = document.getElementById(field);
                        const errorElement = document.getElementById(`${field}Error`);
                        
                        if (input && errorElement) {
                            input.classList.add('is-invalid');
                            errorElement.textContent = data.errors[field][0];
                        }
                    });
                } else {
                    alert('Error: ' + (data.message || 'An error occurred'));
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        })
        .finally(() => {
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
        });
    });
}
// Project Filtering
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        const filter = this.dataset.filter;
        const projectItems = document.querySelectorAll('.project-item');
        
        projectItems.forEach(item => {
            if (filter === 'all' || item.dataset.category === filter) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 50);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
    });
});

// Project Modal
const projectModal = document.getElementById('projectModal');
if (projectModal) {
    projectModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        document.getElementById('modalProjectTitle').textContent = button.dataset.title;
        document.getElementById('modalProjectCategory').textContent = button.dataset.category;
        document.getElementById('modalProjectDate').textContent = button.dataset.date;
        document.getElementById('modalProjectTechnologies').textContent = button.dataset.technologies;
        document.getElementById('modalProjectDescription').textContent = button.dataset.description;
        document.getElementById('modalProjectImage').src = button.dataset.image;
        
        const linkBtn = document.getElementById('modalProjectLink');
        if (button.dataset.link) {
            linkBtn.href = button.dataset.link;
            linkBtn.style.display = 'inline-block';
        } else {
            linkBtn.style.display = 'none';
        }
    });
}

// Toggle Favorite
document.querySelectorAll('.toggle-favorite').forEach(btn => {
    btn.addEventListener('click', function() {
        const icon = this.querySelector('i');
        icon.classList.toggle('far');
        icon.classList.toggle('fas');
        icon.classList.toggle('text-danger');
        
        const projectId = this.dataset.projectId;
        // AJAX request to save favorite status would go here
    });
});

// Initialize VanillaTilt for project cards
if (typeof VanillaTilt !== 'undefined') {
    document.querySelectorAll('.project-card').forEach(card => {
        VanillaTilt.init(card, {
            max: 15,
            speed: 400,
            glare: true,
            'max-glare': 0.2,
        });
    });
}
// Animation for timeline items
const aboutObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate');
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.timeline-item').forEach(item => {
    aboutObserver.observe(item);
});

// Skill bars animation
document.querySelectorAll('.progress-bar').forEach(bar => {
    const width = bar.style.width;
    bar.style.width = '0';
    setTimeout(() => {
        bar.style.width = width;
    }, 100);
});
//    // Form Validation
//     const contactForm = document.getElementById('contactForm');
//     if (contactForm) {
//         contactForm.addEventListener('submit', function(e) {
//             e.preventDefault();
            
//             const submitBtn = document.getElementById('submitBtn');
//             const spinner = document.getElementById('spinner');
            
//             // Show loading spinner
//             submitBtn.disabled = true;
//             spinner.classList.remove('d-none');
            
//             // Reset validation
//             document.querySelectorAll('.is-invalid').forEach(el => {
//                 el.classList.remove('is-invalid');
//             });
            
//             // Submit form via AJAX
//             fetch(contactForm.action, {
//                 method: 'POST',
//                 body: new FormData(contactForm),
//                 headers: {
//                     'X-Requested-With': 'XMLHttpRequest',
//                     'Accept': 'application/json'
//                 }
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.success) {
//                     // Show success modal
//                     const successModal = new bootstrap.Modal(document.getElementById('successModal'));
//                     successModal.show();
                    
//                     // Reset form
//                     contactForm.reset();
//                 } else {
//                     // Display validation errors
//                     if (data.errors) {
//                         Object.keys(data.errors).forEach(field => {
//                             const input = document.getElementById(field);
//                             const errorElement = document.getElementById(`${field}Error`);
//                             
//                             if (input && errorElement) {
//                                 input.classList.add('is-invalid');
//                                 errorElement.textContent = data.errors[field][0];
//                             }
//                         });
//                     }
//                 }
//             })
//             .catch(error => {
//                 console.error('Error:', error);
//             })
//             .finally(() => {
//                 submitBtn.disabled = false;
//                 spinner.classList.add('d-none');
//             });
//         });
//     }

    // Animate contact methods on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate');
                }, index * 100);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.contact-method').forEach(method => {
        observer.observe(method);
    });