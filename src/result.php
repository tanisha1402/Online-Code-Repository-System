<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SQL Result</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #1f1f1f;
      --accent-color: #bfa980;
      --bg-color: #f9f7f1;
      --text-color: #333;
      --glass: rgba(255, 255, 255, 0.15);
      --shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html, body {
      overflow-x: hidden !important;
      max-width: 100vw;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: url('img.jpg') no-repeat center center fixed;
      background-size: cover;
      backdrop-filter: blur(7px);
      min-height: 100vh;
      padding: 60px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      color: var(--text-color);
      position: relative;
    }

    .content-wrapper {
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 1000px;
      padding-bottom: 50px;
      overflow: hidden;
    }

    body::-webkit-scrollbar {
      width: 6px;
    }
    body::-webkit-scrollbar-thumb {
      background-color: var(--accent-color);
      border-radius: 10px;
    }

    h2 {
      font-family: 'Playfair Display', serif;
      font-size: 3rem;
      color: var(--primary-color);
      margin-bottom: 30px;
      text-align: center;
      border-bottom: 2px solid var(--accent-color);
      padding-bottom: 10px;
      animation: fadeInDown 1.5s ease;
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-40px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    table {
      border-collapse: collapse;
      width: 100%;
      min-height: 100px;
      background: rgba(255, 255, 255, 0.8);
      box-shadow: var(--shadow);
      animation: fadeInUp 1.5s ease;
    }

    th, td {
      padding: 12px 16px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: var(--accent-color);
      color: white;
      text-transform: uppercase;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #e8e6e0;
    }

    a {
      display: inline-block;
      margin-top: 30px;
      text-decoration: none;
      color: white;
      font-size: 1.1rem;
      padding: 12px 24px;
      background-color: var(--accent-color);
      border-radius: 8px;
      transition: background 0.3s ease, transform 0.2s;
      font-family: 'Inter', sans-serif;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    a:hover {
      background-color: #a38c67;
      transform: translateY(-2px);
    }

    .theme-toggle {
      position: absolute;
      top: 20px;
      right: 30px;
      z-index: 999;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 26px;
    }

    .switch input { display: none; }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: #ccc;
      transition: 0.4s;
      border-radius: 30px;
    }

    .slider::before {
      position: absolute;
      content: "";
      height: 20px; width: 20px;
      left: 3px; bottom: 3px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: var(--accent-color);
    }

    input:checked + .slider::before {
      transform: translateX(24px);
    }

    .dark-theme {
      --primary-color: #fdf6e3;
      --accent-color: #d9a441;
      --bg-color: #111;
      --text-color: #e6e6e6;
      --glass: rgba(0, 0, 0, 0.4);
      --shadow: 0 8px 32px rgba(255, 255, 255, 0.05);
      background: black;
    }

    .dark-theme table {
      background: rgba(0, 0, 0, 0.5);
    }

    .dark-theme th {
      background-color: var(--accent-color);
      color: black;
    }

    .dark-theme tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.05);
    }

    .dark-theme tr:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .dark-theme a {
      background-color: var(--accent-color);
      color: black;
    }

    .dark-theme a:hover {
      background-color: #b78940;
    }

    .particle {
      position: absolute;
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--accent-color);
      opacity: 0.5;
      animation: floatUp 12s linear infinite;
      top: 100vh;
      left: calc(var(--x) - 3vw); /* fixed left positioning */
      pointer-events: none;
      z-index: 0;
    }

    @keyframes floatUp {
      0% { transform: translateY(0) scale(0.6); }
      100% { transform: translateY(-100vh) scale(1); }
    }

    .star {
      position: absolute;
      width: 12px;
      height: 12px;
      fill: var(--accent-color);
      opacity: 0.3;
      animation: twinkle 6s infinite ease-in-out alternate;
      pointer-events: none;
      z-index: 0;
    }

    @keyframes twinkle {
      from { opacity: 0.2; transform: scale(0.8) rotate(0deg); }
      to   { opacity: 0.9; transform: scale(1.2) rotate(180deg); }
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background: linear-gradient(120deg, transparent, rgba(255,255,255,0.05), transparent);
      animation: shimmerMove 8s linear infinite;
      pointer-events: none;
      z-index: 0;
    }

    @keyframes shimmerMove {
      from { transform: translateX(-100%); }
      to   { transform: translateX(100%); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(50px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .result-container {
  text-align: center;
  margin-top: 20px;
}

.result-container table {
  margin: 0 auto;
}

.result-message {
  font-size: 1.2rem;
  margin: 20px 0;
  color: var(--primary-color);
}

  </style>
</head>
<body>

  <div class="content-wrapper">
    <h2>SQL Result</h2>

    <div class="theme-toggle">
      <label class="switch">
        <input type="checkbox" id="toggleTheme">
        <span class="slider round"></span>
      </label>
    </div>

    <div class="result-container">
  <?php
    if (file_exists("table.html")) {
      include("table.html");
    } else {
      echo "<p class='result-message'>No output found.</p>";
    }
  ?>

  <a href="index.php">&larr; Back to Query Page</a>
</div>

  </div>

  <script>
    const toggle = document.getElementById("toggleTheme");
    const body = document.body;

    if (localStorage.getItem("theme") === "dark") {
      body.classList.add("dark-theme");
      toggle.checked = true;
    }

    toggle.addEventListener("change", function () {
      if (this.checked) {
        body.classList.add("dark-theme");
        localStorage.setItem("theme", "dark");
      } else {
        body.classList.remove("dark-theme");
        localStorage.setItem("theme", "light");
      }
    });

    // Sparkles
for (let i = 0; i < 80; i++) {
  const particle = document.createElement('div');
  particle.className = 'particle';

  const x = Math.random() * 100;
  const y = Math.random() * document.body.scrollHeight; // 💡 spread vertically
  const size = Math.random() * 4 + 2;
  const delay = Math.random() * 15;
  const duration = 4 + Math.random() * 6; // 4–10 seconds

  particle.style.setProperty('--x', x + 'vw');
  particle.style.top = `${y}px`; // 💡 apply the random top position
  particle.style.width = `${size}px`;
  particle.style.height = `${size}px`;
  particle.style.animationDelay = `${delay}s`;
  particle.style.animationDuration = `${duration}s`;
  particle.style.boxShadow = `0 0 ${size}px var(--accent-color)`;

  document.body.appendChild(particle);
}


    // Stars
    for (let i = 0; i < 15; i++) {
      const star = document.createElementNS("http://www.w3.org/2000/svg", "svg");
      star.setAttribute("viewBox", "0 0 24 24");
      star.setAttribute("class", "star");
      star.style.left = Math.random() * 100 + "vw";
      star.style.top = Math.random() * 100 + "vh";
      star.style.animationDelay = Math.random() * 6 + "s";
      star.innerHTML = `<path d="M12 2l2.9 6.1L22 9.2l-5 5 1.2 7.8L12 18.2 5.8 22 7 14.2 2 9.2l7.1-1.1L12 2z"/>`;
      document.body.appendChild(star);
    }
  </script>
</body>
</html>
