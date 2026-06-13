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
      <h1>Tasks</h1>
      <button class="primary">+ Add Task</button>

      <div class="task">Watch Introduction Video <span>Not Started</span></div>
      <div class="task">Complete Chapter 1 <span>In Progress</span></div>
      <div class="task">Submit Assignment <span>Not Started</span></div>
    </main>
  </div>
</template>

<style scoped>
.layout { display:flex; min-height:100vh; font-family:Arial,sans-serif; }
.sidebar { width:220px; background:#e9edf2; padding:20px; display:flex; flex-direction:column; gap:12px; }
.sidebar a { text-decoration:none; color:#111827; padding:8px; border-radius:6px; }
.sidebar a.router-link-active { background:#dbeafe; color:#2563eb; }
.content { flex:1; padding:30px; background:#f7f8fa; }
.primary { background:#2563eb; color:white; border:none; padding:12px 20px; border-radius:8px; margin:16px 0; }
.task { background:white; padding:18px; border-radius:10px; margin-bottom:14px; display:flex; justify-content:space-between; box-shadow:0 4px 12px rgba(0,0,0,0.06); }
</style>
