<x-mail::message>
# Appointment Cancelled

Hi {{ $adminEmailData['admin_name'] }},

An appointment has been <span style="background-color: #FFC107; color: #000000; padding: 2px;">RESCHEDULED</span> with the following details:

## Rescheduled by:
- **Name:** {{ 
    $adminEmailData['role'] == 0 ? $adminEmailData['rescheduled_by'] : 
    ($adminEmailData['role'] == 1 ? 'Dr.' . $adminEmailData['rescheduled_by'] : 'Solar Clinic') 
}}

### New Appointment Details:
- **Date:** <span style="background-color: #FFC107; color: #000000; padding-left: 2px; padding-right: 2px;">{{ $adminEmailData['old_appointment_date'] }}</span>
- **Time:** <span style="background-color: #FFC107; color: #000000; padding-left: 2px; padding-right: 2px;">{{ $adminEmailData['old_appointment_time'] }}</span>

### Old Appointment Details:
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