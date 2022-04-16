<template>
    <div>
        <navbar></navbar>

        <div>
          <div class="mx-auto w-full text-center my-6">
            <h1 class="text-2xl">{{ book.id ? 'Updating' : 'Adding'}} Book</h1>
          </div>
          
          <form class="flex justify-center items-center w-full max-h-screen" @submit.prevent="submit">
            <div class="mt-8 rounded border p-8 w-full lg:w-1/2 md:w-3/5 mx-8">
              <div class="mb-3">
                <label for="name" class="mb-2 block font-bold text-xs text-slate-600">Name *</label>

                <input name="name" id="name" type="text" class="p-2 border w-full rounded" v-model="book.name"/>

                <div class="mt-1 text-red-500 text-xs" v-text="errors.name"></div>
              </div>

              <div class="mb-3">
                <label for="author" class="mb-2 block font-bold text-xs text-slate-600">Author *</label>

                <input name="author" id="author" type="text" class="p-2 border w-full rounded" v-model="book.author"/>

                <div class="mt-1 text-red-500 text-xs" v-text="errors.author"></div>
              </div>

              <div class="mb-3">
                <label for="category_id" class="mb-2 block font-bold text-xs text-slate-600">Category *</label>

                <select name="category_id" id="category_id" class="p-2 border w-full rounded" v-model="book.category_id">
                  <option value="" disabled selected>Select a category</option>
                  <option v-for="category in categories"
                      :key="category.id" :value="category.id" v-text="category.name"></option>
                </select>

                <div class="mt-1 text-red-500 text-xs" v-text="errors.category_id"></div>
              </div>

              <div class="mb-3">
                <label for="publication_date" class="mb-2 block font-bold text-xs text-slate-600">Publication Date *</label>

                <input name="publication_date" id="publication_date" type="date"
                    class="p-2 border w-full rounded" v-model="book.publication_date"/>

                <div class="mt-1 text-red-500 text-xs" v-text="errors.publication_date"></div>
              </div>

              <div class="mb-3">
                <label for="borrowing_user" class="mb-2 block font-bold text-xs text-slate-600">Borrowing user</label>

                <select class="p-2 border w-full rounded" v-model="book.borrowing_user">
                  <option value="" selected>Select a borrowing_user</option>
                  <option v-for="user in users"
                      :key="user.id" :value="user.id" v-text="user.name"></option>
                </select>

                <div class="mt-1 text-red-500 text-xs" v-text="errors.publication_date"></div>
              </div>

              <div class="text-right">
                <Link href="/books" as="button" class="rounded py-2 px-4 hover:bg-gray-100 border mr-3">Cancel</Link>

                <button type="submit"
                    class="bg-green-600 text-white rounded py-2 px-4 hover:bg-green-700">
                  {{ book.id ? 'Update' : 'Save' }} Book
                </button>
              </div>
            </div>
          </form>
        </div>
    </div>
</template>

<script>
import Navbar from '../../Components/Navbar.vue';

export default {
  components: { Navbar },
  
  props: ['book', 'categories', 'users'],

  methods: {
    submit() {
      let method = this.book.id ? 'patch' : 'post';
      let url = this.book.id ? '/books/' + this.book.id : '/books';

      this.$inertia[method](url, {
        name: this.book.name,
        author: this.book.author,
        category_id: this.book.category_id,
        publication_date: this.book.publication_date,
        borrowing_user: this.book.borrowing_user,
      });
    }
  },

  computed: {
      errors() {
          return this.$page.props.errors;
      }
  }
}
</script>
