<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published
                        <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="../images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ $post->author->name }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category"/>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!!$post->body!!}
                    </div>

                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @auth
                        <form method="POST" action="/posts/{{ $post->slug }}/comments"
                              class="border border-gray-200 p-6 rounded-xl">
                            @csrf

                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                                     class="rounded-full">
                                <h2 class="ml-4">Want to participate??</h2>
                            </header>
                            <div class="mt-6">
                                <textarea name="body" cols="20" rows="5" class="w-full text-sm"
                                          placeholder="Quick, Think of something........">
                                </textarea>

                                @error('body')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                @error('email')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="flex justify-end mt-6 pt-6">
                                    <button type="submit"
                                            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                        @else
                            <p class="font-semibold">
                                <a href="/register" class="hover:underline text-sm font-semibold text-blue-500">Register</a>
                                or
                                <a href="/login" class="hover:underline text-sm font-semibold text-blue-500 ">log in</a> to leave a comment.
                            </p>
                        @endauth
                    </section>

                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
{{--                        @include ('_add-comment')--}}
{{--                        @include('_add-comment')--}}

                        @foreach ($post->comments as $comment)
                            <x-post-comments :comment="$comment"/>
                        @endforeach
                    </section>
                </div>
            </article>
        </main>

{{--        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">--}}
{{--            <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">--}}
{{--            <h5 class="text-3xl">Stay in touch with the latest posts</h5>--}}
{{--            <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>--}}

{{--            <div class="mt-10">--}}
{{--                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">--}}
{{--                    <form method="POST" action="#" class="lg:flex text-sm">--}}
{{--                        <div class="lg:py-3 lg:px-5 flex items-center">--}}
{{--                            <label for="email" class="hidden lg:inline-block">--}}
{{--                                <img src="./images/mailbox-icon.svg" alt="mailbox letter">--}}
{{--                            </label>--}}

{{--                            <input id="email" type="text" placeholder="Your email address"--}}
{{--                                   class="lg:bg-transparent pl-4 focus-within:outline-none">--}}
{{--                        </div>--}}

{{--                        <button type="submit"--}}
{{--                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">--}}
{{--                            Subscribe--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
    </section>
    {{--    </body>--}}
</x-layout>
