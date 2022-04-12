<template>
    <nav class="bg-purple-200">
        <div class="flex flex-row justify-between items-center p-3">
            <div id="banner" class="w-1/6">
                <Link href="/">
                    <h1>BookKing <i class="fa fa-book" aria-hidden="true"></i></h1>
                </Link>
            </div>

            <form id="searcher" class="w-2/6">
                <input class="w-full rounded-xl" type="text" placeholder="Search a book or a category"/>
            </form>

            <div id="links" class="flex flex-row w-2/6 justify-between">
                <div class="w-full">
                    <ul class="flex flex-row justify-between">
                        <li>
                            <Link href="/">Home</Link>
                        </li>

                        <li>
                            <Link href="/books">Books</Link>
                        </li>

                        <li>
                            <Link href="/categories">Categories</Link>
                        </li>

                        <li>User name <i class="fa fa-user" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: { Link }
}
</script>