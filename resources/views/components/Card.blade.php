
@props(['color' , 'bgColor' => 'white'])
 
<div {{ 
        $attributes
        ->merge(['lang' => 'ur'])
        ->class("card card-text-$color card-bg-$bgColor") }} >
   
   
   <div
           {{ $title->attributes->class("card-header") }}
          class="card-header">{{ $title }}</div>
        @if ($slot->isEmpty())
            provide me content.
            @else
            {{ $slot }}
        @endif
     <div class="card-footer">{{ $footer }}</div>
</div>
