@component('mail::message')
# Hi {{ $employee->name }}

Your account has been created. 

your account password is <strong>{{ $password }}</strong>



Regards,<br>
{{ config('app.name') }}
@endcomponent
