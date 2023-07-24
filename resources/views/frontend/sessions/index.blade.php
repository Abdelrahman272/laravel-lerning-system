@extends('frontend.layouts.master')


@section('css')

@endsection

@section('الرئيسية')

@endsection



@section('content')

<section class="lessons mt-5">
    <div class="container">
        <div class="title-section">
            <h2>احدث الدروس</h2>
        </div>
        <div class="row">
            @foreach ($sessions as $session)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="image">
                        <video class="img-fluid" controls>
                            <source src="{{ $session->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="run_video">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="text">
                            <h5 class="card-title">{{ $session->name }} - {{ $session->episode }}</h5>
                        </div>
                        <div class="links mt-3">
                            <a href="{{ $session->video }}" class="btn">مشاهدة الأن</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{$sessions->links()}}
        </div>
    </div>

</section>




@endsection

@section('js')

@endsection
