<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile.edit') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.skills.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-code"></i>
                        <p>Skills</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.certificates.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-certificate"></i>
                        <p>Certificates</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.educations.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>Educations</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.experiences.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Experiences</p>
                    </a>
                </li>
                <!-- يمكنك إضافة المزيد من عناصر القائمة هنا -->
            </ul>
        </nav>
    </div>
</aside>