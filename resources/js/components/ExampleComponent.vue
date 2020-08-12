<template>
  <div class="container">
    <div class="columns">
      <div class="column">
        <div class="message" v-for="status in statuses">
          <div class="message-header">
            <p>{{status.user.name}} said...</p>
            <p>{{status.created_at | ago | cap}}</p>
          </div>

          <div class="message-body" v-text="status.body"></div>
        </div>
        <add-to-stream @completed="addStatus"></add-to-stream>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import AddToStream from "./AddToStream.vue";
export default {
  components: {
    AddToStream
  },
  data() {
    return {
      statuses: []
    };
  },
  filters: {
    ago(date) {
      return moment(status.created_at).fromNow();
    },
    cap(string) {
      return string.toUpperCase();
    }
  },
  mounted() {
    console.log("Component mounted.");
    axios.get("/statuses").then(({ data }) => (this.statuses = data));
  },
  methods: {
    addStatus(status) {
      console.log(status);
      this.statuses.unshift(status);
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
      });
    }
  }
};
</script>
