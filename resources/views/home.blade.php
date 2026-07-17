@extends('layouts.app')

@section('title', 'Muhammad Nuradiyat | Web Developer BSD Tangerang')

@section(
    'meta_description',
    'Muhammad Nuradiyat adalah Web Developer di BSD Tangerang yang membangun website modern, cepat, dan responsif menggunakan Laravel, Filament, Tailwind CSS, dan MySQL. Lihat portofolio, pengalaman, sertifikat, dan proyek yang telah dikerjakan.'
)

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