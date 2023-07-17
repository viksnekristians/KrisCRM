<template>
  <div class="d-flex flex-column mb-5" style="gap:16px;">
    <div class="card bg-white" v-for="subscriber in subscribers" :key="subscriber.id">
      <subscriber :passed-subscriber="subscriber"></subscriber>
    </div>
  </div>
</template>

<script>
export default {
  props: ["subscribersCollection"],
  mounted() {
    this.likesCount = this.likecount;
  },
  data: function () {
    return {
      subscribers: this.subscribersCollection.data,
    };
  },
};
</script>