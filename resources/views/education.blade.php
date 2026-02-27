<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Education</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    
    @include('layouts.header')

    <section class="relative min-h-[700px] flex items-center justify-center overflow-hidden bg-white px-6 py-20">
    
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-full lg:w-[45%] h-full bg-[#15803d] lg:rounded-l-[100px] shadow-2xl transition-all duration-700"></div>
            
            <div class="absolute top-0 left-0 w-[55%] h-full opacity-[0.03] pointer-events-none hidden lg:block" style="background-image: radial-gradient(#15803d 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>
    
        <div class="relative z-10 mx-auto max-w-[1400px] w-full grid lg:grid-cols-2 gap-16 items-center">
            
            <div class="text-left">
                <div class="mb-6 inline-flex items-center gap-3">
                    <span class="h-px w-8 bg-[#15803d]"></span>
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-[#15803d]">Est. 1990 — Academic Excellence</span>
                </div>
    
                <h1 class="text-slate-900 text-6xl md:text-7xl lg:text-8xl font-black leading-[0.9] tracking-tighter">
                    UNCOMPROMISED <br>
                    <span class="text-[#15803d]">EDUCATION.</span>
                </h1>
    
                <p class="mt-8 max-w-lg text-lg text-slate-600 leading-relaxed font-medium">
                    At <span class="text-[#15803d] font-bold">First United Methodist Church Ecumenical School Inc.</span>, we blend traditional values with modern innovation to prepare students for a changing world.
                </p>
    
                <div class="mt-10 flex flex-wrap gap-5">
                    <a href="#admissionForm" class="px-10 py-5 bg-[#15803d] text-white font-black rounded-2xl shadow-xl hover:bg-[#166534] transition-all flex items-center gap-3">
                        ENROLL YOUR CHILD
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <button class="px-10 py-5 border-2 border-slate-200 text-slate-800 font-bold rounded-2xl hover:bg-slate-50 transition-all">
                        OUR CURRICULUM
                    </button>
                </div>
                
                <div class="mt-12 grid grid-cols-3 gap-8 border-t border-slate-100 pt-8">
                    <div>
                        <p class="text-3xl font-black text-[#15803d]">100%</p>
                        <p class="text-[10px] font-bold uppercase text-slate-400 tracking-widest">Passing Rate</p>
                    </div>
                    <div>
                        <p class="text-3xl font-black text-[#15803d]">15:1</p>
                        <p class="text-[10px] font-bold uppercase text-slate-400 tracking-widest">Teacher Ratio</p>
                    </div>
                    <div>
                        <p class="text-3xl font-black text-[#15803d]">TOP</p>
                        <p class="text-[10px] font-bold uppercase text-slate-400 tracking-widest">Tier Facility</p>
                    </div>
                </div>
            </div>
    
            <div class="relative group">
                <div class="bg-white rounded-[50px] p-10 lg:p-14 shadow-[0_50px_100px_-20px_rgba(0,0,0,0.15)] border border-slate-100 relative z-10 transition-transform duration-500 group-hover:-translate-y-2">
                    
                    <h3 class="text-slate-900 font-black text-3xl mb-10 tracking-tight">Why Choose Our School?</h3>
    
                    <div class="space-y-10">
                        <div class="flex gap-6">
                            <div class="flex-shrink-0 w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-[#15803d]">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                            </div>
                            <div>
                                <h4 class="text-slate-800 font-bold text-lg">Holistic Curriculum</h4>
                                <p class="text-slate-500 text-sm leading-relaxed mt-1">We offer a globally competitive program focused on Science, Math, and the Arts.</p>
                            </div>
                        </div>
    
                        <div class="flex gap-6">
                            <div class="flex-shrink-0 w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-[#15803d]">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                            </div>
                            <div>
                                <h4 class="text-slate-800 font-bold text-lg">Values-Based Learning</h4>
                                <p class="text-slate-500 text-sm leading-relaxed mt-1">Nurturing character and spiritual growth through faith-integrated education.</p>
                            </div>
                        </div>
    
                        <div class="flex gap-6">
                            <div class="flex-shrink-0 w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-[#15803d]">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <h4 class="text-slate-800 font-bold text-lg">Tech-Integrated Classrooms</h4>
                                <p class="text-slate-500 text-sm leading-relaxed mt-1">Equipping students with digital literacy for the 21st-century landscape.</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-yellow-400 rounded-full z-0 animate-bounce transition-all duration-[3000ms]"></div>
            </div>
        </div>
    </section>



</body>
</html>