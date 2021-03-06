<template>
  <navbar></navbar>
    <div>
      <div class="mx-auto w-full text-center mb-7 mt-4">
        <h1 class="text-2xl">Categories</h1>
      </div>

      <div class="lg:w-3/5 px-11 mx-auto md:w-full">
        <div class="mb-2 text-right w-full">
          <div>
            <a href="#" @click.prevent="prepareCreating">
              <i class="fa-regular fa-square-plus text-size-3xl"></i> Add new category
            </a>
          </div>

          <div class="mt-3">
            <input type="text" name="search" id="search" v-model="search"
              class="rounded-xl" placeholder="Search category"/>
          </div>
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
                    <tr v-for="category of categoriesPage.data" :key="category.id">
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

        <Pagination :page="categoriesPage"></Pagination>
      </div>
    </div>

    <ModalForm :show_modal="show_modal" @modal_form_status="updateModalStatus"
        :submit_url="'/categories' + (adding_category ? '' : '/' + category_id)"
        :confirm="adding_category ? 'Create Category' : 'Update Category'"
        :header="adding_category ? 'Creating Category' : 'Updating Category'"
        :method="adding_category ? 'post' : 'patch'">
      <div class="mb-6">
        <label class="mb-2 block font-bold text-xs text-slate-600" for="name">Name</label>

        <input name="name" id="name" type="text" class="rounded-xl p-2 border w-full"
            required v-model="category_name"/>

        <div class="mt-1 text-red-500 text-xs" v-text="errors.name"></div>
      </div>

      <div class="mb-6">
        <label class="mb-2 block font-bold text-xs text-slate-600" for="description">Description</label>
        
        <textarea name="description" id="description" type="text" class="rounded-xl p-2 border w-full"
            style="resize:none"
            required v-model="category_description"/>

        <div class="mt-1 text-red-500 text-xs" v-text="errors.description"></div>
      </div>
    </ModalForm>
</template>

<script>
import Navbar from '../../Components/Navbar.vue';
import ModalForm from '../../Components/ModalForm.vue';
import Pagination from '../../Components/Pagination.vue';
import { Inertia } from '@inertiajs/inertia';
import throttle from 'lodash/throttle';

export default {
  components: { Navbar, ModalForm, Pagination},

  props: ['categoriesPage', 'filters'], 

  mounted() {
    this.search = this.filters.search;
  },

  data() {
    return {
      show_modal: false,
      adding_category: true,
      category_id: '',
      category_name: '',
      category_description: '',
      search: ''
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
  },

  computed: {
    errors() {
        return this.$page.props.errors;
    }
  },

  watch: {
    search: {
      handler: throttle(function () {
          Inertia.get('/categories', {
              search: this.search
            }, {
              preserveState: true,
              replace: true
          });

        }, 500),
    }
  }
}
</script>Navbar