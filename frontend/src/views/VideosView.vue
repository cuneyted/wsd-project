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
      <h1>Video Catalog</h1>
      <input class="search" placeholder="Search videos..." />

      <div class="grid">
        <div class="video-card">Introduction to UI/UX</div>
        <div class="video-card">Wireframing Basics</div>
        <div class="video-card">Design Systems 101</div>
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
.search { width:320px; padding:12px; border-radius:8px; border:1px solid #d1d5db; margin:16px 0 24px; }
.grid { display:flex; gap:20px; }
.video-card { background:white; padding:40px 20px; border-radius:12px; width:180px; box-shadow:0 4px 12px rgba(0,0,0,0.06); }
</style>
