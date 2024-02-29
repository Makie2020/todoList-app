<template>
  <div class="d-flex justify-content-center pt-2">
    <form>
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" v-model="task.name" class="form-control" placeholder="Name of the task">
        <span class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</span>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea cols="2" name="description" placeholder="Write a description for the task" class="form-control"
          v-model="task.description"></textarea>
        <span class="text-danger" v-if="errors?.description">{{ errors.description[0] }}</span>
      </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" v-model="task.date">
        <span class="text-danger" v-if="errors?.date">{{ errors.date[0] }}</span>
      </div>
      <div class="d-grid">
        <button type="button" class="btn btn-primary" v-on:click="addTask()">Add Task</button>
      </div>
    </form>
  </div>
</template>
<script>

export default {
  data: function () {
    return {
      task: {
        name: "",
        description: "",
        date: "",
      },
      errors: null,
    }
  },
  methods: {
    addTask() {
      axios.post('/api/task/store', {
        name: this.task.name,
        description: this.task.description,
        date: this.task.date
      })
        .then(response => {
            this.$emit('reloadList');
        })
        .catch(error => {
          this.errors = error.response.data.errors
        })
    }
  }
}
</script>
