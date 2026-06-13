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
      <h1>Dashboard</h1>
      <div class="cards">
        <div class="card">
          <h3>Total Tasks</h3>
          <p>12</p>
        </div>
        <div class="card">
          <h3>Videos Watched</h3>
          <p>8</p>
        </div>
        <div class="card">
          <h3>Hours Watched</h3>
          <p>5h 30m</p>
        </div>
      </div>
    </main>
  </div>
</template>

<style scoped>
.layout {
  display: flex;
  min-height: 100vh;
  font-family: Arial, sans-serif;
}
.sidebar {
  width: 220px;
  background: #e9edf2;
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.sidebar a {
  text-decoration: none;
  color: #111827;
  padding: 8px;
  border-radius: 6px;
}
.sidebar a.router-link-active {
  background: #dbeafe;
  color: #2563eb;
}
.content {
  flex: 1;
  padding: 30px;
  background: #f7f8fa;
}
.cards {
  display: flex;
  gap: 20px;
  margin-top: 20px;
}
.card {
  background: white;
  padding: 24px;
  border-radius: 12px;
  min-width: 180px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
.card p {
  font-size: 28px;
  margin: 10px 0 0;
}
</style>
