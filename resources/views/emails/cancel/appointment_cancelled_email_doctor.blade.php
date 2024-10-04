<x-mail::message>
# Appointment Cancelled

Hi Dr.{{ $doctorEmailData['doctor_name'] }},

An appointment has been <span style="background-color: #FFC107; color: #000000; padding: 2px;">CANCELLED</span> with the following details:

## Cancelled by:
- **Name:** {{ 
    $doctorEmailData['role'] == 0 ? $doctorEmailData['cancelled_by'] : 
    ($doctorEmailData['role'] == 1 ? 'Dr.' . $doctorEmailData['cancelled_by'] : 'Solar Clinic') 
}}

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

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>