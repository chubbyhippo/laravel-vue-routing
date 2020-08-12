<template>
  <div class="message">
    <div class="message-header">Push to the Stream...</div>
    <div class="message-body">
      <form @submit.prevent="onSubmit">
        <p class="control">
          <textarea
            class="textarea"
            placeholder="I have something to say..."
            v-model="body"
            @keydown="delete errors['body']"
          ></textarea>
          <span
            class="help is-danger"
            v-if="errors['body']"
            v-text="errors['body']? errors['body'][0]: ''"
          ></span>
        </p>
        <p class="control">
          <button
            class="button is-primary"
            :disabled="Object.keys(errors).length === 0 && errors.constructor ===
          Object?false:true"
          >Submit</button>
        </p>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      body: "",
      errors: {}
    };
  },
  methods: {
    onSubmit() {
      console.log(this.body);
      axios
        .post("/statuses", {
          body: this.body
        })
        .then(status => {
          this.$emit("completed", status.data);
        })
        .catch(errors => {
          console.log(errors.response.data);
          this.errors = errors.response.data.errors;
        });
    }
  }
};
</script>
