@extends('layouts.dashboard')

@section('content')
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

    <!-- Title -->
 <div class="max-w-4xl text-center mx-auto mb-10 lg:mb-14">
   <h2 class="text-2xl font-bold md:text-3xl md:leading-tight dark:text-white">
       Bienvenue {{ $etudiants->username }}</h2>
 </div>
 <!-- End Title -->
</div>
@endsection
