@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="card-body">
            <div class="card-header mb-3" id="header">投稿</div>
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
                                    <select class="form-control" id="exampleFormControlSelect1" name="buy_id" value="{{ old('buy_id') }}">
                                        <option value="" style="display:none;">選択する</option>
                                        <option value="1" @if(old('buy_id')=='1') selected @endif>あげます</option>
                                        <option value="2" @if(old('buy_id')=='2') selected @endif>売ります</option>
                                        <option value="3" @if(old('buy_id')=='3') selected @endif>ください</option>
                                        <option value="4" @if(old('buy_id')=='4') selected @endif>買います</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">カテゴリーを選択</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_id" value="{{ old('category_id') }}">
                                        <option value="" style="display:none;">選択する</option>
                                        <option value="1" @if(old('category_id')=='1') selected @endif>カラー剤</option>                           
                                        <option value="2" @if(old('category_id')=='2') selected @endif>パーマ剤</option>
                                        <option value="3" @if(old('category_id')=='3') selected @endif>カットウィッグ</option>
                                        <option value="4" @if(old('category_id')=='4') selected @endif>ヘアケア</option>
                                        <option value="5" @if(old('category_id')=='5') selected @endif>バリカン/トリマー</option>
                                        <option value="6" @if(old('category_id')=='6') selected @endif>ヘアエクステ/ウィッグ</option>
                                        <option value="7" @if(old('category_id')=='7') selected @endif>シザース/レザー</option>
                                        <option value="8" @if(old('category_id')=='8') selected @endif>ドライヤー</option>
                                        <option value="9" @if(old('category_id')=='9') selected @endif>コーム / ブラシ</option>
                                        <option value="10" @if(old('category_id')=='10') selected @endif>理美容品/小物</option>
                                        <option value="11" @if(old('category_id')=='11') selected @endif>セット椅子</option>
                                        <option value="12" @if(old('category_id')=='12') selected @endif>スタイリングチェア</option>
                                        <option value="13" @if(old('category_id')=='13') selected @endif>シャンプーチェア</option>
                                        <option value="14" @if(old('category_id')=='14') selected @endif>シャンプー台</option>
                                        <option value="15" @if(old('category_id')=='15') selected @endif>シャンプー関連機器</option>
                                        <option value="16" @if(old('category_id')=='16') selected @endif>セット面/ミラー</option>
                                        <option value="17" @if(old('category_id')=='17') selected @endif>バーバー椅子</option>
                                        <option value="18" @if(old('category_id')=='18') selected @endif>理容室関連機器</option>
                                        <option value="19" @if(old('category_id')=='19') selected @endif>サインポール</option>
                                        <option value="20" @if(old('category_id')=='20') selected @endif>促進器/スチーマー</option>
                                        <option value="21" @if(old('category_id')=='21') selected @endif>スツール/ワゴン</option>
                                        <option value="22" @if(old('category_id')=='22') selected @endif>タオルウォーマー</option>
                                        <option value="23" @if(old('category_id')=='23') selected @endif>消毒器</option>
                                        <option value="24" @if(old('category_id')=='24') selected @endif>サロン家具</option>
                                        <option value="25" @if(old('category_id')=='25') selected @endif>サロンインテリア</option>
                                        <option value="26" @if(old('category_id')=='26') selected @endif>本/参考書</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" id="pricelist">
                                    <label for="price">価格</label>
                                    <div class="row">
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                        <p class="yen">円</p>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">取引場所を選択する</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="prefecture_id" value="{{ old('prefecture_id') }}">
                                        <option value="" style="display:none;">都道府県</option>
                                        <option value="1" @if(old('prefecture_id')=='1') selected @endif>北海道</option>
                                        <option value="2" @if(old('prefecture_id')=='2') selected @endif>青森県</option>
                                        <option value="3" @if(old('prefecture_id')=='3') selected @endif>岩手県</option>
                                        <option value="4" @if(old('prefecture_id')=='4') selected @endif>宮城県</option>
                                        <option value="5" @if(old('prefecture_id')=='5') selected @endif>秋田県</option>
                                        <option value="6" @if(old('prefecture_id')=='6') selected @endif>山形県</option>
                                        <option value="7" @if(old('prefecture_id')=='7') selected @endif>福島県</option>
                                        <option value="8" @if(old('prefecture_id')=='8') selected @endif>茨城県</option>
                                        <option value="9" @if(old('prefecture_id')=='9') selected @endif>栃木県</option>
                                        <option value="10" @if(old('prefecture_id')=='10') selected @endif>群馬県</option>
                                        <option value="11" @if(old('prefecture_id')=='11') selected @endif>埼玉県</option>
                                        <option value="12" @if(old('prefecture_id')=='12') selected @endif>千葉県</option>
                                        <option value="13" @if(old('prefecture_id')=='13') selected @endif>東京都</option>
                                        <option value="14" @if(old('prefecture_id')=='14') selected @endif>神奈川県</option>
                                        <option value="15" @if(old('prefecture_id')=='15') selected @endif>新潟県</option>
                                        <option value="16" @if(old('prefecture_id')=='16') selected @endif>富山県</option>
                                        <option value="17" @if(old('prefecture_id')=='17') selected @endif>石川県</option>
                                        <option value="18" @if(old('prefecture_id')=='18') selected @endif>福井県</option>
                                        <option value="19" @if(old('prefecture_id')=='19') selected @endif>山梨県</option>
                                        <option value="20" @if(old('prefecture_id')=='20') selected @endif>長野県</option>
                                        <option value="21" @if(old('prefecture_id')=='21') selected @endif>岐阜県</option>
                                        <option value="22" @if(old('prefecture_id')=='22') selected @endif>静岡県</option>
                                        <option value="23" @if(old('prefecture_id')=='23') selected @endif>愛知県</option>
                                        <option value="24" @if(old('prefecture_id')=='24') selected @endif>三重県</option>
                                        <option value="25" @if(old('prefecture_id')=='25') selected @endif>滋賀県</option>
                                        <option value="26" @if(old('prefecture_id')=='26') selected @endif>京都府</option>
                                        <option value="27" @if(old('prefecture_id')=='27') selected @endif>大阪府</option>
                                        <option value="28" @if(old('prefecture_id')=='28') selected @endif>兵庫県</option>
                                        <option value="29" @if(old('prefecture_id')=='29') selected @endif>奈良県</option>
                                        <option value="30" @if(old('prefecture_id')=='30') selected @endif>和歌山県</option>
                                        <option value="31" @if(old('prefecture_id')=='31') selected @endif>鳥取県</option>
                                        <option value="32" @if(old('prefecture_id')=='32') selected @endif>島根県</option>
                                        <option value="33" @if(old('prefecture_id')=='33') selected @endif>岡山県</option>
                                        <option value="34" @if(old('prefecture_id')=='34') selected @endif>広島県</option>
                                        <option value="35" @if(old('prefecture_id')=='35') selected @endif>山口県</option>
                                        <option value="36" @if(old('prefecture_id')=='36') selected @endif>徳島県</option>
                                        <option value="37" @if(old('prefecture_id')=='37') selected @endif>香川県</option>
                                        <option value="38" @if(old('prefecture_id')=='38') selected @endif>愛媛県</option>
                                        <option value="39" @if(old('prefecture_id')=='39') selected @endif>高知県</option>
                                        <option value="40" @if(old('prefecture_id')=='40') selected @endif>福岡県</option>
                                        <option value="41" @if(old('prefecture_id')=='41') selected @endif>佐賀県</option>
                                        <option value="42" @if(old('prefecture_id')=='42') selected @endif>長崎県</option>
                                        <option value="43" @if(old('prefecture_id')=='43') selected @endif>熊本県</option>
                                        <option value="44" @if(old('prefecture_id')=='44') selected @endif>大分県</option>
                                        <option value="45" @if(old('prefecture_id')=='45') selected @endif>宮崎県</option>
                                        <option value="46" @if(old('prefecture_id')=='46') selected @endif>鹿児島県</option>
                                        <option value="47" @if(old('prefecture_id')=='47') selected @endif>沖縄県</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">最寄りの駅</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="title">タイトル</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" >
                                 </div>
                                <div class="form-group col-md-12">
                                    <label for="comment">本文</label>
                                    
                                    <textarea class="form-control" rows="5" id="comment" name="content">{{ old('content') }}</textarea>
                                </div>

                                <div class="form-group col-md-6 pt-1">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputFile" name="image" value="{{ old('image') }}" multiple>
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
