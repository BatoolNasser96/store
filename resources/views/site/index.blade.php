@extends('layouts.site')


@section('content')



    @foreach(\App\Product::all() as $product)
        <article class="row blog_item">
            <div class="col-md-3">
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
                            <a href="#">{{ $product->updated_at }}
                                <i class="lnr lnr-calendar-full"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">{{ $product->stat->views}} Views
                                <i class="lnr lnr-eye"></i>
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
            <div class="col-md-9">
                <div class="blog_post">
                    <img src="{{ asset('storage/'. $product->img) }}" alt="">
                    <div class="blog_details">
                        <a href="{{ route('site.view', ['id' => $product->id]) }}">
                            <h2>{{ $product->title}}</h2>
                        </a>
                        <p> {{ $product->detail}}</p>
                        <a href="{{ route('site.view', ['id' => $product->id]) }}" class="white_bg_btn">View More</a>
                    </div>
                </div>
            </div>
        </article>
    @endforeach

@endsection