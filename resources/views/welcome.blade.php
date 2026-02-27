<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FUMCES - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="{{ asset('resources/fumces_logo.jpg') }}" type="image/png">
  <style>
    /* Premium Reveal Animations */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .reveal.active {
      opacity: 1;
      transform: translateY(0);
    }

    /* Staggered delays for grids */
    .delay-100 { transition-delay: 100ms; }
    .delay-200 { transition-delay: 200ms; }
    .delay-300 { transition-delay: 300ms; }

    /* Smooth Image Zoom on Hover */
    .hover-zoom {
      overflow: hidden;
    }
    .hover-zoom img {
      transition: transform 0.5s ease;
    }
    .hover-zoom:hover img {
      transform: scale(1.05);
    }
  </style>
</head>

<body class="min-h-screen bg-gray-50 dark:bg-gray-900 font-sans flex flex-col scroll-smooth">

  @include('layouts.header')

  <section class="relative min-h-screen flex items-center overflow-hidden pt-2">

    <div class="absolute inset-0 z-0">
      <img src="{{ asset('images/bg-image.jpeg') }}" class="w-full h-full object-cover scale-105 animate-[pulse_10s_infinite]" alt="">
      <div class="absolute inset-0 bg-gradient-to-r from-green-700/90 via-green-700/70 to-transparent"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-white/50 via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 w-full">
      <div class="max-w-2xl px-6 sm:px-12 lg:px-24 text-left">

        <div class="reveal active inline-flex items-center gap-2 bg-white/20 backdrop-blur-md rounded-full px-4 py-2 mb-3 border border-white/10">
          <span class="text-yellow-400 text-sm">✨</span>
          <span class="text-sm font-medium text-white">
            Now Enrolling for 2025–2026
          </span>
        </div>

        <h1 class="reveal active delay-100 text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
          Where Every Child's
          <span class="text-yellow-400">Potential</span>
          Shines Bright
        </h1>

        <p class="reveal active delay-200 text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
          We nurture curious minds through engaging, hands on learning experiences that prepare students for success.
        </p>

        <div class="reveal active delay-300 flex flex-col sm:flex-row gap-4 mb-12">
          <a href="/admissions"
            class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-yellow-400 text-gray-900 font-semibold hover:bg-yellow-300 hover:shadow-lg hover:shadow-yellow-400/20 transform hover:-translate-y-1 transition-all duration-300">
            Enroll Now
          </a>

          <a href="/about"
            class="inline-flex items-center justify-center px-8 py-4 rounded-xl border border-white text-white font-semibold hover:bg-white/10 transform hover:-translate-y-1 transition-all duration-300">
            Learn More About Us
          </a>
        </div>

        <div class="reveal active delay-300 flex flex-wrap gap-10">
          <div>
            <div class="text-3xl font-bold text-yellow-400">
              <span class="counter" data-target="500">0</span>+
            </div>
            <div class="text-sm text-white/80">Happy Students</div>
          </div>

          <div>
            <div class="text-3xl font-bold text-yellow-400">
              <span class="counter" data-target="35">0</span>+
            </div>
            <div class="text-sm text-white/80">Expert Teachers</div>
          </div>

          <div>
            <div class="text-3xl font-bold text-yellow-400">
              <span class="counter" data-target="25">0</span>
            </div>
            <div class="text-sm text-white/80">Years of Excellence</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

      <div class="reveal text-center max-w-2xl mx-auto mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          Why Families Choose <span
            class="bg-clip-text text-transparent bg-gradient-to-r from-green-700 via-green-600 to-green-500">First United Methodist
