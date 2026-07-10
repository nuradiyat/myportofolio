@extends('layouts.app')

@section('title', 'Home | Muhammad Nuradiyat')

@section('meta_description', 'Website Portofolio Muhammad Nuradiyat.')

@section('content')

    {{-- Hero --}}
    @include('sections.hero')

    {{-- Statistics --}}
    @include('sections.statistics')

    {{-- About --}}
    @include('sections.about')

    {{-- Skills --}}
    @include('sections.skills')

    {{-- Projects --}}
    @include('sections.projects')

    {{-- Certificates --}}
    @include('sections.certificates')

    {{-- Experiences --}}
    @include('sections.experiences')

    {{-- Testimonials --}}
    @include('sections.testimonials')

    {{-- Contact --}}
    @include('sections.contact')

@endsection