@component('mail::message')
    # Appointment Confirmation

    Hi {{ $adminEmailData['admin_name'] }}

    An appointment has been successfully scheduled with the following details:

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
    
    ## Admin Notification
    You are receiving this email because an appointment has been scheduled in your system.

    Thanks,
    Solar Clinic

        
@endcomponent