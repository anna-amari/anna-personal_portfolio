<?php
$pageTitle = "Projects | Anna Mari Portfolio";
include 'db.php'; 
include 'nav.php';

// Fetch projects with their images
$projectsQuery = "
    SELECT p.*, 
           GROUP_CONCAT(pi.image_path ORDER BY pi.display_order SEPARATOR '||') as images,
           GROUP_CONCAT(pi.alt_text ORDER BY pi.display_order SEPARATOR '||') as alt_texts
    FROM projects p
    LEFT JOIN project_images pi ON p.id = pi.project_id
    WHERE p.status = 'active'
    GROUP BY p.id
    ORDER BY p.created_at DESC
";

$projectsResult = $conn->query($projectsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Your existing CSS styles remain the same */
    body {
      background-color: #0d0d0dff;
      color: white;
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
      transition: background-color 0.3s, color 0.3s;
    }
    
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

    .grid-images {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }

    @keyframes floaty {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-12px); }
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

 
  <div class="flex flex-col items-center justify-center text-center py-8">
    <h3 class="text-2xl font-bold">Presentation and Defense of the Projects</h3>
    <h4 class="text-lg text-gray-400">Implementation of Practical Learnings</h4>
  </div>

  <!-- Dynamic Projects Content -->
  <main class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
    <?php if ($projectsResult && $projectsResult->num_rows > 0): ?>
      <?php while($project = $projectsResult->fetch_assoc()): ?>
        <div class="project-card bg-gray-900 p-6 rounded-xl shadow-lg">
          <h2 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($project['title']); ?></h2>
          <h3 class="text-pink-400"><?php echo htmlspecialchars($project['subtitle']); ?></h3>
          <h3 class="text-gray-300">Role: <?php echo htmlspecialchars($project['role']); ?></h3>
          <p class="mt-2 text-gray-400">
            <?php echo htmlspecialchars($project['description']); ?>
          </p>
          
          <?php 
          // Handle images
          $images = explode('||', $project['images']);
          $altTexts = explode('||', $project['alt_texts']);
          $imageCount = count($images);
          
          if ($imageCount > 0 && !empty($images[0])): 
            if ($imageCount == 1): ?>
              <img src="<?php echo htmlspecialchars($images[0]); ?>" 
                   alt="<?php echo htmlspecialchars($altTexts[0] ?? $project['title']); ?>" 
                   class="max-w-full h-auto rounded-lg object-contain flex justify-center">
            <?php elseif ($imageCount == 2): ?>
              <div class="grid grid-cols-2 gap-2 mt-4">
                <?php for($i = 0; $i < 2; $i++): ?>
                  <img src="<?php echo htmlspecialchars($images[$i]); ?>" 
                       alt="<?php echo htmlspecialchars($altTexts[$i] ?? $project['title'] . ' ' . ($i+1)); ?>" 
                       class="rounded-lg">
                <?php endfor; ?>
              </div>
            <?php else: ?>
              <div class="grid grid-cols-<?php echo min($imageCount, 3); ?> gap-2 mt-4">
                <?php for($i = 0; $i < $imageCount; $i++): ?>
                  <img src="<?php echo htmlspecialchars($images[$i]); ?>" 
                       alt="<?php echo htmlspecialchars($altTexts[$i] ?? $project['title'] . ' ' . ($i+1)); ?>" 
                       class="rounded-lg">
                <?php endfor; ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col-span-2 text-center py-8">
        <p class="text-gray-400">No projects found.</p>
      </div>
    <?php endif; ?>
  </main>

  <!-- Your existing footer remains the same -->
  <footer class="mt-16 py-12 bg-black text-center text-white">
    <h2 class="text-3xl font-extrabold mb-2 tracking-widest uppercase">My Canva Logos</h2>
    <div class="w-24 h-1 bg-white/80 mx-auto rounded-full mb-6"></div>
    <p class="text-base md:text-lg text-white/90 max-w-2xl mx-auto mb-10">
      These are some of the creative logo designs I crafted using Canva. Each one reflects a unique concept, 
      style, and visual identity that showcases my creativity.
    </p>

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


</body>
</html>