<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Profile, Education, Skill, Project, Certificate, Experience, User};
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * عرض لوحة التحكم الرئيسية
     */
    public function dashboard()
    {
    $stats = [
        'skills' => Skill::count(),
        'projects' => Project::count(),
        'certificates' => Certificate::count(),
        'educations' => Education::count(),
        'experiences' => Experience::count(),
        'visitors' => 1254,
        'messages' => 42
    ];

    $recentProjects = Project::latest()->take(5)->get();
    $profile = Profile::first(); // تأكد من وجود هذا السطر إذا كنت تستخدم $profile في العرض

    return view('admin.dashboard', compact('stats', 'recentProjects', 'profile'));
    }

    /**
     * عرض نموذج تسجيل الدخول
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * معالجة محاولة تسجيل الدخول
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * تسجيل الخروج
     */
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    /**
     * عرض نموذج تعديل الملف الشخصي
     */
    public function editProfile()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * تحديث الملف الشخصي
     */
    public function updateProfile(Request $request)
    {
        $profile = Profile::first();

        $data = $request->validate([
            'full_name_en' => 'required|string|max:255',
            'full_name_ar' => 'required|string|max:255',
            'short_name_en' => 'required|string|max:255',
            'short_name_ar' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'address_en' => 'required|string',
            'address_ar' => 'required|string',
            'about_en' => 'required|string',
            'about_ar' => 'required|string',
            'birth_date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('profile', 'public');
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logo', 'public');
        }

        $profile->update($data);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully');
    }
public function deletePhoto(Request $request)
{
    $profile = Profile::first();
    
    if ($profile->photo) {
        Storage::disk('public')->delete($profile->photo);
        $profile->update(['photo' => null]);
    }

    return redirect()->route('admin.profile.edit')
                   ->with('success', __('Profile photo deleted successfully'));
}
public function deleteLogo(Request $request)
{
    $profile = Profile::first();
    
    if ($profile->logo) {
        Storage::disk('public')->delete($profile->logo);
        $profile->update(['logo' => null]);
    }

    return redirect()->route('admin.profile.edit')
                   ->with('success', __('Logo deleted successfully'));
}
    // سيتم إضافة دوال CRUD للأقسام الأخرى هنا
    /**
 * عرض قائمة المشاريع
 */
public function projectsIndex()
{
    $projects = Project::latest()->paginate(10);
    return view('admin.projects.index', compact('projects'));
}

/**
 * عرض نموذج إنشاء مشروع جديد
 */
public function projectsCreate()
{
    return view('admin.projects.create');
}

/**
 * حفظ المشروع الجديد
 */
public function projectsStore(Request $request)
{
    $data = $request->validate([
        'title_en' => 'required|string|max:255',
        'title_ar' => 'required|string|max:255',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'date' => 'required|date',
        'technologies' => 'required|string',
        'link' => 'nullable|url',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('projects', 'public');
    }

    Project::create($data);

    return redirect()->route('admin.projects.index')
                   ->with('success', __('Project created successfully'));
}

/**
 * عرض تفاصيل مشروع معين
 */
public function projectsShow(Project $project)
{
    return view('admin.projects.show', compact('project'));
}

/**
 * عرض نموذج تعديل مشروع
 */
public function projectsEdit(Project $project)
{
    return view('admin.projects.edit', compact('project'));
}

/**
 * تحديث المشروع
 */
public function projectsUpdate(Request $request, Project $project)
{
    $data = $request->validate([
        'title_en' => 'required|string|max:255',
        'title_ar' => 'required|string|max:255',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'date' => 'required|date',
        'technologies' => 'required|string',
        'link' => 'nullable|url',
    ]);

    if ($request->hasFile('image')) {
        // حذف الصورة القديمة إذا وجدت
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $data['image'] = $request->file('image')->store('projects', 'public');
    }

    $project->update($data);

    return redirect()->route('admin.projects.index')
                   ->with('success', __('Project updated successfully'));
}

/**
 * حذف مشروع
 */
public function projectsDestroy(Project $project)
{
    if ($project->image) {
        Storage::disk('public')->delete($project->image);
    }

    $project->delete();

    return redirect()->route('admin.projects.index')
                   ->with('success', __('Project deleted successfully'));
}
// app/Http/Controllers/AdminController.php



// أضف هذه الدوال داخل class AdminController

/**
 * عرض قائمة المهارات
 */
public function skillsIndex()
{
    $skills = Skill::orderBy('category')->orderBy('name_en')->paginate(10);
    return view('admin.skills.index', compact('skills'));
}

/**
 * عرض نموذج إنشاء مهارة جديدة
 */
public function skillsCreate()
{
    return view('admin.skills.create');
}

/**
 * حفظ المهارة الجديدة
 */
public function skillsStore(Request $request)
{
    $data = $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'percentage' => 'required|integer|min:1|max:100',
        'category' => 'required|string|max:255',
        'icon' => 'nullable|string|max:255',
    ]);

    Skill::create($data);

    return redirect()->route('admin.skills.index')
                   ->with('success', __('Skill created successfully'));
}

/**
 * عرض تفاصيل مهارة معينة
 */
public function skillsShow(Skill $skill)
{
    return view('admin.skills.show', compact('skill'));
}

/**
 * عرض نموذج تعديل مهارة
 */
public function skillsEdit(Skill $skill)
{
    return view('admin.skills.edit', compact('skill'));
}

/**
 * تحديث المهارة
 */
