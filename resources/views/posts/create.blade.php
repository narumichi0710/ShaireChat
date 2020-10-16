@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-header" id="header">投稿</div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card justify-content-center">
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
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class=" justify-content-center">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label for="exampleFormControlSelect1">あげます・売ります・探しています・買います</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="buy_id">
                                        <option value="" style="display:none;">選択する</option>
                                        <option value="1">あげます</option>
                                        <option value="2">売ります</option>
                                        <option value="3">ください</option>
                                        <option value="4">買います</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">カテゴリーを選択</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                        <option value="" style="display:none;">選択する</option>
                                        <option value="1">薬剤</option>
                                        <option value="2">スタイリング剤</option>
                                        <option value="3">カットウィッグ / クランプ</option>
                                        <option value="4">美容道具</option>
                                        <option value="5">バリカン / トリマー</option>
                                        <option value="6">ヘアエクステ / ウィッグ</option>
                                        <option value="7">シザース / レザー</option>
                                        <option value="8">ドライヤー</option>
                                        <option value="9">コーム / ブラシ</option>
                                        <option value="10">その他</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" id="pricelist">
                                    <label for="price">価格</label>
                                    <div class="row">
                                        <input type="text" class="form-control" id="price" name="price">
                                        <p class="yen">円</p>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">取引場所を選択する</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="prefecture_id">
                                        <option value="" style="display:none;">都道府県</option>
                                        <option value="1">北海道</option>
                                        <option value="2">青森県</option>
                                        <option value="3">岩手県</option>
                                        <option value="4">宮城県</option>
                                        <option value="5">秋田県</option>
                                        <option value="6">山形県</option>
                                        <option value="7">福島県</option>
                                        <option value="8">茨城県</option>
                                        <option value="9">栃木県</option>
                                        <option value="10">群馬県</option>
                                        <option value="11">埼玉県</option>
                                        <option value="12">千葉県</option>
                                        <option value="13">東京都</option>
                                        <option value="14">神奈川県</option>
                                        <option value="15">新潟県</option>
                                        <option value="16">富山県</option>
                                        <option value="17">石川県</option>
                                        <option value="18">福井県</option>
                                        <option value="19">山梨県</option>
                                        <option value="20">長野県</option>
                                        <option value="21">岐阜県</option>
                                        <option value="22">静岡県</option>
                                        <option value="23">愛知県</option>
                                        <option value="24">三重県</option>
                                        <option value="25">滋賀県</option>
                                        <option value="26">京都府</option>
                                        <option value="27">大阪府</option>
                                        <option value="28">兵庫県</option>
                                        <option value="29">奈良県</option>
                                        <option value="30">和歌山県</option>
                                        <option value="31">鳥取県</option>
                                        <option value="32">島根県</option>
                                        <option value="33">岡山県</option>
                                        <option value="34">広島県</option>
                                        <option value="35">山口県</option>
                                        <option value="36">徳島県</option>
                                        <option value="37">香川県</option>
                                        <option value="38">愛媛県</option>
                                        <option value="39">高知県</option>
                                        <option value="40">福岡県</option>
                                        <option value="41">佐賀県</option>
                                        <option value="42">長崎県</option>
                                        <option value="43">熊本県</option>
                                        <option value="44">大分県</option>
                                        <option value="45">宮崎県</option>
                                        <option value="46">鹿児島県</option>
                                        <option value="47">沖縄県</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">最寄りの駅</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="title">タイトル</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="comment">本文</label>
                                    <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                                </div>

                                <div class="form-group col-md-6 pt-1">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputFile" name="image" multiple>
                                        <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択する</label>
                                    </div>
                                    <div class="input-group-append pt-2">
                                        <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset">取消</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 text-center">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <button type="submit" class="btn btn-success w-25 pt-2 pb-2 mt-2">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
