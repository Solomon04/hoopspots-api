<template>
    <div>
        <nav
            class="fixed z-10 w-full bg-white top-0 flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg shadow-lg">
            <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                    <button @click="isHidden = !isHidden"
                            class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                            type="button"><i class="fas fa-bars"></i></button>
                    <a
                        class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-gray-800"
                        href="/">
                        <img src="https://laravel.com/img/logotype.min.svg" alt="..." width="110"
                             class="max-w-full h-auto align-middle border-none"/>
                    </a>
                </div>
                <div class="lg:flex flex-grow items-center hidden">
                    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                        <li class="nav-item">
                            <button
                                class="text-gray-800 active: text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                type="button"
                                style="transition: all 0.15s ease 0s;"
                            >
                                Sign In
                            </button>
                        </li>
                        <li class="nav-item">
                            <button
                                class="rounded-full bg-red-600 text-white active:bg-red-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                type="button"
                                style="transition: all 0.15s ease 0s;"
                            >
                                Get Started <i class="fas fa-arrow-right"></i>
                            </button>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="lg:hidden">
<!--            <side-bar :show="!isHidden" v-click-outside="closeModal"></side-bar>-->
            <div
                v-if="!isHidden"
                class="transiton-all duration-300 ease-in-out absolute z-20 w-full h-screen bg-black opacity-50 visible overflow-hidden"
            ></div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isHidden: true,
            }
        },
        methods: {
            closeModal(e) {
                if (e) {
                    this.isHidden = true;
                }
            },
        }
    }
</script>

<style scoped>

</style>