Church Ecumenical School
            Elementary</span>
        </h2>
        <p class="text-lg text-gray-600">
          We believe every child deserves an education that inspires, challenges, and prepares them for the future.
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div
          class="reveal delay-100 group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
          <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 text-green-700 text-2xl group-hover:scale-110 transition-transform">
            ❤️</div>
          <h3 class="text-xl font-bold text-green-700 mb-3">Nurturing Environment</h3>
          <p class="text-gray-600 leading-relaxed">
            We create a warm, supportive atmosphere where every child feels valued, safe, and ready to learn.
          </p>
        </div>

        <div
          class="reveal delay-200 group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
          <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 text-green-700 text-2xl group-hover:scale-110 transition-transform">
            💡</div>
          <h3 class="text-xl font-bold text-green-700 mb-3">Creative Learning</h3>
          <p class="text-gray-600 leading-relaxed">
            Our curriculum sparks curiosity through hands-on projects, arts, and exploration-based education.
          </p>
        </div>

        <div
          class="reveal delay-300 group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
          <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 text-green-700 text-2xl group-hover:scale-110 transition-transform">
            👥</div>
          <h3 class="text-xl font-bold text-green-700 mb-3">Strong Community</h3>
          <p class="text-gray-600 leading-relaxed">
            Parents, teachers, and students work together to build lasting relationships and shared success.
          </p>
        </div>

        <div
          class="reveal delay-300 group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
          <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 text-green-700 text-2xl group-hover:scale-110 transition-transform">
            🏆</div>
          <h3 class="text-xl font-bold text-green-700 mb-3">Academic Excellence</h3>
          <p class="text-gray-600 leading-relaxed">
            Our proven methods help students achieve their best while developing a lifelong love of learning.
          </p>
        </div>

      </div>
    </div>
  </section>

  <section class="py-24 bg-[#f5f6f1]">
    <div class="max-w-7xl mx-auto px-4">

      <div class="reveal flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
        <div class="max-w-2xl">
          <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-4">
            Our Educational Programs
          </h2>
          <p class="text-lg text-green-700/70">
            A well-rounded curriculum designed to develop the whole child—academically, socially, and emotionally.
          </p>
        </div>
        <a href="/education"
          class="inline-flex items-center gap-2 px-6 py-3 border border-green-700 rounded-xl text-green-700 font-semibold hover:bg-green-700 hover:text-white transition-all duration-300">
          View All Programs →
        </a>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="reveal group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden border border-gray-100">
          <div class="h-2 bg-green-700 transform origin-left group-hover:scale-x-110 transition-transform duration-500"></div>
          <div class="p-8">
            <div class="flex items-start justify-between mb-4">
              <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center text-green-700 text-2xl group-hover:rotate-12 transition-transform">
                📚</div>
              <span class="text-xs font-semibold bg-green-100 text-green-700 px-3 py-1 rounded-full">Grades K-5</span>
            </div>
            <h3 class="text-xl font-bold text-green-700 mb-3">Language Arts</h3>
            <p class="text-green-700/70 leading-relaxed">
              Reading, writing, and communication skills through engaging stories and creative expression.
            </p>
          </div>
        </div>
        
        <div class="reveal delay-100 group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden border border-gray-100">
          <div class="h-2 bg-green-700 transform origin-left group-hover:scale-x-110 transition-transform duration-500"></div>
          <div class="p-8">
            <div class="flex items-start justify-between mb-4">
              <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center text-green-700 text-2xl group-hover:rotate-12 transition-transform">
                🧮</div>
              <span class="text-xs font-semibold bg-green-100 text-green-700 px-3 py-1 rounded-full">Grades K-5</span>
            </div>
            <h3 class="text-xl font-bold text-green-700 mb-3">Mathematics</h3>
            <p class="text-green-700/70 leading-relaxed">Building strong foundations in numbers, problem-solving, and logical thinking.</p>
          </div>
        </div>

        <div class="reveal delay-200 group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden border border-gray-100">
            <div class="h-2 bg-green-700"></div>
            <div class="p-8">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center text-green-700 text-2xl">🌍</div>
                    <span class="text-xs font-semibold bg-green-100 text-green-700 px-3 py-1 rounded-full">Grades K-5</span>
                </div>
                <h3 class="text-xl font-bold text-green-700 mb-3">Social Studies</h3>
                <p class="text-green-700/70 leading-relaxed">Exploring history, geography, and cultures to understand our diverse world.</p>
            </div>
        </div>
        
        </div>
    </div>
  </section>

  <section class="reveal py-24 relative overflow-hidden bg-green-700">
    <div class="absolute inset-0 bg-[url('assets/pattern-waves.png')] opacity-10 animate-pulse"></div>
    <div class="max-w-4xl mx-auto px-4 relative z-10 text-center">
      <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
        Ready to Give Your Child the <span class="text-yellow-400">Best Start?</span>
      </h2>
      <p class="text-lg md:text-xl text-white/90 mb-10 max-w-2xl mx-auto">
        Join our welcoming community and watch your child thrive. Start the enrollment process today or contact us to learn more.
      </p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="/admissions" class="group inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-yellow-400 text-gray-900 font-semibold hover:bg-yellow-300 transition-all duration-300 w-full sm:w-auto hover:shadow-xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
          Enroll Your Child
        </a>
        <a href="/contact" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl border border-white text-white font-semibold hover:bg-white/10 transition-all duration-300 w-full sm:w-auto">
          Contact Us
        </a>
      </div>
    </div>
  </section>

  @include('layouts.footer')

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      // 1. Counter Animation
      const counters = document.querySelectorAll(".counter");
      const observerOptions = { threshold: 0.5 };

      const startCounter = (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const counter = entry.target;
            const target = +counter.dataset.target;
            let current = 0;
            const increment = Math.ceil(target / 100);
            
            const update = () => {
              current += increment;
              if (current < target) {
                counter.textContent = current;
                requestAnimationFrame(update);
              } else {
                counter.textContent = target;
              }
            };
            update();
            observer.unobserve(counter);
          }
        });
      };

      const counterObserver = new IntersectionObserver(startCounter, observerOptions);
      counters.forEach(c => counterObserver.observe(c));

      // 2. Scroll Reveal Animation
      const revealElements = document.querySelectorAll(".reveal");
      const revealOnScroll = (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("active");
          }
        });
      };

      const revealObserver = new IntersectionObserver(revealOnScroll, { threshold: 0.1 });
      revealElements.forEach(el => revealObserver.observe(el));
    });
  </script>

</body>
</html>