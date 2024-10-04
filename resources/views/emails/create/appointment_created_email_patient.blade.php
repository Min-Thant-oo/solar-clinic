<x-mail::message>
# Appointment Confirmation

Hi {{ $patientEmailData['patient_name'] }},

An appointment has been scheduled with the following details:

### Appointment Details:
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

Your appointment has been successfully scheduled. Please make sure to arrive on time and bring any necessary documents.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>