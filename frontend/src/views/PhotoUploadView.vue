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

      <input class="input" v-model="title" placeholder="Title input" />
      <input class="input" v-model="caption" placeholder="Caption input" />
      <input class="input" type="file" @change="handleFileChange" />
      <button class="primary" @click="uploadPhoto">Upload Photo</button>

      <p v-if="message" class="message">{{ message }}</p>

      <div class="grid">
        <div class="photo-card" v-for="photo in photos" :key="photo.id">
          <strong>{{ photo.title }}</strong>
          <p>{{ photo.caption }}</p>
          <small>{{ photo.fileName }}</small>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const title = ref('')
const caption = ref('')
const selectedFile = ref(null)
const message = ref('')

const photos = ref([
  { id: 1, title: 'Mountain Trip', caption: 'Processed image', fileName: 'mountain.png' },
  { id: 2, title: 'City Walk', caption: 'Processed image', fileName: 'city.png' },
])

function handleFileChange(event) {
  selectedFile.value = event.target.files[0] || null
}

function uploadPhoto() {
  if (!selectedFile.value) {
    message.value = 'Please select a file first.'
    return
  }

  const nextId = photos.value.length + 1

  photos.value.unshift({
    id: nextId,
    title: title.value || `Untitled ${nextId}`,
    caption: caption.value || 'Uploaded image',
    fileName: selectedFile.value.name,
  })

  message.value = `Photo "${title.value || selectedFile.value.name}" uploaded successfully.`

  title.value = ''
  caption.value = ''
  selectedFile.value = null
}
</script>

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
.input {
  display: block;
  width: 320px;
  padding: 12px;
  border: 1px solid #d1d5db;
  border-radius: 8px;
  margin-bottom: 12px;
  background: white;
}
.primary {
  background: #2563eb;
  color: white;
  border: none;
  padding: 12px 20px;
  border-radius: 8px;
  margin-bottom: 24px;
  cursor: pointer;
}
.message {
  background: #dcfce7;
  color: #166534;
  padding: 12px;
  border-radius: 8px;
  max-width: 420px;
  margin-bottom: 20px;
}
.grid {
  display: grid;
  grid-template-columns: repeat(2, 220px);
  gap: 20px;
}
.photo-card {
  background: white;
  min-height: 140px;
  border-radius: 12px;
  padding: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.06);
}
.photo-card p {
  margin: 8px 0;
  color: #4b5563;
}
.photo-card small {
  color: #6b7280;
}
</style>