@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-grow justify-center items-center">
            <register-form action="{{route('register')}}"></register-form>
        </div>
    </div>
@endsection
