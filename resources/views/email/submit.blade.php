@component('mail::message')
# Introduction

# Contact from {{ $name }}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
