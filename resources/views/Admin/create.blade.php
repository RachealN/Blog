{{--<x-layout>--}}
{{--    <x-setting heading="Publish New Post">--}}
{{--        <form method="GET" action="/admin/posts" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <div class="mb-6">--}}
{{--                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">--}}
{{--                    Title--}}
{{--                </label>--}}
{{--                <input class="border border-gray-400 p-2 w-full rounded"--}}
{{--                       type="text"--}}
{{--                       name="title"--}}
{{--                       id="title"--}}
{{--                       value="{{ old('title') }}"--}}
{{--                       required>--}}
{{--                @error('title')--}}
{{--                <p class="text-red-500 text-xs mt-1">{{ $message }} </p>--}}
{{--                @enderror--}}
{{--            </div>--}}


{{--            <div class="mb-6">--}}
{{--                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">--}}
{{--                    Slug--}}
{{--                </label>--}}
{{--                <input class="border border-gray-400 p-2 w-full rounded"--}}
{{--                       type="text"--}}
{{--                       name="slug"--}}
{{--                       id="slug"--}}
{{--                       value="{{ old('slug') }}"--}}
{{--                       required>--}}
{{--                @error('slug')--}}
{{--                <p class="text-red-500 text-xs mt-1">{{ $message }} </p>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div class="mb-6">--}}
{{--                <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">--}}
{{--                    Thumbnail--}}
{{--                </label>--}}

{{--                <input class="border border-gray-400 p-2 w-full rounded"--}}
{{--                       type="file"--}}
{{--                       name="thumbnail"--}}
{{--                       id="thumbnail"--}}
{{--                       value="{{ old('thumbnail') }}"--}}
{{--                       required>--}}
{{--                @error('thumbnail')--}}
{{--                <p class="text-red-500 text-xs mt-1">{{ $message }} </p>--}}
{{--                @enderror--}}
{{--            </div>--}}


{{--            <div class="mb-6">--}}
{{--                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">--}}
{{--                    Excerpt--}}
{{--                </label>--}}
{{--                <input class="border border-gray-400 p-2 w-full rounded"--}}
{{--                       type="text"--}}
{{--                       name="excerpt"--}}
{{--                       id="excerpt"--}}
{{--                       value="{{ old('excerpt') }}"--}}
{{--                       required>--}}
{{--                @error('excerpt')--}}
{{--                <p class="text-red-500 text-xs mt-1">{{ $message }} </p>--}}
{{--                @enderror--}}
{{--            </div>--}}


{{--            <div class="mb-6">--}}
{{--                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">--}}
{{--                    Body--}}
{{--                </label>--}}
{{--                <input class="border border-gray-400 p-2 w-full rounded"--}}
{{--                       type="text"--}}
{{--                       name="body"--}}
{{--                       id="body"--}}
{{--                       value="{{ old('body') }}"--}}
{{--                       required>--}}
{{--                @error('body')--}}
{{--                <p class="text-red-500 text-xs mt-1">{{ $message }} </p>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div class="mb-6">--}}
{{--                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">--}}
{{--                    Category--}}
{{--                </label>--}}
{{--                <select name="category_id " id="category_id">--}}
{{--                    @foreach( \App\Models\Category::all() as $category)--}}
{{--                        <option--}}
{{--                            value="{{ $category->id }}"--}}
{{--                            {{old('category_id') == $category->id ? 'selected' : ''}}>--}}
{{--                            {{ ucwords($category->name) }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}

{{--                @error('category')--}}
{{--                <p class="text-red-500 text-xs mt-1">{{ $message }} </p>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div class="mb-6">--}}
{{--                <button--}}
{{--                    type="submit"--}}
{{--                    class="bg-blue-400 text-white rounded py-2 px4 hover:bg-blue-500"--}}
{{--                >--}}
{{--                    Publish--}}
{{--                </button>--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </x-setting>--}}
{{--</x-layout>--}}


<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
