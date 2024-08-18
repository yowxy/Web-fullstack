@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5  mb-lg-0 ">
                    <div class="d-flex mb-4">
                        <div class="avatar-wrapper  rounded-circle overflow-hidden  flex-shrink-0 me-4">
                            <img src="{{ $picture }}" alt="" class="avatar">
                        </div>
                        <div class="mb-4">
                            <div class="fs-2 fw-bold lh-1 text-break  mb-2">
                                {{ $user->username }}
                            </div>
                            <div class="color-gray">
                                Member Since {{ $user->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="text" id="current-url" class="d-none" value="{{ request()->url() }}">
                        <a id="share-profile" class=" btn-primary me-4" href="javascript:;">Share</a>
                        @auth
                            @if ($user->id === auth()->id())
                                <a href="{{ route('users.edit', $user->username) }}" class="text-decoration-none  btn-primary" >Edit Profile</a>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="mb-5">
                        <h2 class="mb-3 fw-bold ">My Discussions</h2>
                        <div>
                      @forelse ($discussions as $discussion)
                      <div class=" card card-discussions mb-3 w-100">
                        <div class="row">
                         <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                             <div class="text-nowrap me-2 me-lg-0 ">
                                   {{ $discussion->likeCount . ' '. Str::plural('like', $discussion->likeCount) }}
                             </div>
                             <div class="text-nowrap color-gray ">
                                 {{ $discussion->answers->count(). ' '
                                 . Str::plural('answer', $discussion->answers->count()) }}
                             </div>
                         </div>
                         <div class="col-12 col-lg-10" >
                                 <a href="{{ route('discussions.show' , $discussion->slug) }}">
                                     <h3 class="fw-bold">{{ $discussion->title }}</h3>
                                 </a>
                                 <p>{!! $discussion->content_preview !!}</p>
                                 <div class="row">
                                     <div class="col me-1 me-lg-2  ">
                                         <a href="{{ route('discussions.categories.show', $discussion->category->slug) }}">
                                             <span class="badge  rounded-pill text-bg-light " >{{ $discussion->category->name }}</span>
                                         </a>
                                     </div>

                                     <div class="col-5  col-lg-4">
                                         <div class="avatar-sm-wrapper d-inline-block ">
                                             <a href="{{ route('users.show' , $discussion->user->username ) }}" class="me-1" >
                                                 <img src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL)
                                                    ? $discussion->user->picture : Storage::url($discussion->user->picture) }}"
                                                    alt="{{ $discussion->user->username }}" class="avatar rounded-circle" >
                                             </a>
                                         </div>
                                         <span class="f2-12px">
                                             <a href="{{ route('users.show', $discussion->user->username) }}" class="me-1 fw-bold" >
                                                 {{ $discussion->user->username }}
                                             </a>
                                             <span class="color-gray" >
                                                 {{ $discussion->created_at->diffForHumans() }}
                                             </span>
                                         </span>
                                     </div>
                                 </div>
                         </div>
                        </div>
                     </div>
                    @empty
                        <div class="card card-discussions w-100" >
                            Currently no discussion yet
                        </div>
                @endforelse
                        {{-- pagination discussions --}}
                {{ $discussions->appends(['discussions' => $discussions->currentPage()])->links() }}
                        </div>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-3" >My Answers</h2>
                        @forelse ($answers as $answer)
                            <div class="card card-discussions w-100 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-2 col-lg-1 text-center">
                                        {{ $answer->likeCount }}
                                    </div>
                                    <div class="col">
                                        <span>Replied to</span>
                                        <span class="fw-bold text-primary">
                                            <a href="{{ route('discussions.show',$answer->discussion->slug)}}">
                                              {{ $answer->discussion->title }}
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card card-discussions w-100" >
                                Currently no yet
                            </div>
                        @endforelse
                    {{-- pagination answers --}}
                        {{ $answers->appends(['answers' => $discussions->currentPage()])->links() }}


                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#share-profile').click(function() {

            var copyText = $('#current-url');

            copyText[0].select();

            copyText[0].setSelectionRange(0, 99999);

            navigator.clipboard.writeText(copyText.val());
            var alert = $('#alert');

            alert.removeClass('d-none');

            var alertContainer = alert.find('.container');

            alertContainer.first().text('Link to this Profile copied successfully');
        })
    })
</script>
@endsection
