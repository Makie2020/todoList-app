<template>
  <tr>
    <th scope="row">{{ task.id }}</th>
    <td>{{ task.name }}</td>
    <td>{{ task.description }}</td>
    <td>{{ task.date }}</td>
    <td>
      <input type="checkbox" @change="updateStatus($event)" :checked="task.status" :value="task.status" v-on:input="task.status = $event.target.checked"/>
      <label for="checkbox" class="pl-4">{{ task.status ? 'Completed' : 'Open' }}</label>
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
    updateStatus($event) {
      axios.put(`api/task/${this.task.id}`, {
        status: $event.target.checked
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