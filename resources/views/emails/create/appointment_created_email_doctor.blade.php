@component('mail::message')
    # Appointment Confirmation

    Hi Dr.{{ $doctorEmailData['doctor_name'] }},
    
    An appointment has been successfully scheduled with the following details:

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
    
    ## Doctor Notification
    You have a new appointment scheduled. Please review the details and prepare accordingly.

    Thanks,
    Solar Clinic
@endcomponent