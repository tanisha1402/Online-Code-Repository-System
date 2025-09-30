<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Online Code Repository System</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter&display=swap" rel="stylesheet">
  <style>
    html, body {
  overflow-x: hidden;
}

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
html {
  overflow-x: hidden;
  width: 100%;
}

    body {
      font-family: 'Inter', sans-serif;
      background: url('img.jpg') no-repeat center center fixed;
      background-size: cover;
      backdrop-filter: blur(7px);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
      padding: 60px 20px;
      color: var(--text-color);
      position: relative;
      overflow-x: hidden;
    }

    h2 {
      font-family: 'Playfair Display', serif;
      font-size: 3.5rem;
      color: var(--primary-color);
      text-align: center;
      margin-bottom: 40px;
      border-bottom: 2px solid var(--accent-color);
      padding-bottom: 10px;
      animation: fadeInDown 1.5s ease;
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-40px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    form {
      width: 100%;
      max-width: 850px;
      background: var(--glass);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border-radius: 18px;
      box-shadow: var(--shadow);
      padding: 40px;
      animation: fadeInUp 2s ease;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(50px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    textarea {
      width: 100%;
      height: 200px;
      font-size: 1rem;
      font-family: 'Inter', monospace;
      background: rgba(255, 255, 255, 0.83);
      border: 1px solid #ccc;
      border-radius: 12px;
      padding: 15px;
      resize: vertical;
      transition: all 0.3s ease;
    }

    textarea:focus {
      outline: none;
      border-color: var(--accent-color);
      background: #fff;
      box-shadow: 0 0 20px var(--accent-color);
    }

    button {
      margin-top: 25px;
      padding: 14px 35px;
      font-size: 1.1rem;
      font-weight: bold;
      color: white;
      background: linear-gradient(135deg, var(--accent-color), #a38c67);
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 200%;
      height: 100%;
      background: rgba(255,255,255,0.2);
      transform: skewX(-20deg);
      transition: 0.5s;
    }

    button:hover::before {
      left: 100%;
    }

    button:hover {
      background: linear-gradient(135deg, #a38c67, var(--accent-color));
      transform: scale(1.03);
    }

    footer {
      position: fixed;
      bottom: 15px;
      text-align: center;
      font-size: 0.9rem;
      color: #555;
      background: rgba(255,255,255,0.3);
      padding: 8px 20px;
      border-radius: 30px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* ✨ Optional spark particles */
  .particle {
  position: absolute;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--accent-color);
  opacity: 0.5;
  animation: floatUp 12s linear infinite;
  top: 100vh;
  left: 0;
   transform: translateX(var(--x));
}



   @keyframes floatUp {
  0%   { transform: translate(var(--x), 100vh) scale(0.6); }
  100% { transform: translate(var(--x), -100vh) scale(1); }
}

    body::-webkit-scrollbar {
  width: 0px;
  background: transparent;
}

/* 🌟 1. Floating SVG stars */
.star {
  position: absolute;
  width: 12px;
  height: 12px;
  fill: var(--accent-color);
  opacity: 0.3;
  animation: twinkle 6s infinite ease-in-out alternate;
}

@keyframes twinkle {
  from { opacity: 0.2; transform: scale(0.8) rotate(0deg); }
  to { opacity: 0.9; transform: scale(1.2) rotate(180deg); }
}

/* 💫 2. Background shimmer */
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

/* 🌈 3. Neon border pulse on the form */
form {
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 0 10px var(--accent-color), 0 0 40px rgba(191,169,128,0.3);
  animation: neonPulse 3s ease-in-out infinite;
}

@keyframes neonPulse {
  0%, 100% { box-shadow: 0 0 15px var(--accent-color); }
  50% { box-shadow: 0 0 30px rgba(191,169,128,0.6); }
}
/* ⌨️ Typing effect */
.typewriter {
  display: inline-block;
  overflow: hidden;
  border-right: 3px solid var(--accent-color);
  white-space: nowrap;
  animation: typing 4s steps(40, end), blink-caret 0.8s step-end infinite;
  max-width: 100%;
  font-family: 'Playfair Display', serif;
}

@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: var(--accent-color); }
}

.theme-toggle {
  position: absolute;
  top: 20px;
  right: 30px;
  z-index: 999;
}

/* Toggle Switch Styling */
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

/* DARK THEME CLASS */
.dark-theme {
  --primary-color: #fdf6e3;
  --accent-color: #d9a441;
  --bg-color: #111;
  --text-color:rgb(255, 252, 252);
  --glass: rgba(0, 0, 0, 0.4);
  --shadow: 0 8px 32px rgba(255, 255, 255, 0.05);
  background: black;
  background-size: cover;
  
}
.dark-theme.textarea
{

      width: 100%;
      height: 200px;
      font-size: 1rem;
      font-family: 'Inter', monospace;
      background: rgb(255, 255, 255);
      border: 1px solid #ccc;
      border-radius: 12px;
      padding: 15px;
      resize: vertical;
      transition: all 0.3s ease;
   
}
.dark-theme footer {
  background: rgba(255, 255, 255, 0.05);
  color: #ccc;
  box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
}
footer {
  transition: background 0.5s ease, color 0.5s ease, box-shadow 0.5s ease;
}
.tooltip {
  position: absolute;
  top: 90px;
  right: 60px;
  background: var(--accent-color);
  color: white;
  border-radius: 50%;
  width: 22px;
  height: 22px;
  text-align: center;
  line-height: 22px;
  font-size: 14px;
  cursor: pointer;
  font-weight: bold;
  z-index: 999;
}

.tooltiptext {
  visibility: hidden;
  background-color: white;
  color:rgba(47, 32, 77, 0.7);
  text-align: center;
  border-radius: 6px;
  padding: 8px;
  position: absolute;
  top: -45px;
  right: 0;
  z-index: 1000;
  opacity: 0;
  transition: opacity 0.3s;
  font-size: 12px;
  width: 220px;
  box-shadow: 0 2px 10px rgba(3, 2, 2, 0.2);
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

  </style>
</head>
<body>


  <h2><span class="typewriter">Online Code Repository System</span></h2>
<div class="theme-toggle">
  <label class="switch">
    <input type="checkbox" id="toggleTheme">
    <span class="slider round"></span>
  </label>
</div>


  <form method="POST" action="run.php">
    <div class="tooltip">?
  <span class="tooltiptext">Write SQL like: <br><code>SELECT * FROM Users;</code></span>
</div>
    <textarea name="sqlQuery" placeholder="SQL Query"></textarea>
    <button type="submit">Run SQL</button>
  </form>

  <footer>
    &copy; 2025 | Designed by Tanisha Chowdhury — C233462
  </footer>

  <script>
  // ✨ Particle Sparks with glow & variation
  for (let i = 0; i < 20; i++) {
    const particle = document.createElement('div');
    particle.className = 'particle';

    const x = Math.random() * 100;
    const size = Math.random() * 4 + 2;
    const delay = Math.random() * 15;
    const duration = 10 + Math.random() * 10;

    particle.style.setProperty('--x', x + 'vw');
    particle.style.width = `${size}px`;
    particle.style.height = `${size}px`;
    particle.style.animationDelay = `${delay}s`;
    particle.style.animationDuration = `${duration}s`;
    particle.style.boxShadow = `0 0 ${size}px var(--accent-color)`;

    document.body.appendChild(particle);
  }
 
  // 🌟 SVG floating stars
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

<script>
  const toggle = document.getElementById("toggleTheme");
  const body = document.body;

  // Load theme from localStorage
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
</script>

</body>
</html>
