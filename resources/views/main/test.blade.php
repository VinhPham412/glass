@extends('layouts.shop')

@section('content')
    @php
        $list_brands = \App\Models\Brand::all();
    @endphp


    <ui>
        @foreach($list_brands as $brand)
            <li>
                {{$brand->name}}
            </li>
        @endforeach
    </ui>

@endsection