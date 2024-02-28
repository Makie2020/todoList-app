<template>
  <h2 class="text-center display-4">Check List of {{ formatDate(this.dateToday) }}</h2>
  <div class="d-flex gap-6 justify-content-between pt-5">
    <div></div>
    <div class="input-group mb-3 w-25">
      <div class="input-group-prepend">
        <span class="input-group-text">Change the day</span>
      </div>
      <input type="date" name="date" class="form-control" v-model="dateToday" v-on:input="getTasks()">
    </div>
    <button class="btn btn-primary" @click="showModal"> <font-awesome-icon icon="plus" />Add Task</button>
  </div>
  <TasksList :tasks="tasks" v-on:reloadList="getTasks()"></TasksList>
  <modal v-if="displayModal" @close-modal-event="hideModal" />
</template>

<script>
import TasksList from './TasksList.vue';
import Modal from './Modal.vue';
export default {
  components: {
    TasksList,
    Modal
  },
  data: function () {
    return {
      dateToday: Date,
      tasks: [],
      displayModal: false
    };
  },
  methods: {
    getTasks() {
      axios.get(`/api/tasks/${this.dateToday}`, this.dateToday)
        .then(response => {
          this.tasks = response.data
        })
        .catch(error => {
          console.log(error);
        })
    },
    showModal() {
      this.displayModal = true;
    },
    hideModal() {
      this.displayModal = false;
    },
    formatDate(value) {
      return new Date(value).toLocaleDateString('en-GB', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
      });
    }
  },
  created() {
    this.dateToday = new Date().toISOString().slice(0, 10);
    this.getTasks(this.dateToday);
  }
};
</script>
