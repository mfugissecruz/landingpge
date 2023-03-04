<x-default-layout>
    <div
        x-data="{showSubscribeModal: false}"
        class="flex flex-col bg-indigo-900 w-full h-screen"
    >
        <nav class="flex items-center justify-between container mx-auto px-5 py-5 text-indigo-200">
            <a href="/" class="text-2xl font-bold">
                <x-application-logo class="w-16 h-16 fill-current"/>
            </a>
            <div class="flex justify-end">
                @auth
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('dashboard') }}">
                        Login
                    </a>
                @endauth
            </div>
        </nav>
        <div class="flex container mx-auto items-center h-full px-5">
            <div class="flex flex-col w-1/3 items-start">
                <h1 class="text-white font-bold text-5xl leading-tight mb-4">
                    Simple generic landing page to subscribe.
                </h1>
                <p class="text-indigo-200 text-xl mb-10">
                    We are just checking the <span class="font-bold underline">TALL</span> stack. Wolud you mind subscribing?
                </p>
                <x-primary-button x-on:click="showSubscribeModal=true" class="py-3 px-8 bg-red-600 hover:bg-red-500 border-none text-white focus:bg-red-700">
                    Subscribe
                </x-primary-button>
            </div>
        </div>
        <div
            x-show="showSubscribeModal"
            x-on:click.self="showSubscribeModal=false"
            x-on:keydown.esc.window="showSubscribeModal=false"
            class="flex fixed inset-0 bg-gray-900 bg-opacity-60 items-center"
        >
            <div class="m-auto bg-pink-500 shadow-2xl rounded-xl p-10">
                <div class="flex flex-col gap-4">
                    <p class="text-white text-4xl font-extrabold text-center">Let's do it!</p>
                    <form action="">
                        <div class="flex flex-col items-center gap-4">
                            <div class="flex flex-col items-center">
                                <x-text-input
                                    id="email"
                                    class="px-5 py-3 w-80 border border-blue-400"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required autofocus
                                    autocomplete="username"
                                    placeholder="Email address"
                                />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <span class="text-gray-100 text-sm mt-1">
                        We will send you a confirmation email.
                    </span>
                            </div>

                            <x-primary-button class="py-3 px-8 bg-indigo-800 hover:bg-indigo-600 border-none text-white">
                                Subscribe
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
