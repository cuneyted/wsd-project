<template>
  <div class="layout">
    <aside class="sidebar">
      <h2>Menu</h2>
      <router-link to="/">Dashboard</router-link>
      <router-link to="/tasks">Tasks</router-link>
      <router-link to="/videos">Videos</router-link>
      <router-link to="/watchlist">Watchlist</router-link>
      <router-link to="/feed">News Feed</router-link>
      <router-link to="/photos">Photo Upload</router-link>
    </aside>

    <main class="content">
      <h1>Watchlist / Continue Watching</h1>

      <div class="grid">
        <div class="video-card">UI Design Fundamentals</div>
        <div class="video-card">User Research Basics</div>
      </div>

      <div class="continue-box">
        <h3>Continue Watching</h3>
        <p>Wireframing Basics - 60%</p>
        <div class="bar">
          <div class="fill"></div>
        </div>
      </div>
    </main>
  </div>
</template>

<style scoped>
.layout { display:flex; min-height:100vh; font-family:Arial,sans-serif; }
.sidebar { width:220px; background:#e9edf2; padding:20px; display:flex; flex-direction:column; gap:12px; }
.sidebar a { text-decoration:none; color:#111827; padding:8px; border-radius:6px; }
.sidebar a.router-link-active { background:#dbeafe; color:#2563eb; }
.content { flex:1; padding:30px; background:#f7f8fa; }
.grid { display:flex; gap:20px; margin:20px 0; }
.video-card { background:white; padding:40px 20px; border-radius:12px; width:220px; box-shadow:0 4px 12px rgba(0,0,0,0.06); }
.continue-box { background:white; padding:20px; border-radius:12px; margin-top:20px; box-shadow:0 4px 12px rgba(0,0,0,0.06); max-width:500px; }
.bar { height:10px; background:#d1d5db; border-radius:6px; overflow:hidden; }
.fill { width:60%; height:100%; background:#22c55e; }
</style>
