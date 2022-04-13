<template>
    <div>

        <Head> 
            <title>{{(isLogin ?  'Login': 'Sign up')}}</title>

            <meta type="description" content="Sign up on the your bookKing application" head-key="description"/>
        </Head>
        <navbar></navbar>

        <form class="flex justify-center items-center w-full max-h-screen" @submit.prevent="submit">
            <div class="max-w-md mx-auto mt-8 rounded border p-8 w-1/2">
                <div class="mb-6">
                    <h1 class="text-2xl" v-text="isLogin ? 'Login': 'Sign up'"></h1>
                </div>

                <div class="mb-6" v-if="!isLogin">
                    <label class="mb-2 block font-bold text-xs text-slate-600" for="name">
                        Name
                    </label>

                    <input class="p-2 border w-full rounded" type="text" name="name" id="name" required v-model="name"/>

                    <div class="mt-1 text-red-500 text-xs" v-text="errors.name"></div>
                </div>

                <div class="mb-6">
                    <label class="mb-2 block font-bold text-xs text-slate-600" for="email">
                        Email
                    </label>

                    <input class="p-2 border w-full rounded" type="text" name="email" id="email" required v-model="email"/>

                    <div class="mt-1 text-red-500 text-xs" v-text="errors.email"></div>
                </div>

                <div class="mb-6">
                    <label class="mb-2 block font-bold text-xs text-slate-600" for="password">
                        Password
                    </label>

                    <input class="p-2 border w-full rounded" type="password" name="password" id="password" required v-model="password"/>

                    <div class="mt-1 text-red-500 text-xs" v-text="errors.password"></div>
                </div>

                <div class="mb-6" v-if="!isLogin">
                    <label class="mb-2 block font-bold text-xs text-slate-600" for="confirm_password">
                        Confirm password
                    </label>

                    <input class="p-2 border w-full rounded" type="password" name="confirm_password" id="confirm_password" required
                        v-model="confirm_password"/>
                </div>

                <div class="mb-6">
                    <div class="w-full mb-2" v-if="isLogin">
                        <span>Not account? <Link href="/sign-up" class="text-blue-500 hover:underline">Create one</Link></span>
                    </div>

                    <div class="text-right">
                        <button class="bg-blue-500 text-white rounded py-2 px-4 hove:bg-blue-500"
                            type="submit"
                            v-text="isLogin ? 'Login': 'Sign up'"></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</template>

<script>
import Navbar from '../../Components/Navbar.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {Navbar, Head},
    data() {
        return {
            name: '',
            email: '',
            password: '',
            confirm_password: '',
            isLogin : false
        }
    },
    mounted () {
        this.isLogin = this.$page.url == '/login';
    },
    methods: {
        submit() {
            if(this.password === this.confirm_password || this.isLogin) {
                this.$inertia.post((this.$page.url == '/login' ? '/login' : '/sign-up'), {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    confirm_password: this.confirm_password,
                });
            }
            else {
                this.$page.props.errors.password = "Password don't match";
            }
        }
    },
    computed: {
        errors() {
            return this.$page.props.errors;
        }
    }
}
</script>Navbar