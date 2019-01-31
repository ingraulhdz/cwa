<div class="alert alert-{{$type or 'success'}}" role="alert">
  @if (isset($title))
    <h2>{{$title}}</h2>
  @endif
  {{$slot}}
</div>