<template>
  <div class="mx-auto container">
    <div class="pt-2">
      <h2 class="text-center display-1">Task List</h2>
      <AddTask v-on:reloadList="getTasks()"/>
    </div>
    <TasksList :tasks="tasks" v-on:reloadList="getTasks()"/>
  </div>
</template>
<script>
import AddTask from './AddTask.vue'
import TasksList from './TasksList.vue'

  export default {
    components:{
      AddTask,
      TasksList,
    },
    data: function () {
      return {
        tasks: [],
      }
    },
    methods: {
      getTasks() {
        axios.get('/api/tasks')
        .then(response => {
          this.tasks = response.data
        })
        .catch(error => {
          console.log(error);
        })
      }
    },
    created(){
      this.getTasks();
    },
  }
</script>