<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $posts->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h2>本文</h2>
                <p>{{ $posts->body }}</p>    
            </div>
        </div>
        <div class="date">
             <p>作成日:</p>{{ $posts->created_at }}
             <p>更新日:</p>{{ $posts->updated_at }}
        </div>
        <form action="/posts/{{ $posts->id }}" id="form_{{ $posts->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">
                <p class='delete'><span onclick="return deletePost(this);">delete</span></p>
            </button>
        </form>
        <p class="edit">
            [<a href="/posts/{{ $posts->id }}/edit">edit</a>]
        </p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
            function deletePost(e) {
            'use strict';
                if (confirm("本当に削除しますか？")) {
                    document.getElementById("form_{{ $posts->id }}").submit();
                }
            };
        </script>
    </body>
</html>