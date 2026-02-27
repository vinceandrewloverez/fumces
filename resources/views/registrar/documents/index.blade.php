<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrar | Document Tracking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-50 font-sans">

    @include('layouts.sidebar.registrar')

    <main class="flex-1 p-6 lg:p-10 bg-slate-50 min-h-screen font-sans">
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Document Tracking</h1>
                <p class="text-slate-500 mt-1 font-medium">Monitor and verify applicant requirements in real-time.</p>
            </div>
        </header>
    
        <div class="space-y-4">
            @forelse($documents as $doc)
                @php
                    $requirements = [
                        ['id' => 'birth_cert', 'label' => 'Birth Certificate', 'status' => $doc->birth_cert_status, 'path' => $doc->birth_certificate_path],
                        ['id' => 'report_card', 'label' => 'Report Card', 'status' => $doc->report_card_status, 'path' => $doc->report_card_path],
                        ['id' => 'app_photo', 'label' => 'Applicant Photo', 'status' => $doc->applicant_photo_status, 'path' => $doc->applicant_photo_path],
                        ['id' => 'fa_photo', 'label' => 'Father\'s Photo', 'status' => $doc->father_photo_status, 'path' => $doc->father_photo_path],
                        ['id' => 'mo_photo', 'label' => 'Mother\'s Photo', 'status' => $doc->mother_photo_status, 'path' => $doc->mother_photo_path],
                        ['id' => 'gu_photo', 'label' => 'Guardian\'s Photo', 'status' => $doc->guardian_photo_status, 'path' => $doc->guardian_photo_path],
                    ];
                    $approvedCount = collect($requirements)->where('status', 'approved')->count();
                    $total = count($requirements);
                    $percentage = ($total > 0) ? ($approvedCount / $total) * 100 : 0;
                @endphp
    
                <details class="group bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden transition-all">
                    <summary class="list-none cursor-pointer p-6 flex flex-col lg:flex-row lg:items-center gap-8 select-none">
                        <div class="w-full lg:w-1/4 flex items-center gap-4">
                            <div class="h-12 w-12 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-500 font-bold group-open:bg-green-700 group-open:text-white transition-colors">
                                {{ substr($doc->studentFullName ?? 'U', 0, 1) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 leading-tight">
                                    {{ $doc->studentFullName }}
                                </h3>
                                                                <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">ID: #{{ $doc->admission_id }}</p>
                            </div>
                        </div>
    
                        <div class="flex-1 w-full">
                            <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                                <div class="bg-green-700 h-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
    
                        <div class="hidden lg:block text-slate-300 group-open:rotate-180 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </summary>
    
                    <div class="px-6 pb-8 pt-2 bg-slate-50/50 border-t border-slate-50">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($requirements as $req)
                                <div id="card-{{ $doc->admission_id }}-{{ $req['id'] }}" class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Document</span>
                                        <span class="text-sm font-bold text-slate-700">{{ $req['label'] }}</span>
                                    </div>
    
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="openDocModal('modal-{{ $doc->admission_id }}-{{ $req['id'] }}')" class="p-2 rounded-xl bg-slate-50 text-slate-400 hover:bg-green-700 hover:text-white transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        
                                        <div class="status-container">
                                            @if($req['status'] === 'approved')
                                                <span class="px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase border border-emerald-100">Verified</span>
                                            @else
                                                <button type="button" onclick="approveDocument(this, '{{ $doc->admission_id }}', '{{ $req['id'] }}')" class="px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-slate-600 text-[10px] font-black hover:bg-emerald-500 hover:text-white transition-all shadow-sm">
                                                    Approve
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </details>
    
                @foreach($requirements as $req)
                    <div id="modal-{{ $doc->admission_id }}-{{ $req['id'] }}" class="hidden fixed inset-0 z-[9999] flex items-center justify-center p-4">
                        <div class="absolute inset-0 bg-slate-900/90 backdrop-blur-sm" onclick="closeDocModal('modal-{{ $doc->admission_id }}-{{ $req['id'] }}')"></div>
                        <div class="relative bg-white rounded-[2rem] w-full max-w-5xl max-h-[90vh] overflow-hidden flex flex-col shadow-2xl">
                            <div class="p-6 border-b flex justify-between items-center bg-white">
                                <div class="flex items-center gap-4">
                                    <h2 class="font-black text-slate-900 text-lg uppercase tracking-tight">{{ $req['label'] }}</h2>
                                    <span class="bg-green-700 text-white text-[10px] font-bold px-2 py-1 rounded-md">{{ $doc->studentFullName }}</span>
                                </div>
                                <button onclick="closeDocModal('modal-{{ $doc->admission_id }}-{{ $req['id'] }}')" class="p-2 rounded-full hover:bg-slate-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                            </div>
    
                            <div class="flex-1 overflow-auto bg-slate-200 p-4 md:p-8 flex items-center justify-center min-h-[400px]">
                                @if($req['path'])
                                    @php
                                        $extension = pathinfo($req['path'], PATHINFO_EXTENSION);
                                        $fileUrl = asset('storage/' . $req['path']);
                                    @endphp
                                    @if(strtolower($extension) === 'pdf')
                                        <iframe src="{{ $fileUrl }}#toolbar=0" class="w-full h-full min-h-[600px] bg-white rounded-xl shadow-lg" frameborder="0"></iframe>
                                    @else
                                        <img src="{{ $fileUrl }}" class="max-w-full max-h-[75vh] rounded-xl shadow-2xl border-4 border-white object-contain" alt="Preview">
                                    @endif
                                @else
                                    <div class="text-center py-20">
                                        <p class="text-slate-400 font-bold uppercase tracking-widest text-sm italic">No Document File Found on Server</p>
                                    </div>
                                @endif
                            </div>
    
                            <div class="p-6 bg-white border-t flex justify-end gap-3">
                                <button onclick="closeDocModal('modal-{{ $doc->admission_id }}-{{ $req['id'] }}')" class="px-6 py-2 text-xs font-bold text-slate-500 uppercase">Close</button>
                                @if($req['status'] !== 'approved')
                                    <button onclick="approveDocument(this, '{{ $doc->admission_id }}', '{{ $req['id'] }}')" class="px-10 py-3 bg-slate-900 text-white rounded-2xl text-xs font-bold shadow-lg hover:bg-green-700 transition-all uppercase tracking-widest">Verify & Close</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @empty
                <div class="bg-white rounded-3xl p-20 border-2 border-dashed border-slate-200 text-center text-slate-400">No data.</div>
            @endforelse
        </div>
    </main>    

    <script>
        function openDocModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeDocModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        function approveDocument(button, admissionId, docType) {
            const originalContent = button.innerHTML;
            button.innerHTML = 'Updating...';
            button.disabled = true;

            fetch('/registar/documents/approve', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    admission_id: admissionId,
                    document_type: docType
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update all instances of this status (in dropdown and inside modal if needed)
                    // We look for the status container in the list card
                    const card = document.getElementById(`card-${admissionId}-${docType}`);
                    if (card) {
                        const container = card.querySelector('.status-container');
                        container.innerHTML = `<span class="px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase border border-emerald-100">Verified</span>`;
                    }
                    
                    // Close the modal
                    closeDocModal(`modal-${admissionId}-${docType}`);
                } else {
                    alert('Error: ' + data.message);
                    button.innerHTML = originalContent;
                    button.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = originalContent;
                button.disabled = false;
            });
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('div[id^="modal-"]:not(.hidden)').forEach(m => closeDocModal(m.id));
            }
        });  
    </script>
</body>
</html>