@extends('layouts.admin')
@section('main')
{{$product->id}}<br>
{{$product->name}}<br>
{{$product->description}}<br>
{{$product->price}}<br>
Category: {{$product->category->name}}<br>
Brand: {{$product->brand->name}}
@stop();
