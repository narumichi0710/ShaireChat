@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="comment">コメント：</label>
                                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                            </div>

                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="post_id" value="{{ $post_id }}">

                            <button type="submit" class="btn btn-success" style="font-size:1.2em;">送信</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
