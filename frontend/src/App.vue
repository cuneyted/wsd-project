<template>
  <main class="page">
    <section class="card">
      <h1>Web Systems Design - Project 1</h1>
      <h2>Laravel Backend + Vue Frontend</h2>

      <p>
        This is the initial setup of a modern web system using Laravel for the backend
        and Vue 3 for the frontend.
      </p>

      <div class="info">
        <p><strong>Student:</strong> Cüneyt Emre Durak </p>
        <p><strong>Course:</strong> Web Systems Design</p>
        <p><strong>Backend:</strong> Laravel</p>
        <p><strong>Frontend:</strong> Vue 3 + Vite</p>
      </div>
    </section>
  </main>
</template>

<style scoped>
.page {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f2f6fa;
  font-family: Arial, sans-serif;
}

.card {
  width: 600px;
  padding: 40px;
  border-radius: 16px;
  background: white;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
  text-align: center;
}

h1 {
  color: #0f4c81;
  margin-bottom: 10px;
}

h2 {
  color: #333;
  margin-bottom: 20px;
}

p {
  color: #555;
  line-height: 1.6;
}

.info {
  margin-top: 25px;
  text-align: left;
  background: #eef5fb;
  padding: 20px;
  border-radius: 12px;
}
</style>