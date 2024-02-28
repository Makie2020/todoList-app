<template>
  <div>
    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add a task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <AddTask></AddTask>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AddTask from './AddTask.vue';
  export default {
    components:{
      AddTask
    },
    methods: {
      closeModal() {
        this.$emit('close-modal-event');
      },
    }
  }
</script>

<style scoped>
  .modal {
    display: block;
  }
</style>