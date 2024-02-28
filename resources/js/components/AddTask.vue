<template>
  <div class="d-flex justify-content-center pt-5">
    <form>
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" v-model="task.name" class="form-control" placeholder="Name of the task">
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea cols="2" name="description" placeholder="Write a description for the task" class="form-control"
          v-model="task.description"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" v-model="task.date">
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary" @click="addTask()">Add Task</button>
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
        status: 0
      }
    }
  },
  methods: {
    addTask() {     
      axios.post('/api/task/store', {
        name:this.task.name,
        description:this.task.description,
        date:this.task.date
      })
        .then(response => {
          console.log(response)
          if (response.status == 201) {
            this.task.name = "",
              this.task.description = "",
              this.task.date = "",
              this.$emit('reloadlist');
          }

        })
        .catch(error => {
          console.log(error.response.data.errors);
        })
    }
  }
}
</script>