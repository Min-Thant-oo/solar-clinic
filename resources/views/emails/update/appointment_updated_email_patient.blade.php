<x-mail::message>
# Appointment Cancelled

Hi {{ $patientEmailData['patient_name'] }},

An appointment has been <span style="background-color: #FFC107; color: #000000; padding: 2px;">RESCHEDULED</span> with the following details:

## Rescheduled by:
- **Name:** {{ 
    $patientEmailData['role'] == 0 ? $patientEmailData['rescheduled_by'] : 
    ($patientEmailData['role'] == 1 ? 'Dr.' . $patientEmailData['rescheduled_by'] : 'Solar Clinic') 
}}

### New Appointment Details:
- **Date:** <span style="background-color: #FFC107; color: #000000; padding-left: 2px; padding-right: 2px;">{{ $patientEmailData['old_appointment_date'] }}</span>
- **Time:** <span style="background-color: #FFC107; color: #000000; padding-left: 2px; padding-right: 2px;">{{ $patientEmailData['old_appointment_time'] }}</span>

### Old Appointment Details:
- **Date:** {{ $patientEmailData['date'] }}
- **Time:** {{ $patientEmailData['time'] }}

### Patient Details:
- **Name:** {{ $patientEmailData['patient_name'] }}
- **Email:** {{ $patientEmailData['patient_email'] }}

### Doctor Details:
- **Name:** Dr.{{ $patientEmailData['doctor_name'] }}
- **Specialization:** {{ $patientEmailData['doctor_specialization'] }}
- **Email:** {{ $patientEmailData['doctor_email'] }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
View Appointment
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>