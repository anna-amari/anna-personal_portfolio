<?php
// projects.php
$pageTitle = "Projects | Anna Mari Portfolio";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-color: #0d0d0dff;
      color: white;
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
      transition: background-color 0.3s, color 0.3s;
     
    }

    /* Navigation Menu */
    .main-nav ul {
      list-style: none;
      margin: 20px;
      display: flex;
      flex-direction: row;
      gap: 15px;
      padding-left: 850px;
    }

    .main-nav ul li a {
      text-decoration: underline;
      color: white;
      font-size: 18px;
      padding: 8px 12px;
      transition: color 0.3s;
    }

    .main-nav ul li a:hover {
      color: #ebeae6;
    }

    /* Social Icons */
    .social-icons {
      margin-top: 20px;
    }

    .social-icons a {
      color: white;
      font-size: 22px;
      margin-right: 15px;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: #ebeae6;
    }

    /* Theme Toggle Button */
    #toggle-theme {
      background: none;
      border: none;
      color: white;
      font-size: 22px;
      cursor: pointer;
      position: fixed;
      top: 15px;
      right: 20px;
    }

    /* Light Mode */
    body.light-mode {
      background-color: #f9f9f9;
      color: #111;
    }

    body.light-mode .main-nav ul li a,
    body.light-mode .social-icons a,
    body.light-mode #toggle-theme {
      color: #111;
    }

    /* Projects Section */
    main {
      margin-top: 40px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 25px;
    }

    .project-card {
      background: #1a1a1a;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.5);
      padding: 20px;
      transition: transform 0.4s ease, background 0.3s ease;
      display: flex;
      flex-direction: column;
      animation: fadeInUp 0.8s ease forwards;
      opacity: 0;
    }

    body.light-mode .project-card {
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .project-card:hover {
      transform: translateY(-8px) scale(1.02);
    }

    .project-card h2 {
      margin-bottom: 8px;
    }

    .project-card h3 {
      margin: 3px 0;
      font-weight: normal;
      font-size: 15px;
      color: #ccc;
    }

    body.light-mode .project-card h3 {
      color: #555;
    }

    .project-card p {
      margin: 10px 0 20px;
      line-height: 1.5;
    }

    /* Image Styles */
    .project-card img {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.4);
      transition: transform 0.3s ease;
      object-fit: cover;
      height: 220px;
    }

    .project-card img:hover {
      transform: scale(1.05);
    }

    /* Grid of Images inside card */
    .grid-images {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }

  

    /* Floating Animation */
    @keyframes floaty {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-12px);
      }
    }

    /* Animations */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <!-- Theme Toggle Button -->
  <button id="toggle-theme" title="Toggle light/dark mode">
    <i class="fas fa-moon"></i>
  </button>

  <!-- Navigation Menu -->
  <nav class="main-nav">
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="projects.php">Projects</a></li>
      <li><a href="hobbies.php">Hobbies</a></li>
      <li><a href="side-hustle.php">Side Hustle</a></li>
    </ul>
  </nav>

  <!-- Social Icons -->
  <div class="social-icons">
    <a href="https://github.com/zaeuamari" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
    <a href="mailto:annamarietaduran44@gmail.com" target="_blank" title="Email"><i class="fas fa-envelope"></i></a>
    <a href="https://www.linkedin.com/in/yourprofile" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
  </div>

 <div class="flex flex-col items-center justify-center text-center py-8">
  <h3 class="text-2xl font-bold">Presentation and Defense of the Projects</h3>
  <h4 class="text-lg text-gray-400">Implementation of Practical Learnings</h4>
</div>

<!-- Page Content -->
<main class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
  

  <div class="project-card bg-gray-900 p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold mb-2">Pizza Haus Ordering System</h2>
    <h3 class="text-pink-400">Programming Language: C++</h3>
    <h3 class="text-gray-300">Role: Leader</h3>
    <p class="mt-2 text-gray-400">
      Our first project that requires critical thinking skills and my comeback to the fluctuating grades.
    </p>
   <img src="images/presentation/p1.jpg" 
       alt="Pizza Haus Ordering System" 
       class="max-w-full h-auto rounded-lg object-contain flex justify-center">
