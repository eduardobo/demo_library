<template>
    <nav class="bg-purple-200">
        <div class="flex flex-row justify-between items-center p-3">
            <div id="banner" class="w-1/6">
                <Link href="/" class="hover:underline">
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
                            <Link href="/" class="hover:underline" 
                                :class="{'font-bold underline' : $page.component === 'Home'}">Home</Link>
                        </li>

                        <li>
                            <Link href="/books" class="hover:underline"
                                :class="{'font-bold underline' : $page.component === 'Books'}">Books</Link>
                        </li>

                        <li>
                            <Link href="/categories" class="hover:underline"
                                :class="{'font-bold underline' : $page.component === 'Categories'}">Categories</Link>
                        </li>

                        <li v-if="!isLogged">
                            <Link href="/login" class="hover:underline">Log In</Link>
                        </li>

                        <li v-if="isLogged">{{auth.user.name}} <i class="fa fa-user" aria-hidden="true"></i></li>

                        <li v-if="isLogged">
                            <Link href="/logout" method="post" as="button" class="hover:underline">Log Out</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    computed: {
        isLogged() {
            return this.$page.props.auth.isLogged;
        },
        auth() {
            return this.$page.props.auth;
        }
    }
}
</script>