<?php
// index.php
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>HIFI TECH INDIA</title>
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
  img {
    pointer-events: none; /* Prevents image dragging */
}
    </style>
  <style>
    :root {
      --bg: #020303;
      --fg: #c8ffb1;
      --neon: #14ff62;
      --dim: #0a1a0a;
    }

    * { box-sizing: border-box; }
    html, body { height: 100%; }
    body {
      margin: 0;
      background: var(--bg);
      color: var(--fg);
      font-family: 'Share Tech Mono', monospace;
      overflow: hidden;
    }

    #matrix { position: fixed; inset: 0; z-index: 0; opacity: .35; }

    .bg { position: fixed; inset: 0; z-index: 1; background-image: url('assets/woman.jpg'); background-size: cover; background-position: center; filter: grayscale(10%) brightness(55%); }
    .overlay { position: fixed; inset: 0; z-index: 2; background: rgba(0,0,0,.55); pointer-events: none; }

    .center { position: fixed; inset: 0; z-index: 3; display: grid; place-items: center; padding: 2rem; text-align: center; }
    .card { display: grid; gap: 1.25rem; padding: 2rem; backdrop-filter: blur(6px); background: rgba(0, 15, 5, 0.35); border: 1px solid rgba(20, 255, 98, 0.25); border-radius: 24px; box-shadow: 0 0 24px rgba(20,255,98,0.15); max-width: 720px; width: min(92vw, 800px); }

    .face-wrap { position: relative; display: inline-block; }
    .face { width: min(44vw, 260px); aspect-ratio: 1 / 1; object-fit: cover; border-radius: 999px; border: 2px solid rgba(20,255,98,.55); box-shadow: 0 0 36px rgba(20,255,98,0.35); animation: glow 2.4s infinite alternate; }

    @keyframes glow { from { box-shadow: 0 0 22px rgba(20,255,98,0.25); } to { box-shadow: 0 0 46px rgba(20,255,98,0.5); } }

    /* Face scanning animation */
    .scanner {
      position: absolute;
      top: 0; left: 0; right: 0; height: 3px;
      background: var(--neon);
      box-shadow: 0 0 12px var(--neon);
      animation: scan 3s linear infinite;
      border-radius: 2px;
    }
    @keyframes scan { 0% { top: 0; } 50% { top: 100%; } 100% { top: 0; } }

    .title { margin: 0; font-size: clamp(1.4rem, 3.5vw, 2.35rem); text-shadow: 0 0 18px rgba(20,255,98,0.55); }
    .typing { min-height: 1.75rem; font-size: 1.1rem; border-right: 2px solid var(--neon); white-space: nowrap; overflow: hidden; margin: 0 auto; }

    .time { font-size: 1.25rem; color: var(--neon); text-shadow: 0 0 8px var(--neon); margin-top: 0.5rem; }

    .marquee { position: fixed; left: 0; right: 0; z-index: 4; display: flex; gap: 2rem; align-items: center; height: 46px; padding-inline: 1rem; background: rgba(0,0,0,.7); border-block: 1px solid rgba(20,255,98,0.25); overflow: hidden; }
    .marquee.top { top: 0; } .marquee.bottom { bottom: 0; }
    .marquee__track { display: flex; gap: 2.25rem; white-space: nowrap; animation: scroll 18s linear infinite; }
    @keyframes scroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }

    .tag { padding: 4px 10px; border: 1px solid rgba(20,255,98,0.35); border-radius: 999px; background: rgba(0, 30, 12, 0.35); }
    .scanlines { position: fixed; inset: 0; z-index: 5; pointer-events: none; background: repeating-linear-gradient(to bottom, rgba(20,255,98,0.04), rgba(20,255,98,0.04) 1px, transparent 1px, transparent 3px); opacity: .35; }

    /* Music Button */
    .music-btn {
      position: fixed;
      top: 10px;
      right: 10px;
      z-index: 10;
      background: rgba(0,0,0,0.5);
      border: 1px solid var(--neon);
      color: var(--neon);
      padding: 6px 10px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 0.9rem;
      text-shadow: 0 0 6px var(--neon);
    }
  </style>
