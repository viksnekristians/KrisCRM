<template>
  <div>
    <div class="card-body">
      <div class="d-flex flex-row justify-content-between">
        <h3 class="h3">{{ subscriber.email }}</h3>
        <input type="checkbox" name="delete-checkbox[]" :value="subscriber.id" />
      </div>
      <div >{{ subscriber.gender }}</div>
      <div class="mb-3">{{ subscriber.birthday }}</div>
      <a :href="'/email/send/' + subscriber.id">Send email</a>
      <div class="d-flex flex-row justify-content-between">
        <form
        method="post"
        :action="'/s/' + subscriber.id + '/delete'"
        class="inline mt-2"
        >
        <input type="hidden" name="_token" :value="csrf">
        <button class="btn btn-outline-danger" type="submit" name="submit" value="submit">
          Delete
        </button>
      </form>
      <a class="link-black" :href="'/s/' + subscriber.id">Open</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["passedSubscriber"],
  mounted() {
    this.subscriber = this.passedSubscriber;
  },
  data: function () {
    return {
      subscriber: this.passedSubscriber,
      csrf: document.querySelector('meta[name="csrf-token"]').content
    };
  },
};
</script>
