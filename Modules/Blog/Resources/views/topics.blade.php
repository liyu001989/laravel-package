<h1>{{ config('blog.name') }}</h1>


@foreach($topics as $topic)
<div>{{ $topic->title }}</div>
@endforeach