</head>
<body>
  <canvas id="matrix"></canvas>
  <div class="bg" aria-hidden="true"></div>
  <div class="overlay" aria-hidden="true"></div>

  <div class="marquee top"><div class="marquee__track" id="marqueeTop"></div></div>

  <div class="center">
    <div class="card">
      <div class="face-wrap">
        <img class="face" src="https://i.imgur.com/6KPKn5F.png" alt="Face" />
        <div class="scanner"></div>
      </div>
      <h1 class="title">ACCESS GRANTED</h1>
      <p id="typing" class="typing"></p>
      <div id="clock" class="time"></div>
    </div>
  </div>

  <div class="marquee bottom"><div class="marquee__track" id="marqueeBottom"></div></div>

  <div class="scanlines" aria-hidden="true"></div>

  <!-- Background Music -->
  <audio id="bg-music" src="https://api.zupix.online/files/bg.mp3" autoplay loop></audio>
  <button id="musicToggle" class="music-btn">🔊 Mute</button>

  <script>
    /* Background Music */
    const bgMusic = document.getElementById("bg-music");
    const musicToggle = document.getElementById("musicToggle");
    bgMusic.volume = 0.9;

    // Try to play immediately (unmuted autoplay)
    bgMusic.play().catch(() => {
      console.log("Autoplay blocked, will enable on user interaction.");
    });

    // Guarantee play on first user interaction
    function enableSound() {
      bgMusic.play().catch(()=>{});
      document.removeEventListener("click", enableSound);
      document.removeEventListener("keydown", enableSound);
    }
    document.addEventListener("click", enableSound);
    document.addEventListener("keydown", enableSound);

    // Toggle mute/unmute
    function updateButton() {
      musicToggle.textContent = bgMusic.muted ? "🔇 Unmute" : "🔊 Mute";
    }
    musicToggle.addEventListener("click", () => {
      bgMusic.muted = !bgMusic.muted;
      if (!bgMusic.muted) {
        bgMusic.play().catch(()=>{});
      }
      updateButton();
    });

    /* Matrix Rain */
    (function(){
      const c=document.getElementById('matrix');const ctx=c.getContext('2d');
      function resize(){c.width=innerWidth;c.height=innerHeight;}resize();addEventListener('resize',resize);
      const fontSize=16,cols=Math.floor(c.width/fontSize),drops=new Array(cols).fill(1);
      const chars='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      function draw(){ctx.fillStyle='rgba(0,0,0,0.09)';ctx.fillRect(0,0,c.width,c.height);ctx.fillStyle=getComputedStyle(document.documentElement).getPropertyValue('--neon');ctx.font=fontSize+'px monospace';
        for(let i=0;i<drops.length;i++){const text=chars[Math.floor(Math.random()*chars.length)];ctx.fillText(text,i*fontSize,drops[i]*fontSize);if(drops[i]*fontSize>c.height&&Math.random()>0.975)drops[i]=0;drops[i]++;}requestAnimationFrame(draw);}draw();})();

    /* Marquees */
    const line='  '; 
    function buildMarquee(el){let s='';for(let i=0;i<12;i++){s+=`<span class="tag">${line}</span>`;}el.innerHTML=s+s;}
    buildMarquee(document.getElementById('marqueeTop'));
    buildMarquee(document.getElementById('marqueeBottom'));

    /* Typing */
    const messages=['initiating scan…','biometric frame active…','status: ONLINE 100%'];
    const typing=document.getElementById('typing');
    let i=0,j=0,erasing=false;
    function typeLoop(){const current=messages[i%messages.length];if(!erasing){typing.textContent=current.slice(0,j++);if(j>current.length+6){erasing=true;}}else{typing.textContent=current.slice(0,j--);if(j===0){erasing=false;i++;}}setTimeout(typeLoop,erasing?28:42);}typeLoop();

    /* Live Clock */
    function updateClock(){
      const now = new Date();
      const day = String(now.getDate()).padStart(2,'0');
      const month = String(now.getMonth()+1).padStart(2,'0');
      const year = now.getFullYear();
      const dateStr = `${day}-${month}-${year}`;
      const timeStr = now.toLocaleString('en-IN', {
        timeZone: 'Asia/Kolkata',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: true
      });
      document.getElementById('clock').textContent = `${dateStr} | ${timeStr}`;
    }
    setInterval(updateClock,1000);
    updateClock();
  </script>
</body>
</html>
