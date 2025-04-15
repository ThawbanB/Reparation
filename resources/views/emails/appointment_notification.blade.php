<h2>Nouveau rendez-vous !</h2>
<p><strong>Type de réparation :</strong> {{ $appointment->repair_type }}</p>
<p><strong>Date du rendez-vous :</strong> {{ $appointment->rdv_date }}</p>
<p><strong>Utilisateur :</strong> {{ $appointment->user->name }} ({{ $appointment->user->email }})</p>
