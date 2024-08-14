@extends('layouts.app')


@section('body')
    <section class="bg-gray pt-4 pb-5" >
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 me-2 mb-0 color-gray fw-bold ">Discussions</div>
                        <div class="fs-2 me-2 mb-0 color-gray fw-bold ">></div>
                    </div>
                    <h2 class="mb-0 fw-bold" >{{ $discussion->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions  mb-5 w-100  ">
                        <div class="row">

                            <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                <a id="discussion-like" href="javascript:;" data-liked="{{ $discussion->liked() }}">
                                    <img src="{{ $discussion->liked() ? $LikedImage : $notLikedImage }}"
                                        alt="Like" id="discussion-like-icon" class="like-icon mb-1">
                                </a>
                                <span id="discussion-like-count"  class="fs-4 color-gray  mb-2" >{{ $discussion->likeCount }}</span>
                            </div>

                            <div class="col-11" >
                                    <p>
                                        {!!  $discussion->content !!}
                                    </p>
                                    <div class="mb-3" >
                                        <a href="{{ route('discussions.categories.show', $discussion->category->slug) }}">
                                            <span class="badge rounded-pill text-bg-light">{{ $discussion->category->slug }}</span>
                                        </a>
                                    </div>
                                    <div class="row align-items-center justify-content-between ">
                                        <div class="col">
                                            <span class="color-gray  me-2 ">
                                                <a href="javascript:;" id="share-discussions"> <small>share</small></a>
                                                <input type="text" value="{{ route('discussions.show', $discussion->slug) }}" id="current-url"  class="d-none" >
                                            </span>

                                            @if ($discussion->user_id === auth()->id())
                                                <span class="color-gray  me-2 ">
                                                    <a href="{{ route('discussions.edit', $discussion->slug) }}">
                                                        <small>Edit</small>
                                                    </a>
                                                </span>
                                            @endif


                                        </div>
                                        <div class="col-5  col-lg-3  d-flex ">
                                                <a href="#" class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-2 d-flex
                                                 ">
                                                    <img src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL)
                                                    ? $discussion->user->picture : Storage::url($discussion->user->picture)  }}"
                                                    alt="" class=""avatar >
                                                </a>
                                                <div class="lh-1 fs-12px " >
                                                    <span class="text-primary" >
                                                        <a href="#" class="fw-bold  d-flex align-items-start text-break  mb-1" >
                                                            {{ $discussion->user->username }}
                                                        </a>
                                                    </span>
                                                    <span class="color-gray" >{{ $discussion->created_at->diffForHumans() }}</span>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-3 fw-bold ">2 Answers</h3>
                    <div class="mb-5">
                        <div class="card card-discussions mb-3 ">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a href="#">
                                        <img src="{{ url('assets/images/image 10.png') }}" alt="like"  class="like-icon mb-1">
                                    </a>
                                    <span class="fs-4 mb-2 color-gray mb-1 ">12</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        lorem ipsum dolor sit amet contecstur lorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet contecstur
                                    </p>
                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-5  col-lg-3 d-flex ">
                                            <a href="#" class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-2 ">
                                                <img src="{{ url('assets/images/profile.png') }}" alt="" class=""avatar >
                                            </a>
                                            <div class="lh-1 fs-12px " >
                                                <span class="text-black" >
                                                    <a href="#" class="fw-bold  d-flex align-items-start text-break  mb-1" >
                                                        iklil najmi hamzah
                                                    </a>
                                                </span>
                                                <span class="color-gray" >7 hours ago</span>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="card card-discussions ">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a href="#">
                                        <img src="{{ url('assets/images/image 10.png') }}" alt="like"  class="like-icon mb-1">
                                    </a>
                                    <span class="fs-4 mb-2 color-gray mb-1 ">12</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        lorem ipsum dolor sit amet contecstur lorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet contecstur
                                    </p>
                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-5  col-lg-3 d-flex ">
                                            <a href="#" class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-2 ">
                                                <img src="{{ url('assets/images/profile.png') }}" alt="" class=""avatar >
                                            </a>
                                            <div class="lh-1 fs-12px " >
                                                <span class="text-black" >
                                                    <a href="#" class="fw-bold  d-flex align-items-start text-break  mb-1" >
                                                        iklil najmi hamzah
                                                    </a>
                                                </span>
                                                <span class="color-gray" >7 hours ago</span>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="fw-bold text-center" >
                    Please   <a href="{{ route('auth.login.show') }}" class="text-primary text-decoration-none" >singn in</a> or
                      <a href="{{ route('auth.sign-up.show') }}" class="text-primary text-decoration-none " >create an account</a> to participate in this discussion.
                </div>
                    <div>
                </div>

            </div>
            <div class="col-12 col-lg-4">
                <div class="card w-100 ">
                    <h3 class="fw-bold" >All Categories</h3>
                    <div>
                        @foreach ($categories as $category)
                        <a href="{{ route('discussions.categories.show', $category->slug) }}">
                            <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
        </div>

        </div>
    </section>
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#share-discussions').click(function() {

            var copyText = $('#current-url');

            copyText[0].select();

            copyText[0].setSelectionRange(0, 99999);

            navigator.clipboard.writeText(copyText.val());
            var alert = $('#alert');

            alert.removeClass('d-none');

            var alertContainer = alert.find('.container');

            alertContainer.first().text('Link to this discussion copied successfully');
        });

        $('#discussion-like').click(function() {
            // dapatkan data apakah discussion ini sudah pernah dilike oleh user
            // tentukan route like ajax, berdasarkan dengan apakah ini sudah dilike atau belum
            // lakukan proses ajax
            // jika ajax berhasil maka dapatkan status jsonnya
            // jika statusnya success maka isi counter like dengan data counter like dari jsonnya
            // lalu kita ganti icon likenya berdasarkan dengan nilai variabel point 1
            // jika user sebelumnya sudah me-like, maka ganti icon jadi notLikedImage
            // jika user sebelumnya belum me-like, maka ganti icon jadi likedImage

            var isLiked = $(this).data('liked');
            var likeRoute = isLiked ? '{{ route("discussions.like.unlike", $discussion->slug) }}'
            : '{{ route("discussions.like.like", $discussion->slug) }}';

            $.ajax({
                method: 'POST',
                url: likeRoute,
                data: {
                    '_token': '{{ csrf_token() }}'
                }
            })


            .done(function(res) {
                if (res.status === 'success') {
                    $('#discussion-like-count').text(res.data.likeCount);

                    if (isLiked) {
                        $('#discussion-like-icon').attr('src', '{{ $notLikedImage }}');
                    }
                    else {
                        $('#discussion-like-icon').attr('src', '{{ $LikedImage }}');
                    }

                    $('#discussion-like').data('liked', !isLiked);
                }
            })
        });
    })
</script>
@endsection
