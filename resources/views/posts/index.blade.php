@extends('layouts.app')
@section('content')
<div class="jumbotron pt-2 pb-4">
    <form method="get" action="{{ route('posts.search') }}" class="pt-3" accept-charset="UTF-8">
        <div class="form-row">
            <div class="col-lg-2 ml-auto nav-buy">
                <select class="form-control" id="navFormControl" name="buy_id">
                    <option value="" style="display:none;">販売方法から選ぶ</option>
                    <option value="1">あげます</option>
                    <option value="2">売ります</option>
                    <option value="3">ください</option>
                    <option value="4">買います</option>
                </select>
            </div>
            <div class="col-lg-2 nav-prefecture">
                <select class="form-control" id="navFormControl" name="prefecture_id">
                    <option value="" style="display:none;">都道府県から探す</option>
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
            <div class="col-lg-2 nav-category">
                <select class="form-control" id="navFormControl" name="category_id">
                    <option value="" style="display:none;">カテゴリーから探す</option>
                    <option value="1"> カラー剤</a></li>
                    <option value="2"> パーマ剤</a></li>
                    <option value="3"> カットウィッグ</a></li>
                    <option value="4"> ヘアケア</a></li>
                    <option value="5"> バリカン/トリマー</a></li>
                    <option value="6"> ヘアエクステ/ウィッグ</a></li>
                    <option value="7"> シザース/レザー</a></li>
                    <option value="8"> ドライヤー</a></li>
                    <option value="9"> コーム/ブラシ</a></li>
                    <option value="10"> 理美容品/小物</a></li>
                    <option value="11"> セット椅子</a></li>
                    <option value="12"> スタイリングチェア</a></li>
                    <option value="13"> シャンプーチェア</a></li>
                    <option value="14"> シャンプー台</a></li>
                    <option value="15"> シャンプー関連機器</a></li>
                    <option value="16"> セット面/ミラー</a></li>
                    <option value="17"> バーバー椅子</a></li>
                    <option value="18"> 理容室関連機器</a></li>
                    <option value="19"> サインポール</a></li>
                    <option value="20"> 促進器/スチーマー</a></li>
                    <option value="21"> スツール/ワゴン</a></li>
                    <option value="22"> タオルウォーマー</a></li>
                    <option value="23"> 消毒器</a></li>
                    <option value="24"> サロン家具</a></li>
                    <option value="25"> サロンインテリア</a></li>
                    <option value="26"> 本/参考書</a></li>
                </select>
            </div>
            <div class="col-lg-2 nav-search">
                <input name="search" value="" class="form-control" id="navFormControl" type="text" placeholder="キーワードを入力">
            </div>
            <div class="col-lg-2 nav-button">
                <input class="btn btn-secondary btn-sm fas fa-search" id="navFormControlButton" value="検索" type="submit">
            </div>
        </div>
    </form>
</div>

