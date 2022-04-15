<template>
  <navbar></navbar>
    <div>
      <div class="mx-auto w-full text-center mb-7">
        <h1 class="text-2xl">Categories</h1>
      </div>

      <div class="lg:w-3/5 px-11 mx-auto md:w-full">
        <div class="mb-3 text-right w-full">
          <a href="#" @click.prevent="prepareCreating"><i class="fa-regular fa-square-plus text-size-3xl"></i> Add new category</a>
        </div>

        <div class="flex flex-col">
          <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          scope="col">
                        Name
                      </th>

                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          scope="col">
                      Description
                      </th>

                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          scope="col">
                        Actions
                      </th>
                    </tr>
                  </thead>

                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="category of categories" :key="category.id">
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{ category.name }}
                            </div>
                          </div>
                        </div>
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                          {{ category.description }}
                        </div>
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        <button  class="bg-yellow-500 text-white rounded w-5 h-5 mr-3"
                            @click="prepareEditing(category)">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <Link :href="/categories/ + category.id" method="delete" 
                            class="text-white bg-red-500 rounded w-5 h-5" as="button">
                            <i class="fa-solid fa-trash-can"></i>
                          </Link>
                      </td>
                    </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <FormModal :show_modal="show_modal" @modalStatus="updateModalStatus"
        :submit_url="'/categories' + (adding_category ? '' : '/' + category_id)"
        :confirm="adding_category ? 'Create Category' : 'Update Category'"
        :header="adding_category ? 'Creating Category' : 'Updating Category'"
        :method="adding_category ? 'post' : 'patch'">
      <div class="mb-6">
        <label class="mb-2 block font-bold text-xs text-slate-600" for="name">Name</label>
        <input name="name" id="name" type="text" class="rounded-xl p-2 border w-full"
            required v-model="category_name"/>
      </div>

      <div class="mb-6">
        <label class="mb-2 block font-bold text-xs text-slate-600" for="description">Description</label>
        <input name="description" id="description" type="text" class="rounded-xl p-2 border w-full"
            required v-model="category_description"/>
      </div>
    </FormModal>
</template>

<script>
import Navbar from '../../Components/Navbar.vue'
import FormModal from '../../Components/FormModal.vue'
export default {
    components: { Navbar, FormModal},

    props: ['categories'], 

    data() {
      return {
        show_modal: false,
        adding_category: true,
        category_id: '',
        category_name: '',
        category_description: ''
      }
    },

    methods: {
      updateModalStatus(estatus) {
        this.show_modal = estatus;
      },
      prepareEditing(category) {
        this.category_id = category.id;
        this.category_name = category.name;
        this.category_description = category.description;

        this.adding_category = false;
        this.show_modal = true;
      },
      prepareCreating() {
        this.category_id = '';
        this.category_name = '';
        this.category_description = '';

        this.adding_category = true;
        this.show_modal = true;
      }
    }
}
</script>Navbar