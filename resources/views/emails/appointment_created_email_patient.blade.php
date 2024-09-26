@component('mail::message')
    # Appointment Confirmation


    An appointment has been successfully scheduled with the following details:

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
    
    ## Patient Notification
    Your appointment has been successfully scheduled. Please make sure to arrive on time and bring any necessary documents.

    Thanks,
    Solar Clinic

@endcomponent