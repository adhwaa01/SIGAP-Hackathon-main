<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Competency;
use App\Models\LearningProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => ['sometimes', 'nullable', Rule::in(['user', 'learner', 'teacher', 'mentor', 'officer', 'institution', 'admin'])],
        ]);

        $selectedRole = $validated['role'] ?? null;

        if (Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ])) {
            $user = Auth::user();

            if ($selectedRole && $user->role !== $selectedRole) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'role' => 'Role yang dipilih tidak sesuai dengan akun ini.',
                ]);
            }

            $request->session()->regenerate();

            return redirect()->intended($this->getDashboardRouteForRole($user->role));
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak cocok.',
        ]);
    }

    protected function getDashboardRouteForRole(?string $role): string
    {
        return match ($role) {
            'user', 'learner' => '/user/dashboard',
            'teacher' => '/teacher/dashboard',
            'mentor' => '/mentor/dashboard',
            'officer' => '/officer/dashboard',
            'institution' => '/institution/dashboard',
            'admin' => '/admin/dashboard',
            default => '/teacher/login',
        };
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }

    public function mentorDashboard()
    {
        return view('mentor.dashboard');
    }

    public function officerDashboard()
    {
        return view('officer.dashboard');
    }

    public function institutionDashboard()
    {
        return view('institution.dashboard');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function dashboard()
    {
        // Get all learners
        $students = User::where('role', 'learner')->get()->map(function ($student) {
            $progress = LearningProgress::where('user_id', $student->id)->get();
            $avgMastery = $progress->avg('mastery_level') ?? 0;
            
            // Determine status based on average mastery
            if ($avgMastery < 50) {
                $status = 'Need Attention';
                $statusColor = 'red';
            } elseif ($avgMastery < 75) {
                $status = 'Improving';
                $statusColor = 'amber';
            } else {
                $status = 'On Track';
                $statusColor = 'green';
            }

            return [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email,
                'avg_mastery' => round($avgMastery),
                'status' => $status,
                'status_color' => $statusColor,
                'last_active' => $progress->max('last_assessed_at') ? $progress->max('last_assessed_at')->diffForHumans() : 'Belum pernah ujian'
            ];
        })->sortBy('avg_mastery'); // Sort by weakest first

        return view('teacher.dashboard', compact('students'));
    }

    public function studentDetail($id)
    {
        $student = User::where('role', 'learner')->findOrFail($id);
        
        $competencies = Competency::orderBy('order')->get()->map(function ($comp) use ($student) {
            $progress = LearningProgress::where('user_id', $student->id)
                ->where('competency_id', $comp->id)
                ->first();
                
            return [
                'name' => $comp->name,
                'mastery_level' => $progress ? $progress->mastery_level : 0,
                'assessment_count' => $progress ? $progress->assessment_count : 0,
                'last_assessed_at' => $progress ? $progress->last_assessed_at : null,
            ];
        });

        $avgMastery = $competencies->avg('mastery_level') ?? 0;

        return view('teacher.student', compact('student', 'competencies', 'avgMastery'));
    }
}
