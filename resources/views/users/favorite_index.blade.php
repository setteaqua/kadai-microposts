@if(count($favorites)>0)
    <ul class="list-unstyled">
        @foreach($favorites as $micropost)
            <li class="media">
                <div class="medhia-body">
                     <div>
                        {{--投稿の所有者のユーザ詳細ページへのリンク--}}
                        {!! link_to_route("users.show", $micropost->user->name, ["user"=>$micropost->user->id]) !!}
                        <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                    </div>
                    <div>
                        {{--投稿内容--}}
                        <p dlass="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                    </div>
                    <div>
                        {{--お気に入りボタンの設置--}}
                        @include("user_favorite.favorite_button")
                    </div>
                    
                    <div>
                        @if(Auth::id() == $micropost->user_id)
                            {{--投稿削除ボタンのフォーム--}}
                            {!! Form::open(["route"=>["microposts.destroy",$micropost->id],"method" =>"delete"]) !!}
                                {!!Form::submit("Delele", ["class" => "btn btn-danger btn-sm"])!!}
                            {!!Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

@endif