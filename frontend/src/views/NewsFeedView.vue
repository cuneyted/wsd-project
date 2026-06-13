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
      <div class="topbar">
        <h1>News Feed</h1>
        <button class="primary" @click="refreshFeed">Refresh</button>
      </div>

      <div class="feed-item" v-for="item in feedItems" :key="item">
        {{ item }}
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const feedItems = ref([
  'Photo uploaded successfully',
  'New task created',
  'New recommendation available',
  'Watchlist updated',
])

function refreshFeed() {
  feedItems.value.unshift(`Feed refreshed at ${new Date().toLocaleTimeString()}`)
}
</script>

<style scoped>
.layout { display:flex; min-height:100vh; font-family:Arial,sans-serif; }
.sidebar { width:220px; background:#e9edf2; padding:20px; display:flex; flex-direction:column; gap:12px; }
.sidebar a { text-decoration:none; color:#111827; padding:8px; border-radius:6px; }
.sidebar a.router-link-active { background:#dbeafe; color:#2563eb; }
.content { flex:1; padding:30px; background:#f7f8fa; }
.topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
.primary { background:#2563eb; color:white; border:none; padding:12px 20px; border-radius:8px; cursor:pointer; }
.feed-item { background:white; padding:20px; border-radius:12px; margin-bottom:16px; box-shadow:0 4px 12px rgba(0,0,0,0.06); }
</style>