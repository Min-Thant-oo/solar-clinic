<x-mail::message>
# Appointment Confirmation

Hi {{ $adminEmailData['admin_name'] }},

An appointment has been scheduled with the following details:

### Appointment Details:
- **Date:** {{ $adminEmailData['date'] }}
- **Time:** {{ $adminEmailData['time'] }}

### Patient Details:
- **Name:** {{ $adminEmailData['patient_name'] }}
- **Email:** {{ $adminEmailData['patient_email'] }}

### Doctor Details:
- **Name:** Dr.{{ $adminEmailData['doctor_name'] }}
- **Specialization:** {{ $adminEmailData['doctor_specialization'] }}
- **Email:** {{ $adminEmailData['doctor_email'] }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
View Appointment
@endcomponent

You are receiving this email because an appointment has been scheduled in your system.

Thanks,<br>
{{ config('app.name') }}      
</x-mail::message>