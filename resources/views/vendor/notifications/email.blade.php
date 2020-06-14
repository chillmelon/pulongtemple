@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('埔隆宮募資平台感謝您的註冊')
@endif
@endif

{{-- Intro Lines --}}
<h2>埔里鎮的每個人給我10塊錢，我就有80萬了。</h2>
<p>
  對，做事情要花錢。公共性的事情不是政府做就是政府發錢給民間做，所以還是政府在做。政府做事就是慢，程序很多。所以我們募資，直接把錢給要做事的人。
</p>
<p>
  有人在燒草很臭？大家募資買個樹枝粉碎機。
</p>
<p>
  想要一個滑板場？大家募資租一個倉庫來玩。
</p>
<p>
  為埔里好的事我們都要支持！
</p>

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
驗證您的信箱
@endcomponent
@endisset

{{-- Salutation --}}
@lang('祝您有美好的一天'),<br>
@lang('埔隆宮')

{{-- Subcopy --}}
@slot('subcopy')
@lang(
    "或在瀏覽器貼上連結:"
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endcomponent