</div> 
  </div>

  
  <div class="project-card bg-gray-900 p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold mb-2">Engineering Jobs in I.T</h2>
    <h3 class="text-pink-400">App: Figma</h3>
    <h3 class="text-gray-300">Role: Collaborator</h3>
    <p class="mt-2 text-gray-400">
      This project helped us design and get used to UI/UX concepts, prototypes, and wireframes.
    </p>
    <div class="grid grid-cols-2 gap-2 mt-4">
      <img src="images/Presentation/p2.png" alt="Engineering Jobs in IT - Screen 1" class="rounded-lg">
      <img src="images/Presentation/p3.png" alt="Engineering Jobs in IT - Screen 2" class="rounded-lg">
      <img src="images/Presentation/p4.png" alt="Engineering Jobs in IT - Screen 3" class="rounded-lg">
      <img src="images/Presentation/p5.jpeg" alt="Engineering Jobs in IT - Screen 4" class="rounded-lg">
    </div>
  </div>

  <!-- Project 3 -->
  <div class="project-card bg-gray-900 p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold mb-2">Nabua Express</h2>
    <h3 class="text-pink-400">App: Figma</h3>
    <h3 class="text-gray-300">Role: Partner</h3>
    <p class="mt-2 text-gray-400">A digital transportation project focusing on UI/UX and functionality.</p>
    <div class="grid grid-cols-2 gap-2 mt-4">
      <img src="images/presentation/p6.jpg" alt="Nabua Express Screen 1" class="rounded-lg">
      <img src="images/presentation/p7.jpg" alt="Nabua Express Screen 2" class="rounded-lg">
    </div>
  </div>

  <!-- Project 4 -->
  <div class="project-card bg-gray-900 p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold mb-2">Sweet Brew Machine Learning</h2>
    <h3 class="text-pink-400">Programming Language: C++</h3>
    <h3 class="text-gray-300">Role: Partner</h3>
    <p class="mt-2 text-gray-400">
      A collaborative partnership of finding and debugging errors in a machine learning project.
    </p>
    <div class="grid grid-cols-2 gap-2 mt-4">
      <img src="images/presentation/p8.jpg" alt="Sweet Brew Screen 1" class="rounded-lg">
      <img src="images/presentation/p9.jpg" alt="Sweet Brew Screen 2" class="rounded-lg">
    </div>
  </div>

  <!-- Project 5 -->
  <div class="project-card bg-gray-900 p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold mb-2">BookTrack</h2>
    <h3 class="text-pink-400">Software: MySQL</h3>
    <h3 class="text-gray-300">Role: Partner</h3>
    <p class="mt-2 text-gray-400">
      A collaborative partnership for creating and debugging a book tracking database system.
    </p>
    <img src="images/presentation/p11.jpg" alt="BookTrack" class="rounded-lg mt-4">
  </div>

  <!-- Project 6 -->
  <div class="project-card bg-gray-900 p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold mb-2">Every Lives Matter: Pet Adoption</h2>
    <h3 class="text-pink-400">Tech Stack: HTML, CSS, JavaScript, PHP, MySQL</h3>
    <h3 class="text-gray-300">Role: FullStack Support</h3>
    <p class="mt-2 text-gray-400">
      A web system for pet adoption and application, developed collaboratively with full-stack support.
    </p>
    <div class="grid grid-cols-3 gap-2 mt-4">
      <img src="images/presentation/p12.jpg" alt="Pet Adoption 1" class="rounded-lg">
      <img src="images/presentation/p13.jpg" alt="Pet Adoption 2" class="rounded-lg">
      <img src="images/presentation/p14.jpeg" alt="Pet Adoption 3" class="rounded-lg">
    </div>
  </div>

</main>
s

  <footer class="mt-16 py-12 bg-black text-center text-white">
  <h2 class="text-3xl font-extrabold mb-2 tracking-widest uppercase">My Canva Logos</h2>
  <div class="w-24 h-1 bg-white/80 mx-auto rounded-full mb-6"></div>
  <p class="text-base md:text-lg text-white/90 max-w-2xl mx-auto mb-10">
    These are some of the creative logo designs I crafted using Canva. Each one reflects a unique concept, 
    style, and visual identity that showcases my creativity.
  </p>

  <!-- Logo Row -->
  <div class="flex justify-center flex-wrap gap-10">
    <img src="images/Logo/2.jpg" alt="Logo 2"
      class="w-28 h-28 object-contain rounded-full bg-white/20 p-3 shadow-xl hover:scale-110 hover:rotate-3 transition-all duration-500 ease-in-out" />
    <img src="images/Logo/3.jpg" alt="Logo 3"
      class="w-28 h-28 object-contain rounded-full bg-white/20 p-3 shadow-xl hover:scale-110 hover:-rotate-3 transition-all duration-500 ease-in-out" />
    <img src="images/Logo/4.jpg" alt="Logo 4"
      class="w-28 h-28 object-contain rounded-full bg-white/20 p-3 shadow-xl hover:scale-110 hover:rotate-6 transition-all duration-500 ease-in-out" />
    <img src="images/Logo/5.jpg" alt="Logo 5"
      class="w-28 h-28 object-contain rounded-full bg-white/20 p-3 shadow-xl hover:scale-110 hover:-rotate-6 transition-all duration-500 ease-in-out" />
  </div>
</footer>





  <!-- Theme Toggle Script -->
  <script>
    const toggleBtn = document.getElementById('toggle-theme');
    const body = document.body;
    const icon = toggleBtn.querySelector('i');

    toggleBtn.addEventListener('click', () => {
      body.classList.toggle('light-mode');
      icon.classList.toggle('fa-moon');
      icon.classList.toggle('fa-sun');
    });

    // Fade-in animation on scroll
    const cards = document.querySelectorAll('.project-card');
    const revealOnScroll = () => {
      const trigger = window.innerHeight * 0.9;
      cards.forEach(card => {
        const top = card.getBoundingClientRect().top;
        if (top < trigger) card.style.opacity = "1";
      });
    };
    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', revealOnScroll);
  </script>
</body>
</html>
