<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-50 font-sans">

    @include('layouts.sidebar.registrar')

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gray-50 min-h-screen">
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Registrar Dashboard</h1>
                <div class="flex items-center gap-3 mt-2 text-sm font-medium text-slate-500">
                    <span
                        class="bg-green-100 text-green-700 px-3 py-1 rounded-full uppercase tracking-wider text-xs font-bold">A.Y.
                        2025-2026</span>
                    <span>•</span>
                    <span
                        class="bg-green-50 text-green-700 px-3 py-1 rounded-full uppercase tracking-wider text-xs font-bold">Second
                        Semester</span>
                </div>
            </div>
            <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-slate-200 text-right">
                <p class="text-slate-400 text-xs uppercase tracking-widest font-bold mb-1">Current Session</p>
                <p class="text-slate-800 font-bold">Friday, February 27, 2026</p>
                <p class="text-green-600 text-sm font-semibold">3:30 PM</p>
            </div>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                <p class="text-sm font-medium text-slate-500 mb-1">Total Enrolled</p>
                <p class="text-3xl font-black text-green-700">{{ $totalEnrolled }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                <p class="text-sm font-medium text-slate-500 mb-1">Pending Review</p>
                <p class="text-3xl font-black text-green-700">{{ $pendingCount }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                <p class="text-sm font-medium text-slate-500 mb-1">Approved</p>
                <p class="text-3xl font-black text-green-700">{{ $totalApproved }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                <p class="text-sm font-medium text-slate-500 mb-1">Rejected</p>
                <div class="flex items-end gap-2">
                    <p class="text-3xl font-black text-green-700">{{$totalRejected }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div
                class="p-8 border-b border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">Pending Admissions</h2>
                    <p class="text-slate-500 text-sm mt-1">Review student credentials and approve for enrollment</p>
                </div>
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <div class="relative flex-1 md:flex-none">
                        <input type="text" placeholder="Search application..."
                            class="w-full md:w-64 pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button
                        class="bg-green-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-green-800 transition-colors">Export
                        List</button>
                </div>
            </div>

            <div class="overflow-x-auto p-4">
                <table class="w-full text-left border-separate border-spacing-y-3">
                    <thead>
                        <tr class="text-slate-400 text-xs uppercase tracking-widest font-bold">
                            <th class="px-6 py-3">Applicant Details</th>
                            <th class="px-6 py-3">Grade Level</th>
                            <th class="px-6 py-3">Submission Date</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admissions as $admission)
                            <tr class="bg-slate-50 hover:bg-slate-100 transition-all group">
                                <!-- Applicant Details -->
                                <td class="px-6 py-4 rounded-l-2xl border-y border-l border-transparent group-hover:border-slate-200">
                                    <div class="flex items-center">
                                        <div class="w-11 h-11 rounded-xl bg-slate-200 flex items-center justify-center font-bold text-slate-700 mr-4 shadow-sm">
                                            {{ strtoupper(substr($admission->studentFirstName, 0, 1) . substr($admission->studentLastName, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900">
                                                {{ $admission->studentFirstName }}
                                                {{ $admission->studentMiddleName ? strtoupper(substr($admission->studentMiddleName, 0, 1)) . '.' : '' }}
                                                {{ $admission->studentLastName }}
                                            </p>
                                            <p class="text-xs text-slate-500 font-medium">
                                                {{ $admission->applicantNumber ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                    
                                <!-- Grade Level -->
                                <td class="px-6 py-4 border-y border-transparent group-hover:border-slate-200">
                                    <span class="text-slate-700 font-bold text-sm">
                                        {{ ucwords(preg_replace('/([a-z]+)(\d+)/i', '$1 $2', $admission->year_level)) }}
                                    </span>
                                </td>
                    
                                <!-- Submission Date -->
                                <td class="px-6 py-4 border-y border-transparent group-hover:border-slate-200 text-sm text-slate-600 font-medium">
                                    {{ $admission->created_at?->format('M d, Y') ?? 'N/A' }}
                                </td>
                    
                                <!-- Status -->
                                <td class="px-6 py-4 border-y border-transparent group-hover:border-slate-200">
                                    <span class="px-2.5 py-1 text-[10px] font-black uppercase rounded-md 
                                        {{ $admission->status == 'Pending' ? 'bg-white text-green-700' : ($admission->status == 'Approved' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                        {{ $admission->status ?? 'Pending' }}
                                    </span>
                                </td>
                    
                                <!-- Actions -->
                                <td class="px-6 py-4 rounded-r-2xl border-y border-r border-transparent group-hover:border-slate-200 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button type="button" 
                                        onclick="openDocumentModal('{{ asset('storage/' . $admission->birth_certificate_path) }}', '{{ asset('storage/' . $admission->report_card_path) }}', '{{ asset('storage/' . $admission->applicant_photo_path) }}', '{{ asset('storage/' . $admission->father_photo_path) }}', '{{ asset('storage/' . $admission->mother_photo_path) }}', '{{ asset('storage/' . $admission->guardian_photo_path) }}')"
                                        class="p-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-green-50 hover:text-green-600 hover:border-green-200 transition-all"
                                        title="View Documents">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>

                                        <form action="{{ route('admissions.approve', $admission->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="p-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-green-600 hover:text-white hover:border-green-600 transition-all"
                                                title="Approve">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"/>
                                                </svg>
                                            </button>
                                        </form>
                                
                                        <form action="{{ route('admissions.reject', $admission->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="p-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-red-500 hover:text-white hover:border-red-500 transition-all"
                                                title="Reject">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>                            </tr>
                        @endforeach
                    </tbody>                </table>
            </div>

            <div class="p-6 border-t border-slate-100 flex justify-between items-center bg-white">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Showing 2 of 15 requests</p>
                <div class="flex gap-2">
                    <button class="p-2 rounded-lg border border-slate-200 hover:bg-slate-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button class="p-2 rounded-lg border border-slate-200 hover:bg-slate-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    
        <div id="docModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm transition-opacity"></div>
        
            <div class="flex items-center justify-center min-h-screen p-4 md:p-10 text-center">
                <div class="relative bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all w-full max-w-7xl border border-slate-200">
                    
                    <div class="bg-white px-8 py-5 border-b border-slate-100 flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-black text-slate-800" id="modal-title">Document Verification</h3>
                            <p class="text-sm text-slate-500">Reviewing all uploaded credentials and identity photos</p>
                        </div>
                        <button onclick="closeDocumentModal()" class="p-2 rounded-full bg-slate-100 text-slate-500 hover:bg-red-50 hover:text-red-600 transition-all">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
        
                    <div class="bg-slate-50 p-8 max-h-[85vh] overflow-y-auto">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            
                            <div class="flex flex-col gap-2">
                                <div class="flex justify-between items-center">
                                    <label class="inline-flex items-center gap-2 text-sm font-bold text-slate-700 uppercase tracking-wider">
                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span> Birth Certificate
                                    </label>
                                    <a id="dl_birth_cert" href="" download class="flex items-center gap-1 text-xs font-bold text-green-600 hover:text-green-800 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                        Download
                                    </a>
                                </div>
                                <div class="bg-white p-2 rounded-2xl border border-slate-200 shadow-sm">
                                    <iframe id="view_birth_cert" class="w-full h-[500px] rounded-xl bg-slate-200" src=""></iframe>
                                </div>
                            </div>
                    
                            <div class="flex flex-col gap-2">
                                <div class="flex justify-between items-center">
                                    <label class="inline-flex items-center gap-2 text-sm font-bold text-slate-700 uppercase tracking-wider">
                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span> Report Card
                                    </label>
                                    <a id="dl_report_card" href="" download class="flex items-center gap-1 text-xs font-bold text-green-600 hover:text-green-800 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                        Download
                                    </a>
                                </div>
                                <div class="bg-white p-2 rounded-2xl border border-slate-200 shadow-sm">
                                    <iframe id="view_report_card" class="w-full h-[500px] rounded-xl bg-slate-200" src=""></iframe>
                                </div>
                            </div>
                    
                            <div class="lg:col-span-2">
                                <label class="inline-flex items-center gap-2 text-sm font-bold text-slate-700 uppercase tracking-wider mb-4">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span> Identity Photographs
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                    <div class="bg-white p-3 rounded-2xl border border-slate-200 shadow-sm">
                                        <div class="flex justify-between items-center mb-3">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase">Applicant</p>
                                            <a id="dl_app_photo" href="" download class="text-emerald-600 hover:text-emerald-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                            </a>
                                        </div>
                                        <img id="view_app_photo" class="w-full h-48 object-cover rounded-xl" src="">
                                    </div>
                                    <div class="bg-white p-3 rounded-2xl border border-slate-200 shadow-sm">
                                        <div class="flex justify-between items-center mb-3">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase">Father</p>
                                            <a id="dl_father_photo" href="" download class="text-emerald-600 hover:text-emerald-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                            </a>
                                        </div>
                                        <img id="view_father_photo" class="w-full h-48 object-cover rounded-xl" src="">
                                    </div>
                                    <div class="bg-white p-3 rounded-2xl border border-slate-200 shadow-sm">
                                        <div class="flex justify-between items-center mb-3">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase">Mother</p>
                                            <a id="dl_mother_photo" href="" download class="text-emerald-600 hover:text-emerald-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                            </a>
                                        </div>
                                        <img id="view_mother_photo" class="w-full h-48 object-cover rounded-xl" src="">
                                    </div>
                                    <div class="bg-white p-3 rounded-2xl border border-slate-200 shadow-sm">
                                        <div class="flex justify-between items-center mb-3">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase">Guardian</p>
                                            <a id="dl_guardian_photo" href="" download class="text-emerald-600 hover:text-emerald-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                            </a>
                                        </div>
                                        <img id="view_guardian_photo" class="w-full h-48 object-cover rounded-xl" src="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="bg-white px-8 py-5 border-t border-slate-100 flex justify-end gap-3">
                        <button onclick="closeDocumentModal()" class="bg-slate-100 text-slate-600 px-8 py-2.5 rounded-xl font-bold text-sm hover:bg-slate-200 transition-all">
                            Finish Review
                        </button>
                    </div>
                </div>
            </div>
        </div>    
    </main>

</body>

</html>

<script>
function openDocumentModal(birth, report, applicant, father, mother, guardian) {
    // Helper to set both view and download sources
    const setDoc = (id, dlId, source) => {
        const viewEl = document.getElementById(id);
        const dlEl = document.getElementById(dlId);
        if(viewEl) viewEl.src = source;
        if(dlEl) dlEl.href = source;
    };

    setDoc('view_birth_cert', 'dl_birth_cert', birth);
    setDoc('view_report_card', 'dl_report_card', report);
    setDoc('view_app_photo', 'dl_app_photo', applicant);
    setDoc('view_father_photo', 'dl_father_photo', father);
    setDoc('view_mother_photo', 'dl_mother_photo', mother);
    setDoc('view_guardian_photo', 'dl_guardian_photo', guardian);
    
    document.getElementById('docModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeDocumentModal() {
    document.getElementById('docModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    
    // Clear sources
    const ids = ['view_birth_cert', 'view_report_card', 'view_app_photo', 'view_father_photo', 'view_mother_photo', 'view_guardian_photo'];
    const dlIds = ['dl_birth_cert', 'dl_report_card', 'dl_app_photo', 'dl_father_photo', 'dl_mother_photo', 'dl_guardian_photo'];
    
    ids.forEach(id => document.getElementById(id).src = '');
    dlIds.forEach(id => document.getElementById(id).href = '');
}
</script>