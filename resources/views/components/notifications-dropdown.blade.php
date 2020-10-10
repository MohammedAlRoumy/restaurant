<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">
            @if(auth()->user() == App\User::first())
            {{App\User::first()->unreadNotifications->count()}}
            @else
                0
            @endif

        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @if(auth()->user())
            @forelse($notifications as $notification)
{{--                <a href="#" class="dropdown-item">--}}
                    <!-- Message Start -->
                    <div class="media">
                        <a href="{{route('dashboard.contactus.show',$notification->data['id'])}}">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    {{ $notification->data['title'] }}
                                </h3>
                                <p class="text-sm">{{ $notification->data['email'] }}</p>
                                <p class="text-sm text-muted"><i
                                        class="far fa-clock mr-1"></i>{{ $notification->created_at->diffForHumans() }}</p>
                            </div>
                        </a>

                    </div>
                    <!-- Message End -->
{{--                </a>--}}
                <div class="dropdown-divider"></div>
                @if($loop->last)
                    <a href="#" class="dropdown-item dropdown-footer">
                        Mark all as read
                    </a>
                @endif
            @empty
                There are no new notifications
            @endforelse
        @endif
    </div>
</li>
