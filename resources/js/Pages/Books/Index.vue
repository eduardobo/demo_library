<template>
    <div>
        <navbar></navbar>

        <div>
          <div class="mx-auto w-full text-center mb-7 mt-4">
            <h1 class="text-2xl">Books</h1>
          </div>

          <div class="w-full px-11">
            <div class="mb-3 text-right w-full">
              <div>
                <Link href="/books/create" class="hover:text-blue-600">
                  <i class="fa-regular fa-square-plus text-size-3xl"></i> Add new book
                </Link>
              </div>

              <div class="mt-3">
                <input type="text" name="search" id="search" v-model="search"
                  class="rounded-xl" placeholder="Search book"/>
              </div>
            </div>

            <div class="flex flex-col">
              <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              scope="col">
                            Name
                          </th>

                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              scope="col">
                            Author
                          </th>

                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              scope="col">
                            Category
                          </th>

                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              scope="col">
                            Borrowing User
                          </th>

                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              scope="col">
                            Actions
                          </th>
                        </tr>
                      </thead>

                      <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="book in booksPage.data" :key="book.id">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  {{ book.name }}
                                </div>

                                <div class="text-sm text-gray-500">
                                  {{ book.publication_date }}
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              {{ book.author }}
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              {{ book.category.name }}
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 inline-block mr-3">
                              {{ book.user ? book.user.name : 'Not Borrowed' }}
                            </div>

                            <div class="inline-block">
                              <button class="rounded w-5 h-5" @click="prepareEditing(book)">
                                <i class="fa-solid fa-pen"></i>
                              </button>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="w-5 h-5 mr-3 inline-block text-center">
                              <Link :href="'/books/' + book.id + '/edit'"
                                  class="bg-yellow-500 text-white rounded w-full h-full inline-block">
                                <i class="fa-solid fa-pen-to-square"></i>
                              </Link>
                            </div>

                            <Link :href="'/books/' + book.id" method="delete" 
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

            <Pagination :page="booksPage"/>
          </div>
        </div>
    </div>


    <ModalForm :show_modal="show_modal" @modal_form_status="show_modal = false"
        :submit_url="'/books/' + book_id + '/borrowing_user'"
        :confirm="'Save'"
        :header="'Update Borrowing user'"
        :method="'post'">
      <div>
        <select name="borrowing_user" id="borrowing_user" class="p-2 border w-full rounded"
            v-model="borrowing_user">
          <option value="">No borrow</option>

          <option v-for="user of users" :key="user.id" :value="user.id" v-text="user.name"></option>
        </select>
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

  props: ['booksPage', 'users', 'filters'],

  data() {
    return {
      show_modal: false,
      borrowing_user: null,
      book_id: null,
      search: ''
    }
  },

  methods: {
    prepareEditing(book) {
      console.log(book.borrowing_user_id);
      this.borrowing_user = book.borrowing_user_id??'';
      this.book_id = book.id;

      this.show_modal = true;
    },
  },

  mounted() {
    this.search = this.filters.search;
  },

  watch: {
    search: {
      handler: throttle(function () {
          Inertia.get('/books', {
              search: this.search
            }, {
              preserveState: true,
              replace: true
          });

        }, 500),
    }
  }
}
</script>
