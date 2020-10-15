@if(count($users)>0)
    <ul class="list-unstyled">
        @foreach($users as $user)
            <li class="media">
                {{--ユーザのメールアドレスをもとにGravatarを取得--}}
                <img class="mr-1 rounded" src="{{ Gravatar::get($user->email,["size"=>50]) }}" alt="">
                <div class="medhia-body">
                    <div>
                        {{ $user->name}}
                    </div>
                    <div>
                        {{--ユーザ詳細ページへのリンク--}}
                        <p>{!! link_to_route("users.show","View profile",["user"=>$user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{--ページネーションのリンク--}}
    {{ $users->links() }}
@endif