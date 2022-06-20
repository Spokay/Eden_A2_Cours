@extends('layout')


@section('content')
<!-- main -->
<main class="container">
    <!-- articles -->
    @foreach($articles as $article)
    <article class="article">
        <div class="article-thumbnail to-hide displayed">
            <img src="{{asset($article->photo)}}" alt="miniature de l'article">
        </div>
        <div>
            <div class="article-content">
                <div class="article-toggler">
                    <i class="fas fa-chevron-circle-up fa-chevron-circle-down"></i>
                </div>
                <section class="article-texts">
                    <h3>{{$article->titre}}</h3>
                    <p class="to-hide displayed">{{$article->texte}}</p>
                </section>
            </div>
            <div class="article-footer">
                <span><i class="fas fa-calendar"></i> {{$article->created_at}}</span>
                <span><i class="fas fa-comment-alt"></i> {{$article->user_id}}</span>
            </div>
        </div>

    </article>
    @endforeach
{{--/articles--}}
</main>
<!-- /main -->
<script src="{{asset('js/toggle_article.js')}}"></script>

@endsection


