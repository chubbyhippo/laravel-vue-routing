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
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
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
    postedOn(status) {
      return moment(status.created_at).fromNow();
    }
  }
};
</script>
