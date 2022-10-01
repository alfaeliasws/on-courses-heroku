@props(['tags'])

@php
$tags = explode(',', $tags);
@endphp

<p class="font-mono w-full tracking-wider mt-2 fade-1">Categories:</p>
<ul class="flex mt-2">
  @foreach($tags as $tag)
  <li class="fade font-mono flex items-center justify-center bg-neutral-800 text-white rounded-xl py-2 tracking-wide hover:bg-neutral-400 transition-all hover:tracking-kindof px-3 mr-2 text-xs">
    <a href="/?tag={{$tag}}">{{$tag}}</a>
  </li>
  @endforeach
</ul>
