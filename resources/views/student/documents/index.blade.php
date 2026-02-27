<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student | Admission Documents</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 font-sans flex">

    @include('layouts.sidebar.student')

    <main class="flex-1 w-full p-6 sm:p-8 overflow-auto">
        <div class="max-w-7xl mx-auto space-y-8">
            
            @if(session('success'))
                <div id="success-alert" class="flex items-center p-4 mb-4 text-green-800 rounded-2xl bg-green-50 border border-green-100 shadow-sm transition-opacity duration-500">
                    <div class="w-8 h-8 flex items-center justify-center bg-green-100 rounded-full mr-3">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold uppercase tracking-tight">{{ session('success') }}</span>
                    <button onclick="document.getElementById('success-alert').remove()" class="ml-auto text-green-600 hover:text-green-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                </div>
                <script>
                    setTimeout(() => {
                        const alert = document.getElementById('success-alert');
                        if(alert) {
                            alert.style.opacity = '0';
                            setTimeout(() => alert.remove(), 500);
                        }
                    }, 4000);
                </script>
            @endif

            <div class="space-y-6">
                <div class="border-b border-gray-200 pb-6">
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Admission Documents</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage and monitor the verification status of your requirements.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                        $docs_array = [
                            $documents->birth_certificate_path, $documents->report_card_path, 
                            $documents->applicant_photo_path, $documents->father_photo_path, 
                            $documents->mother_photo_path, $documents->guardian_photo_path
                        ];
                        $uploaded_count = count(array_filter($docs_array));
                        $total_count = count($docs_array);
                        $completion = ($uploaded_count / $total_count) * 100;
                    @endphp

                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Upload Progress</p>
                        <div class="mt-2 flex items-end justify-between">
                            <span class="text-3xl font-black text-slate-900">{{ $uploaded_count }}/{{ $total_count }}</span>
                            <span class="text-green-600 font-bold text-sm">{{ round($completion) }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 mt-4 rounded-full overflow-hidden">
                            <div class="bg-green-600 h-full transition-all duration-500" style="width: {{ $completion }}%"></div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Submission Tips</p>
                                <span class="flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                </span>
                            </div>
                            <div class="mt-3 space-y-3">
                                <div class="flex items-start gap-3">
                                    <svg class="w-4 h-4 text-green-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-[11px] text-slate-600 leading-snug">Ensure images are clear and text is readable to avoid <b>Rejection</b>.</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-4 h-4 text-green-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-[11px] text-slate-600 leading-snug">PDF format is preferred for Report Cards and Birth Certificates.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-50">
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-tight italic text-right italic">Updated Feb 2026</p>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Help Desk</p>
                        <p class="mt-2 text-sm text-slate-600 font-medium">Verification takes 1-2 working days.</p>
                        <button class="mt-3 text-[10px] font-black text-green-700 uppercase tracking-widest hover:underline">Contact Registrar</button>
                    </div>
                </div>
            </div>
    
            <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm divide-y divide-slate-100">
                @php
                    $documentTypes = [
                        ['label' => 'Birth Certificate', 'key' => 'birth_certificate_path', 'status_key' => 'birth_cert_status', 'desc' => 'PSA / NSO Original'],
                        ['label' => 'Report Card', 'key' => 'report_card_path', 'status_key' => 'report_card_status', 'desc' => 'Academic Year 2025-2026'],
                        ['label' => 'Student Photo', 'key' => 'applicant_photo_path', 'status_key' => 'applicant_photo_status', 'desc' => 'Standard 2x2 ID'],
                        ['label' => "Father's Photo", 'key' => 'father_photo_path', 'status_key' => 'father_photo_status', 'desc' => 'Parental ID Photo'],
                        ['label' => "Mother's Photo", 'key' => 'mother_photo_path', 'status_key' => 'mother_photo_status', 'desc' => 'Parental ID Photo'],
                        ['label' => "Guardian's Photo", 'key' => 'guardian_photo_path', 'status_key' => 'guardian_photo_status', 'desc' => 'Legal Representative Photo'],
                    ];
                @endphp
    
                @foreach($documentTypes as $doc)
                    @php
                        $dbValue = $documents->{$doc['key']};
                        $status = $documents->{$doc['status_key']} ?? 'pending';
                        $fullUrl = $dbValue ? Storage::url($dbValue) : null;

                        $statusColors = [
                            'pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                            'verified' => 'bg-green-50 text-green-600 border-green-100',
                            'rejected' => 'bg-red-50 text-red-600 border-red-100',
                        ];
                        $badgeClass = $statusColors[strtolower($status)] ?? $statusColors['pending'];
                    @endphp
    
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-5 hover:bg-slate-50/50 transition-all gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-2xl {{ $fullUrl ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-400' }}">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="flex items-center gap-3">
                                    <h4 class="text-sm font-bold text-slate-800 uppercase tracking-tight">{{ $doc['label'] }}</h4>
                                    <span class="px-2 py-0.5 rounded-md border text-[9px] font-black uppercase tracking-widest {{ $badgeClass }}">
                                        {{ $status }}
                                    </span>
                                </div>
                                <p class="text-[11px] font-medium text-slate-400">{{ $doc['desc'] }}</p>
                            </div>
                        </div>
    
                        <div class="flex items-center gap-3">
                            @if($fullUrl)
                                <button type="button" 
                                    onclick="openModal('{{ $fullUrl }}', '{{ addslashes($doc['label']) }}', '{{ addslashes($doc['desc']) }}')" 
                                    class="p-2.5 bg-white border border-slate-200 rounded-xl text-slate-600 hover:text-green-700 hover:border-green-200 shadow-sm transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            @endif
    
                            <button type="button" 
                                onclick="triggerUpload('{{ $doc['key'] }}')" 
                                class="p-2.5 bg-green-700 text-white rounded-xl hover:bg-green-800 shadow-md transition-all active:scale-95 group">
                                <svg class="w-5 h-5 group-active:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <form id="globalUploadForm" action="{{ route('student.documents.update', $documents->id) }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf @method('PUT')
                <input type="file" id="hiddenFileInput" onchange="submitUploadForm(this)">
                <input type="hidden" name="document_type" id="hiddenDocType">
            </form>
        </div>
    </main>
    
    <div id="previewModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
        <div class="fixed inset-0 bg-slate-900/90 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>
        <div class="flex min-h-full items-center justify-center p-4 sm:p-6">
            <div class="relative transform overflow-hidden rounded-[2.5rem] bg-white text-left shadow-2xl transition-all w-full max-w-4xl border border-white/20">
                
                <div class="bg-white px-8 py-6 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-green-600 animate-pulse"></div>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight uppercase" id="modalTitle">Document Preview</h3>
                        </div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-1" id="modalDescription"></p>
                    </div>
                    <button type="button" onclick="closeModal()" class="p-2 bg-slate-50 rounded-full text-slate-400 hover:text-red-600 hover:bg-red-50 transition-all">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="relative bg-slate-50 p-4 sm:p-8 flex items-center justify-center min-h-[450px]">
                    <img id="modalImg" src="" alt="Preview" class="hidden max-w-full max-h-[70vh] rounded-2xl shadow-2xl border-4 border-white object-contain">
                    <iframe id="modalPdf" src="" class="hidden w-full h-[65vh] rounded-2xl border border-slate-200 shadow-inner"></iframe>
                </div>

                <div class="bg-white px-8 py-5 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-[10px] text-slate-400 font-bold uppercase">Admission Document System v2.0</p>
                    <div class="flex items-center gap-4">
                        <button type="button" onclick="closeModal()" class="text-[10px] font-bold text-slate-500 uppercase tracking-widest hover:text-slate-800">Close</button>
                        <a id="modalDownload" href="" download class="flex items-center gap-2 px-8 py-3 bg-green-700 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-green-800 transition-all shadow-lg shadow-green-200 active:scale-95">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function triggerUpload(key) {
            const input = document.getElementById('hiddenFileInput');
            const typeInput = document.getElementById('hiddenDocType');
            typeInput.value = key;
            input.name = key;
            input.click();
        }

        function submitUploadForm(input) {
            if (input.files.length > 0) {
                // Show a simple loading state if you want, or just submit
                document.getElementById('globalUploadForm').submit();
            }
        }

        function openModal(url, title, desc) {
            const modal = document.getElementById('previewModal');
            const img = document.getElementById('modalImg');
            const pdf = document.getElementById('modalPdf');
            const downloadLink = document.getElementById('modalDownload');

            img.classList.add('hidden');
            pdf.classList.add('hidden');

            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalDescription').innerText = desc;
            downloadLink.href = url;

            const extension = url.split('.').pop().split(/\#|\?/)[0].toLowerCase();
            if (extension === 'pdf') {
                pdf.src = url;
                pdf.classList.remove('hidden');
                img.src = '';
            } else {
                img.src = url;
                img.classList.remove('hidden');
                pdf.src = '';
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('previewModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.getElementById('modalImg').src = '';
            document.getElementById('modalPdf').src = '';
        }

        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });
    </script>
</body>
</html>