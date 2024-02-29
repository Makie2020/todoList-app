<template>
  <div>
    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header d-flex justify-content-between">
            <h4 class="modal-title m-2">Add a task</h4>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary" @click="closeModal">
              <font-awesome-icon icon="close" />
            </button>
          </div>
          <div class="modal-body">
            <AddTask></AddTask>
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