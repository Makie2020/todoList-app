<template>
  <div class="mx-auto container">   
      <Calendar></Calendar>
  </div>
</template>
<script>
import AddTask from './AddTask.vue'
import TasksList from './TasksList.vue'
import Calendar from './Calendar.vue'

  export default {
    components:{
      AddTask,
      TasksList,
      Calendar,
    },
    data: function () {
      return {
        tasks: [],
      }
    },
    methods: {
      getTasks() {
        axios.get(`/api/tasks/${this.tasks.date}`,this.tasks.date)
        .then(response => {
          this.tasks = response.data
        })
        .catch(error => {
          console.log(error);
        })
      }
    },
  }
</script>