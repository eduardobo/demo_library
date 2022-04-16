<template>
  <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title"
      :class="show_modal ? '' : 'hidden'" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="relative inline-block align-bottom bg-white rounded-lg text-left
                  overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start w-full">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">{{header}}</h3>
              <form class="mt-2 w-full" @submit.prevent="submit">
                <slot></slot>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse -mx-4">
                  <button type="submit"
                      class="w-full inline-flex justify-center rounded-md border border-transparent
                            shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    {{ confirm }}
                  </button>

                  <button type="button" 
                      class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300
                              shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700
                              hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2
                              focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                      @click="show_modal = false; callParent()">
                    {{ cancel ?? 'Cancel' }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  props: ['show_modal', 'header', 'submit_url', 'method', 'confirm', 'cancel'],
  methods: {
    callParent() {
      this.$emit('form_modal_status', false);
    },
    submit(e) {
      let data = {};
      for(const element of e.target.elements) {
        if(element.localName !== 'button') {
          data[element.name] = element.value;
        }
      }

      this.$inertia[this.method](this.submit_url,
        data
      );

      this.callParent();
    }
  }
}
</script>