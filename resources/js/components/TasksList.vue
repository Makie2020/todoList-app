<template>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody v-for="(task, index) in tasks" :key="index">
        <TaskItem :task="task" class="mt-2 p-5" v-on:taskchanged = "$emit('reloadList')"></TaskItem>
      </tbody>
    </table>
  </div>
</template>

<script>
import TaskItem from './TaskItem.vue';

export default {
  props: ['tasks'],
  components: {
    TaskItem,
    TaskItem
  }
}
</script>