<x-mail::message>
# Appointment Cancelled

Hi {{ $adminEmailData['admin_name'] }},

An appointment has been <span style="background-color: #FFC107; color: #000000; padding: 2px;">CANCELLED</span> with the following details:

## Cancelled by:
- **Name:** {{ 
    $adminEmailData['role'] == 0 ? $adminEmailData['cancelled_by'] : 
    ($adminEmailData['role'] == 1 ? 'Dr.' . $adminEmailData['cancelled_by'] : 'Solar Clinic') 
}}

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

You are receiving this email because an appointment has been cancelled in your system.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>