<template>
    <div>
        <navbar></navbar>

        <div>
          <div class="mx-auto w-full text-center mb-7">
            <h1 class="text-2xl">Books</h1>
          </div>

          <div class="w-full px-11">
            <div class="mb-3 text-right w-full">
              <Link href="/books/create" class="hover:text-blue-600"><i class="fa-regular fa-square-plus text-size-3xl"></i> Add new book</Link>
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
                            Publication Date
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
                        <tr>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  Book Name
                                </div>

                                <div class="text-sm text-gray-5">
                                  Email
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              Regional Paradigm Technician
                            </div>

                            <div class="text-sm text-gray-500">
                              Optimization
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              Regional Paradigm Technician
                            </div>

                            <div class="text-sm text-gray-500">
                              Optimization
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Active
                            </span>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Admin
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                          </td>
                        </tr>

                        <tr v-for="book of books" :key="book.id">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  {{ book.name }}
                                </div>

                                <div class="text-sm text-gray-5">
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
                            <div class="text-sm text-gray-900">
                              {{ book.user.name }}
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
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
    </div>
</template>

<script>
import Navbar from '../../Components/Navbar.vue'
export default {
  components: { Navbar },

}
</script>
