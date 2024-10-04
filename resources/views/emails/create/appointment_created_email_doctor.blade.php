<x-mail::message>
# Appointment Confirmation

Hi Dr.{{ $doctorEmailData['doctor_name'] }},

An appointment has been scheduled with the following details:

### Appointment Details:
- **Date:** {{ $doctorEmailData['date'] }}
- **Time:** {{ $doctorEmailData['time'] }}

### Patient Details:
- **Name:** {{ $doctorEmailData['patient_name'] }}
- **Email:** {{ $doctorEmailData['patient_email'] }}

### Doctor Details:
- **Name:** Dr.{{ $doctorEmailData['doctor_name'] }}
- **Specialization:** {{ $doctorEmailData['doctor_specialization'] }}
- **Email:** {{ $doctorEmailData['doctor_email'] }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
View Appointment
@endcomponent

You have a new appointment scheduled. Please review the details and prepare accordingly.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>