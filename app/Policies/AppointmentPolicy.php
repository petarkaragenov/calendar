<?php

namespace App\Policies;

use App\User;
use App\Appointment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Appointment  $appointment
     * @return mixed
     */
    public function update(User $user, Appointment $appointment)
    {
        return $appointment->id === $appointment->user_id;
    }
}
