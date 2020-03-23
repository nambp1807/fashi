@component('mail::message')
# Introduction

tổng giá trị đơn hàng :{{$order->grand_total}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
