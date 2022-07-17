<template>
  <div class="container">
    <h2>
      Ci sono {{ totalPosts }} post
    </h2>
    <div v-for="post in posts" :key="post.id">
      <PostCard :post="post" />
    </div>
    <!-- Pagination -->
    <nav aria-label="...">
      <ul class="pagination">
        <!-- First page button -->
        <li>
          <a class="page-link bg-primary text-white myBtn" @click="getPosts(1)">First</a>
        </li>
        <!-- Previous button -->
        <li class="page-item" :class="currentPage === 1 ? 'disabled' : ''">
          <a
            @click="getPosts(currentPage - 1)"
            class="page-link"
            href="#"
            aria-label="Previous"
          >
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <!-- Number buttons -->
        <li
          class="page-item"
          v-for="page in lastPage"
          :key="page"
          :class="page === currentPage ? 'active' : ''"
        >
          <a class="page-link" href="#" @click="getPosts(page)">{{ page }}</a>
        </li>
        <!-- Next button -->
        <li
          class="page-item"
          :class="currentPage === lastPage ? 'disabled' : ''"
        >
          <a
            @click="getPosts(currentPage + 1)"
            class="page-link"
            href="#"
            aria-label="Previous"
          >
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <!-- Last page button -->
        <li>
          <a class="page-link bg-primary text-white myBtn" @click="getPosts(lastPage)">Last</a>
        </li>
      </ul>
    </nav>
    <!-- /Pagination -->
  </div>
</template>

<script>
import PostCard from "./PostCard.vue";
export default {
  name: "AllPosts",
  components: {
    PostCard,
  },
  data() {
    return {
      posts: [],
      currentPage: 1,
      lastPage: 0,
      totalPosts: 0,
    };
  },
  created() {
    this.getPosts();
  },
  methods: {
    getPosts(pageNumber) {
      axios
        .get("/api/posts", {
          params: {
            page: pageNumber,
          },
        })
        .then((resp) => {
          this.posts = resp.data.results.data;
          this.currentPage = resp.data.results.current_page;
          this.lastPage = resp.data.results.last_page;
          this.totalPosts = resp.data.results.total;
        });
    },
  },
};
</script>

<style>
nav ul li {
  cursor: pointer;
}
</style>