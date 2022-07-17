<template>
  <div class="card text-center m-5">
    <div class="card-header">Featured</div>
    <div class="card-body">
      <h5 class="card-title">{{ post.title }}</h5>
      <p class="card-text">
        {{ truncateString(post.content, 100) + '...' }}
      </p>
      <a href="#" class="btn btn-primary">Read this post</a>
    </div>
    <div class="card-footer text-muted">{{ post.created_at }}</div>
  </div>
</template>

<script>

export default {
    name: 'PostCard',
    props: {
        post: Object
    },
    methods: {
      truncateString: function(text,num){
        const string = 
          text.split("").slice(0, num).join("");
        return string;
      }
  }
};
</script>

<style>
</style>