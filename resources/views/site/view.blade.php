@extends('layouts.site')


@section('content')

    <!--================Blog Area =================-->
   
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src= "{{ asset('storage/'. $product->img) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                <h5>{{ $product->departments->name}}-{{ $product->parts->name}}</h5>
                                    </div>
                                <ul class="blog_meta list">
                                        <li>
                                            <a href="#">{{ $product->companies->name}}
                                                <i class="lnr lnr-user"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href= "{{ route('like' , ['id' => $product->id]) }}">{{ $product->likes->count()}} Likes
                                                <i class="lnr lnr-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">{{ $product->Comments->count()}} Comments
                                                <i class="lnr lnr-bubble"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">{{ $product->price}} $
                                                <i class="lnr lnr-diamond"></i>
                                            </a>
                                        </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $product->title}}</h2>
                            <p class="excert">{{ $product->detail}} </p>
                            <h4>{{ $product->manufacturers->name}} / {{ $product->brands->name}}</h4>
                            <h3>{{ $product->updated_at}}</h3>
                           
                        </div>
                    </div>
                    
                    @if(Auth::guard('web')->check())
                    <div class="comments-area">
                        <h4>Comments</h4>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                            @forelse ($product->comments as $comment)
                                <div class="user justify-content-between d-flex">
                                    
                                    <div class="desc">
                                        <h5>
                                            <a href="#">{{ $comment->user->username }} </a>
                                        </h5>
                                        <p class="date">{{$comment->created_at}} </p>
                                        <p class="comment">
                                        {{ $comment->comment }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                            @empty
                            <p>This post has no comments</p>
                            @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                       
                        <form method="post" action="{{ route('comment', ['id' => $product->id]) }}"  enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <textarea class="form-control @error('comment') is-invalid @enderror mb-10" rows="5" name="comment" value="comment" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                    required=""></textarea>
                                    @error('comment')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                            <button href="#" class="primary-btn submit_btn"> Comment</button>
                        </form>
                    </div>
                    @endif
                   
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
