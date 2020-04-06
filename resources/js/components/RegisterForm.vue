<template>
    <div class="container max-w-full mx-auto md:py-24 px-6">
        <div class="max-w-sm mx-auto px-8 py-8 bg-white shadow-xl rounded-lg">
            <div class="relative flex flex-wrap">
                <div class="w-full relative">
                    <div class="md:mt-6">
                        <div class="text-center font-semibold text-black text-lg mb-2">
                            Create an account
                        </div>
                        <p class="text-center font-base text-black text-sm">
                           Start hooping today 🏀
                        </p>
                        <form class="mt-8" :action="action" method="POST">
                            <div class="mx-auto max-w-lg ">
                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Name</span>
                                    <input placeholder="John Doe"
                                           type="text"
                                           v-validate="'required'"
                                           name="name"
                                           v-model="registration.name"
                                           class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                    />
                                    <small class="text-red-600 font-medium text-sm ml-3" v-if="errors.has('name')">
                                        {{errors.first('name')}}
                                    </small>
                                </div>
                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Email</span>
                                    <input placeholder="test@example.com"
                                           type="email"
                                           name="email"
                                           v-validate="'required|email'"
                                           v-model="registration.email"
                                           class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                    />
                                    <small class="text-red-600 font-medium text-sm ml-3" v-if="errors.has('email')">
                                        {{errors.first('email')}}
                                    </small>
                                </div>
                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Password</span>
                                    <input placeholder=""
                                           type="password"
                                           name="password"
                                           v-model="registration.password"
                                           v-validate="'required'"
                                           ref="password"
                                           class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                    />
                                    <small class="text-xs text-red-600" v-if="errors.has('password')">
                                        {{errors.first('password')}}
                                    </small>
                                </div>
                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Password Confirm</span>
                                    <input placeholder="" type="password"
                                           class="text-md block px-3 py-2 rounded-lg w-full  bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                           name="confirm_password"
                                           data-vv-as="password"
                                           v-validate="'required|confirmed:password'"
                                    />
                                    <small class="text-xs text-red-600" v-if="errors.has('confirm_password')">
                                        {{errors.first('confirm_password')}}
                                    </small>
                                </div>

                                <div class="flex justify-start">
                                    <label class="block text-gray-500 font-bold my-4 flex items-center">
                                        <input class="leading-loose text-pink-600 top-0" type="checkbox"/>
                                        <span class="ml-2 text-sm py-2 text-gray-600 text-left">Accept the
                                          <a href="#"
                                             class="font-semibold text-black border-b-2 border-gray-200 hover:border-gray-500">
                                           Terms and Conditions of the site
                                          </a>
                                    </span>
                                    </label>
                                </div>
                                <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-full text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                                    Register
                                </button>
                            </div>
                            <div class="text-sm font-semibold block  py-6 flex justify-center">
                                <a href="#"
                                   class="text-black font-normal border-b-2 border-gray-200 hover:border-gray-800">You're already member?
                                    <span class="text-black font-semibold">
            Login
          </span>
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                registration: {
                    name: '',
                    email: '',
                    password: '',
                    confirm: '',
                    show: true
                }
            }
        },
        props: {
            action: String
        }
    }
</script>

<style scoped>

</style>
