@extends('layouts.site')


@section('content')

<table>
@foreach(Auth::guard('web')->user()->cart as $product)
    <tr>
        <td>{{ $product->title }}</td>
        <td>{{ $product->price }}</td>
</tr>
@endforeach
</table>
<button>
<a href="{{ route('checkout') }}"> checked</a>
</button>

@endsection