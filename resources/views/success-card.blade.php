<script src="https://cdn.tailwindcss.com"></script>

@php
    // Logic check: Is the student logged in?
    $isLoggedIn = auth()->check(); 
    $targetUrl = $isLoggedIn ? '/payment' : '/login';
    $buttonText = $isLoggedIn ? 'Proceed to Payment' : 'Login to Pay';
@endphp

<div id="success-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-white backdrop-blur-sm p-4">
  <div class="relative max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden border border-green-100 animate-in fade-in zoom-in duration-300">
    
  

    <div class="bg-green-700 p-10 flex flex-col items-center">
      <div class="bg-white p-4 rounded-2xl shadow-lg">
        <svg class="w-12 h-12 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
        </svg>
      </div>
    </div>

    <div class="px-10 pt-8 pb-10 text-center">
      <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Documents Verified</h2>
      <p class="text-slate-500 text-sm mb-8">
        Your information is safe. To secure your slot and generate a <strong>Student ID</strong>, please complete the final step.
      </p>

      <div class="space-y-3">
        @if($isLoggedIn)
            <a href="/student/tuitions" class="flex items-center justify-center w-full bg-green-700 hover:bg-green-800 text-white font-bold py-4 rounded-xl shadow-lg transition-all transform active:scale-95">
              <span>Proceed to Payment</span>
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </a>
        @else
            <a href="/login" class="flex items-center justify-center w-full bg-green-700 hover:bg-green-800 text-white font-bold py-4 rounded-xl shadow-lg transition-all transform active:scale-95">
              <span>Login to Proceed</span>
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
              </svg>
            </a>
        @endif
        
        <a href="/" class="block w-full text-center text-slate-400 hover:text-slate-600 font-medium py-2 text-sm transition-colors">
          Return to Home
        </a>
      </div>

      <div class="mt-8 pt-6 border-t border-slate-50 text-[11px] text-slate-400">
        @if(!$isLoggedIn)
          <p class="italic text-green-600 font-medium">Authentication required for payment security.</p>
        @else
          <p>Redirecting to secure payment gateway...</p>
        @endif
      </div>
    </div>
  </div>
</div>

<script>
function closeModal() {
    const modal = document.getElementById('success-modal');
    
    // Add exit animation
    modal.classList.add('opacity-0', 'transition-opacity', 'duration-300');

    // Wait for animation, then redirect
    setTimeout(() => {
        window.location.href = '/admissions'; // ← redirect to admissions page
    }, 300);
}  </script>