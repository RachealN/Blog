<x-layout>
   @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

       @if($posts->count())
            <x-post-featured-card :post="$posts->first()"/>

            @if($posts->count() > 1)
            <div class="lg:grid lg:grid-cols-3">
                @foreach($posts->skip(1) as $post)
                    <x-post-card :post="$post"/>

                @endforeach
            </div>
            @endif

{{--            {{ $posts->links() }}--}}
        @else
           <p class="text-center">No posts yet, check back later....</p>
        @endif

    </main>
</x-layout>
