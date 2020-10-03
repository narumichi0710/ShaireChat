@extends('layouts.app')

@section('content')

<main>
    <div class="container-fluid pt-4">
    <h4 class="pb-3">最近のコラム</h4>
		<div class="gallery">
        @foreach($posts as $post)
			<div class="gallery-item" tabindex="0">
            <div class="gallery-item1">
            <p> {{ $post->title }}</p>
            </div>

            <a href="{{ route('posts.show', $post->id) }}">
                <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                </a>
            </div>
        @endforeach
            </div>
            <div style="text-align:right;">

                @if(isset($category_id))
                {{ $posts->appends(['category_id' => $category_id])->links() }}

                @elseif(isset($tag_name))
                {{ $posts->appends(['tag_name' => $tag_name])->links() }}

                @elseif(isset($search_query))
                {{ $posts->appends(['search' => $search_query])->links() }}

                @else
                {{ $posts->links() }}
                @endif
    </div>

       
        
        
    </div>
</main>    
@endsection

   


