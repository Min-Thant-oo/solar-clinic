@component('mail::message')
    # Appointment Cancelled

    Hi {{ $adminEmailData['admin_name'] }},

    An appointment has been CANCELLED with the following details:

    ## Cancelled by:
    - **Name:** {{ 
        $adminEmailData['role'] == 0 ? $adminEmailData['cancelled_by'] : 
        ($adminEmailData['role'] == 1 ? 'Dr.' . $adminEmailData['doctor_name'] : 'Solar Clinic') 
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
    
    ## Admin Notification
    You are receiving this email because an appointment has been cancelled in your system.

    Thanks,
    Solar Clinic

        
@endcomponent