@component('mail::message')
    # Appointment Cancelled

    Hi {{ $patientEmailData['patient_name'] }},

    An appointment has been CANCELLED with the following details:

    ## Cancelled by:
    - **Name:** {{ 
        $patientEmailData['role'] == 0 ? $patientEmailData['cancelled_by'] : 
        ($patientEmailData['role'] == 1 ? 'Dr.' . $patientEmailData['doctor_name'] : 'Solar Clinic') 
    }}

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

    Thanks,
    Solar Clinic

        
@endcomponent