$(function () {
    // Enable tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Enable popovers
    $('[data-toggle="popover"]').popover();
    
    // Initialize summernote editor
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    
    // Handle file input labels
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    
    // Confirm before delete
    $('.confirm-before-delete').on('click', function(e) {
        if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();
        }
    });
    
    // Toggle dark mode
    $('#darkModeToggle').on('change', function() {
        $('body').toggleClass('dark-mode');
        // يمكن إضافة AJAX call لحفظ التفضيل
    });
    
    // DataTable initialization
    if ($.fn.DataTable) {
        $('.data-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    }
});
$(function () {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Initialize popovers
    $('[data-toggle="popover"]').popover();
    
    // Theme switcher
    $('.theme-switcher').on('click', function(e) {
        e.preventDefault();
        fetch($(this).attr('href'), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(() => window.location.reload());
    });
    
    // Sidebar treeview
    $('.nav-treeview .nav-link').on('click', function() {
        $('.nav-treeview .nav-link').removeClass('active');
        $(this).addClass('active');
    });
    
    // Active menu item
    const currentUrl = window.location.href;
    $('.nav-sidebar a').each(function() {
        if (this.href === currentUrl) {
            $(this).addClass('active');
            $(this).parents('.has-treeview').addClass('menu-open');
        }
    });
});
// في admin.js
const theme = localStorage.getItem('theme') || 'light';
if (theme === 'dark') {
    $('body').addClass('dark-mode');
}