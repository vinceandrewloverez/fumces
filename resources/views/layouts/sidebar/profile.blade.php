<aside class="w-64 min-h-screen bg-[#057E2E] flex flex-col shadow-lg sticky top-0">
    <div class="p-6 border-b border-white/20 text-center space-y-3">
        <div class="w-16 h-16 mx-auto rounded-full bg-white flex items-center justify-center mb-1 shadow-md overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#057E2E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <p class="font-semibold text-white text-lg line-clamp-1">{{ auth()->user()->name ?? 'No Name Found' }}</p>
        <p class="text-xs text-white/70">{{ $user->role }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="mt-2 w-full px-4 py-2 rounded-lg bg-white text-[#057E2E] font-medium hover:bg-gray-100 transition shadow-sm">
                Logout
            </button>
        </form>
    </div>
    <div class="p-4 border-t border-white/20 text-center text-[10px] text-white/80 leading-relaxed uppercase tracking-wider">
        <p class="font-bold">First United Methodist Church Ecumenical School</p>
        @php
        $currentYear = date('Y');
        $nextYear = date('Y') + 1;
        // If today is before June, school year started last year
        if(date('n') < 6){
            $currentYear--;
            $nextYear = $currentYear + 1;
        }
    @endphp
    <p class="mt-1 opacity-60">School Year {{ $currentYear }}–{{ $nextYear }}</p>    </div>
</aside>
