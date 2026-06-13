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
      <h1>Photo Upload / Gallery</h1>

      <input class="input" placeholder="Title input" />
      <input class="input" placeholder="Caption input" />
      <input class="input" placeholder="File input" />
      <button class="primary">Upload Photo</button>

      <div class="grid">
        <div class="photo-card">Image 1</div>
        <div class="photo-card">Image 2</div>
        <div class="photo-card">Image 3</div>
        <div class="photo-card">Image 4</div>
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
.input { display:block; width:320px; padding:12px; border:1px solid #d1d5db; border-radius:8px; margin-bottom:12px; }
.primary { background:#2563eb; color:white; border:none; padding:12px 20px; border-radius:8px; margin-bottom:24px; }
.grid { display:grid; grid-template-columns:repeat(2, 180px); gap:20px; }
.photo-card { background:white; height:140px; border-radius:12px; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 12px rgba(0,0,0,0.06); }
</style>
