@extends('layouts.app')

@section('content')

<section class="blog-detail py-5">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            {{-- Blog Image --}}
            @if($blog->image)

                <div class="blog-detail-image mb-4">

                    <img
                        src="{{ asset('uploads/blogs/' . $blog->image) }}"
                        alt="{{ $blog->title }}"
                        class="img-fluid w-100"
                    >

                </div>

            @endif


            {{-- Blog Category --}}
            <div class="blog-category mb-3">
                CAFÉ JOURNAL
            </div>


            {{-- Blog Title --}}
            <h1 class="blog-detail-title">
                {{ $blog->title }}
            </h1>


            {{-- Blog Date --}}
            <div class="blog-detail-meta mb-4">

                Published on
                {{ $blog->created_at->format('d F Y') }}

            </div>


            {{-- Blog Description --}}
            <div class="blog-detail-content">

                {!! nl2br(e($blog->description)) !!}

            </div>


            {{-- Back Button --}}
            <div class="mt-5">

                <a
                    href="{{ route('blog.index') }}"
                    class="btn btn-dark"
                >
                    ← Back to Blogs
                </a>

            </div>

        </div>

    </div>

</div>


</section>

@endsection