<div class="container-fluid" id="top">
    <div class="tab_wrap m-auto" id="top-responsive">
        <input id="tab1" type="radio" name="tab_btn" checked>
        <input id="tab2" type="radio" name="tab_btn">
        <input id="tab3" type="radio" name="tab_btn">
        <input id="tab4" type="radio" name="tab_btn">
        <input id="tab5" type="radio" name="tab_btn">

        <div class="tab_area">
            <label class="tab2_label" for="tab2">あげます</label>
            <label class="tab3_label" for="tab3">売ります</label>
            <label class="tab4_label" for="tab4">ください</label>
            <label class="tab5_label" for="tab5">買います</label>
        </div>
        <div class="panel_area">
            <div id="panel1" class="tab_panel">
                <div class="gallery">
                    @foreach($posts as $post)
                    <div class="gallery-item m-auto" tabindex="0">
                        <div class="gallery-item-each m-auto">
                            <div class="gallery-item-info d-flex justify-content-between">
                                <div>@if(!empty($post->prefecture->prefecture_name))
                                    {{ $post->prefecture->prefecture_name }}
                                    @endif</div>
                                <div>{{ $post->price }}円</div>
                            </div>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}">
                            @if(isset($post->image))
                            <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                            @else
                            <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="panel2" class="tab_panel">
                <div class="gallery">
                    @foreach($buy_id_1 as $post)
                    <div class="gallery-item m-auto" tabindex="0">
                        <div class="gallery-item-each m-auto">
                            <div class="gallery-item-info d-flex justify-content-between">
                                <div>@if(!empty($post->prefecture->prefecture_name))
                                    {{ $post->prefecture->prefecture_name }}
                                    @endif</div>
                                <div>{{ $post->price }}円</div>
                            </div>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}">
                            @if(isset($post->image))
                            <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                            @else
                            <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="panel3" class="tab_panel">
                <div class="gallery">
                    @foreach($buy_id_2 as $post)
                    <div class="gallery-item m-auto" tabindex="0">
                        <div class="gallery-item-each m-auto">
                            <div class="gallery-item-info d-flex justify-content-between">
                                <div>@if(!empty($post->prefecture->prefecture_name))
                                    {{ $post->prefecture->prefecture_name }}
                                    @endif</div>
                                <div>{{ $post->price }}円</div>
                            </div>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}">
                            @if(isset($post->image))
                            <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                            @else
                            <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="panel4" class="tab_panel">
                <div class="gallery">
                    @foreach($buy_id_3 as $post)
                    <div class="gallery-item m-auto" tabindex="0">
                        <div class="gallery-item-each m-auto">
                            <div class="gallery-item-info d-flex justify-content-between">
                                <div>
                                    @if(!empty($post->prefecture->prefecture_name))
                                    {{ $post->prefecture->prefecture_name }}
                                    @endif</div>
                                <div>{{ $post->price }}円</div>
                            </div>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}">
                            @if(isset($post->image))
                            <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                            @else
                            <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="panel5" class="tab_panel">
                <div class="gallery">
                    @foreach($buy_id_4 as $post)
                    <div class="gallery-item m-auto" tabindex="0">
                        <div class="gallery-item-each m-auto">
                            <div class="gallery-item-info d-flex justify-content-between">
                                <div>@if(!empty($post->prefecture->prefecture_name))
                                    {{ $post->prefecture->prefecture_name }}
                                    @endif
                                </div>
                                <div>{{ $post->price }}円</div>
                            </div>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}">
                            @if(isset($post->image))
                            <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                            @else
                            <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="top-pc">
        <div class="row justify-content-between" id="top-row">
            <h4 class="pb-3">新着情報</h4>
            <p><a href="/post/search?">新着情報をもっと見る <i class="fas fa-angle-right" style="font-size:1.1em;"></i></a></p>
        </div>
        <div class="gallery">
            @foreach($posts as $post)
            <div class="gallery-item m-auto" tabindex="0">
                <div class="gallery-item-each m-auto">
                    <div class="gallery-item-info d-flex justify-content-between">
                        <div>@if(!empty($post->prefecture->prefecture_name))
                            {{ $post->prefecture->prefecture_name }}
                            @endif</div>
                        <div>{{ $post->price }}円</div>
                    </div>
                </div>
                <a href="{{ route('posts.show', $post->id) }}">
                    @if(isset($post->image))
                    <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                    @else
                    <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-between" id="top-row">
            <h4 class="pb-3">あげます</h4>
            <p><a href="/?buy_id=1">もっと見る <i class="fas fa-angle-right" style="font-size:1.1em;"></i> </a></p>
        </div>
        <div class="gallery">
            @foreach($buy_id_1 as $post)
            <div class="gallery-item m-auto" tabindex="0">

                <div class="gallery-item-each m-auto">
                    <div class="gallery-item-info d-flex justify-content-between">
                        <div>@if(!empty($post->prefecture->prefecture_name))
                            {{ $post->prefecture->prefecture_name }}
                            @endif</div>
                        <div>{{ $post->price }}円</div>

                    </div>
                </div>
                <a href="{{ route('posts.show', $post->id) }}">
                    @if(isset($post->image))
                    <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                    @else
                    <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                    @endif
                </a>
            </div>
            @endforeach
        </div>

        <div class="row justify-content-between" id="top-row">
            <h4 class="pb-3">売ります</h4>
            <p><a href="/?buy_id=2">もっと見る <i class="fas fa-angle-right" style="font-size:1.1em;"></i></a></p>
        </div>
        <div class="gallery">
            @foreach($buy_id_2 as $post)
            <div class="gallery-item m-auto" tabindex="0">

                <div class="gallery-item-each m-auto">
                    <div class="gallery-item-info d-flex justify-content-between">
                        <div>@if(!empty($post->prefecture->prefecture_name))
                            {{ $post->prefecture->prefecture_name }}
                            @endif</div>
                        <div>{{ $post->price }}円</div>

                    </div>
                </div>
                <a href="{{ route('posts.show', $post->id) }}">
                    @if(isset($post->image))
                    <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                    @else
                    <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-between" id="top-row">
            <h4 class="pb-3">ください</h4>
            <p><a href="/?buy_id=3">もっと見る <i class="fas fa-angle-right" style="font-size:1.1em;"></i></a></p>
        </div>
        <div class="gallery">
            @foreach($buy_id_3 as $post)
            <div class="gallery-item m-auto" tabindex="0">
                <div class="gallery-item-each m-auto">
                    <div class="gallery-item-info d-flex justify-content-between">
                        <div>
                            @if(!empty($post->prefecture->prefecture_name))
                            {{ $post->prefecture->prefecture_name }}
                            @endif</div>
                        <div>{{ $post->price }}円</div>
                    </div>
                </div>
                <a href="{{ route('posts.show', $post->id) }}">
                    @if(isset($post->image))
                    <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                    @else
                    <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-between" id="top-row">
            <h4 class="pb-3">買います</h4>
            <p><a href="/?buy_id=4">もっと見る <i class="fas fa-angle-right" style="font-size:1.1em;"></i></a></p>
        </div>
        <div class="gallery">
            @foreach($buy_id_4 as $post)
            <div class="gallery-item m-auto" tabindex="0">
                <div class="gallery-item-each m-auto">
                    <div class="gallery-item-info d-flex justify-content-between">
                        <div>@if(!empty($post->prefecture->prefecture_name))
                            {{ $post->prefecture->prefecture_name }}
                            @endif
                        </div>
                        <div>{{ $post->price }}円</div>
                    </div>
                </div>
                <a href="{{ route('posts.show', $post->id) }}">
                    @if(isset($post->image))
                    <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                    @else
                    <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        <div class="row pt-3 mb-4" id="top-row">
            <h4 class="mb-3">カテゴリー</h4>
        </div>

        <ul class="category m-auto">
            <li><a href="/?category_id=1"> カラー剤</a></li>
            <li><a href="/?category_id=2"> パーマ剤</a></li>
            <li><a href="/?category_id=3">カットウィッグ</a></li>
            <li><a href="/?category_id=4"> ヘアケア</a></li>
            <li><a href="/?category_id=5"> バリカン/トリマー</a></li>
            <li><a href="/?category_id=6"> ヘアエクステ/ウィッグ</a></li>
            <li><a href="/?category_id=7"> シザース/レザー</a></li>
            <li><a href="/?category_id=8"> ドライヤー</a></li>
            <li><a href="/?category_id=9"> コーム/ブラシ</a></li>
            <li><a href="/?category_id=10="> 理美容品/小物</a></li>
            <li><a href="/?category_id=11="> セット椅子</a></li>
            <li><a href="/?category_id=12="> スタイリングチェア</a></li>
            <li><a href="/?category_id=13="> シャンプーチェア</a></li>
            <li><a href="/?category_id=14="> シャンプー台</a></li>
            <li><a href="/?category_id=15="> シャンプー関連機器</a></li>
            <li><a href="/?category_id=16="> セット面/ミラー</a></li>
            <li><a href="/?category_id=17="> バーバー椅子</a></li>
            <li><a href="/?category_id=18="> 理容室関連機器</a></li>
            <li><a href="/?category_id=19="> サインポール</a></li>
            <li><a href="/?category_id=20="> 促進器/スチーマー</a></li>
            <li><a href="/?category_id=21="> スツール/ワゴン</a></li>
            <li><a href="/?category_id=22="> タオルウォーマー</a></li>
            <li><a href="/?category_id=23="> 消毒器</a></li>
            <li><a href="/?category_id=24="> サロン家具</a></li>
            <li><a href="/?category_id=25="> サロンインテリア</a></li>
            <li><a href="/?category_id=26="> 本/参考書</a></li>
        </ul>
    </div>
</div>
@endsection