public function skillsUpdate(Request $request, Skill $skill)
{
    $data = $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'percentage' => 'required|integer|min:1|max:100',
        'category' => 'required|string|max:255',
        'icon' => 'nullable|string|max:255',
    ]);

    $skill->update($data);

    return redirect()->route('admin.skills.index')
                   ->with('success', __('Skill updated successfully'));
}

/**
 * حذف مهارة
 */
public function skillsDestroy(Skill $skill)
{
    $skill->delete();

    return redirect()->route('admin.skills.index')
                   ->with('success', __('Skill deleted successfully'));
}
/******************** Certificates Methods ********************/
public function certificatesIndex()
{
    $certificates = Certificate::latest()->paginate(10);
    return view('admin.certificates.index', compact('certificates'));
}

public function certificatesCreate()
{
    return view('admin.certificates.create');
}

public function certificatesStore(Request $request)
{
    $data = $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'issuer_en' => 'required|string|max:255',
        'issuer_ar' => 'required|string|max:255',
        'date' => 'required|date',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'description_en' => 'nullable|string',
        'description_ar' => 'nullable|string',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('certificates', 'public');
    }

    Certificate::create($data);

    return redirect()->route('admin.certificates.index')
                   ->with('success', __('Certificate created successfully'));
}

public function certificatesShow(Certificate $certificate)
{
    return view('admin.certificates.show', compact('certificate'));
}

public function certificatesEdit(Certificate $certificate)
{
    return view('admin.certificates.edit', compact('certificate'));
}

public function certificatesUpdate(Request $request, Certificate $certificate)
{
    $data = $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'issuer_en' => 'required|string|max:255',
        'issuer_ar' => 'required|string|max:255',
        'date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'description_en' => 'nullable|string',
        'description_ar' => 'nullable|string',
    ]);

    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($certificate->image);
        $data['image'] = $request->file('image')->store('certificates', 'public');
    }

    $certificate->update($data);

    return redirect()->route('admin.certificates.index')
                   ->with('success', __('Certificate updated successfully'));
}

public function certificatesDestroy(Certificate $certificate)
{
    Storage::disk('public')->delete($certificate->image);
    $certificate->delete();

    return redirect()->route('admin.certificates.index')
                   ->with('success', __('Certificate deleted successfully'));
}

/******************** Education Methods ********************/
public function educationsIndex()
{
    $educations = Education::orderBy('start_date', 'desc')->paginate(10);
    return view('admin.educations.index', compact('educations'));
}

public function educationsCreate()
{
    return view('admin.educations.create');
}

public function educationsStore(Request $request)
{
    $data = $request->validate([
        'degree_en' => 'required|string|max:255',
        'degree_ar' => 'required|string|max:255',
        'institution_en' => 'required|string|max:255',
        'institution_ar' => 'required|string|max:255',
        'field_en' => 'required|string|max:255',
        'field_ar' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'grade' => 'nullable|string|max:50',
        'position' => 'nullable|integer',
    ]);

    Education::create($data);

    return redirect()->route('admin.educations.index')
                   ->with('success', __('Education record created successfully'));
}

public function educationsShow(Education $education)
{
    return view('admin.educations.show', compact('education'));
}

public function educationsEdit(Education $education)
{
    return view('admin.educations.edit', compact('education'));
}

public function educationsUpdate(Request $request, Education $education)
{
    $data = $request->validate([
        'degree_en' => 'required|string|max:255',
        'degree_ar' => 'required|string|max:255',
        'institution_en' => 'required|string|max:255',
        'institution_ar' => 'required|string|max:255',
        'field_en' => 'required|string|max:255',
        'field_ar' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'grade' => 'nullable|string|max:50',
        'position' => 'nullable|integer',
    ]);

    $education->update($data);

    return redirect()->route('admin.educations.index')
                   ->with('success', __('Education record updated successfully'));
}

public function educationsDestroy(Education $education)
{
    $education->delete();

    return redirect()->route('admin.educations.index')
                   ->with('success', __('Education record deleted successfully'));
}

/******************** Experiences Methods ********************/
public function experiencesIndex()
{
    $experiences = Experience::orderBy('start_date', 'desc')->paginate(10);
    return view('admin.experiences.index', compact('experiences'));
}

public function experiencesCreate()
{
    return view('admin.experiences.create');
}

public function experiencesStore(Request $request)
{
    $data = $request->validate([
        'position_en' => 'required|string|max:255',
        'position_ar' => 'required|string|max:255',
        'company_en' => 'required|string|max:255',
        'company_ar' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
    ]);

    Experience::create($data);

    return redirect()->route('admin.experiences.index')
                   ->with('success', __('Experience record created successfully'));
}

public function experiencesShow(Experience $experience)
{
    return view('admin.experiences.show', compact('experience'));
}

public function experiencesEdit(Experience $experience)
{
    return view('admin.experiences.edit', compact('experience'));
}

public function experiencesUpdate(Request $request, Experience $experience)
{
    $data = $request->validate([
        'position_en' => 'required|string|max:255',
        'position_ar' => 'required|string|max:255',
        'company_en' => 'required|string|max:255',
        'company_ar' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
    ]);

    $experience->update($data);

    return redirect()->route('admin.experiences.index')
                   ->with('success', __('Experience record updated successfully'));
}

public function experiencesDestroy(Experience $experience)
{
    $experience->delete();

    return redirect()->route('admin.experiences.index')
                   ->with('success', __('Experience record deleted successfully'));
}
}