import { createRouter, createWebHistory } from 'vue-router'
import DashboardView from '../views/DashboardView.vue'
import TasksView from '../views/TasksView.vue'
import VideosView from '../views/VideosView.vue'
import WatchlistView from '../views/WatchlistView.vue'
import NewsFeedView from '../views/NewsFeedView.vue'
import PhotoUploadView from '../views/PhotoUploadView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', component: DashboardView },
    { path: '/tasks', component: TasksView },
    { path: '/videos', component: VideosView },
    { path: '/watchlist', component: WatchlistView },
    { path: '/feed', component: NewsFeedView },
    { path: '/photos', component: PhotoUploadView },
  ],
})

export default router
