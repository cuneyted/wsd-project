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
      <button class="primary" @click="addTask">+ Add Task</button>

      <div class="task" v-for="task in tasks" :key="task.id">
        <span>{{ task.name }}</span>
        <span>{{ task.status }}</span>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const tasks = ref([
  { id: 1, name: 'Watch Introduction Video', status: 'Not Started' },
  { id: 2, name: 'Complete Chapter 1', status: 'In Progress' },
  { id: 3, name: 'Submit Assignment', status: 'Not Started' },
])

function addTask() {
  const nextId = tasks.value.length + 1
  tasks.value.push({
    id: nextId,
    name: `New Task ${nextId}`,
    status: 'In Progress',
  })
}
</script>

<style scoped>
.layout { display:flex; min-height:100vh; font-family:Arial,sans-serif; }
.sidebar { width:220px; background:#e9edf2; padding:20px; display:flex; flex-direction:column; gap:12px; }
.sidebar a { text-decoration:none; color:#111827; padding:8px; border-radius:6px; }
.sidebar a.router-link-active { background:#dbeafe; color:#2563eb; }
.content { flex:1; padding:30px; background:#f7f8fa; }
.primary { background:#2563eb; color:white; border:none; padding:12px 20px; border-radius:8px; margin:16px 0; cursor:pointer; }
.task { background:white; padding:18px; border-radius:10px; margin-bottom:14px; display:flex; justify-content:space-between; box-shadow:0 4px 12px rgba(0,0,0,0.06); }
</style>