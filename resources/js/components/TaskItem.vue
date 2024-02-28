<template>
  <tr>
    <th scope="row">{{ task.id }}</th>
    <td>{{ task.name }}</td>
    <td>{{ task.description }}</td>
    <td>{{ task.date }}</td>
    <td class="d-flex gap-2 p-3">
      <input type="checkbox" @change="updateStatus()" v-model="task.completed" class="mr-3" />
      <span :class="[task.status ? 'completed' : '', 'task']"> {{ task.status ? 'Completed' : 'Open' }}</span>
    </td>
    <td>
      <button class="btn btn-danger" @click="removeTask()">
        <font-awesome-icon icon="trash" />
        Delete
      </button>
    </td>
  </tr>
</template>

<script>
export default {
  props: ['task'],
  methods: {
    updateStatus() {
      axios.put(`api/task/${this.task.id}`, {
        name: this.task.name,
        description: this.task.description,
        date: this.task.date,
        status: this.task.status
      })
        .then(response => {
          if (response.status == 200) {
            this.$emit('taskchanged');
          }
        })
        .catch(error => {
          console.log(error)
        })
    },
    removeTask() {
      axios.delete(`api/task/${this.task.id}`)
        .then(response => {
          if (response.status == 200) {
            this.$emit('taskchanged');
          }
        })
        .catch(error => {
          console.log(error)
        })
    }
  }
}
</script>