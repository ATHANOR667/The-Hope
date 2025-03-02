<div id="evenement" class="">
    <div class="container section-title" data-aos="fade-up">
        <h2>Réalisations</h2>
        <p>Découvrez les réalisations menées par The Hope<br></p>
    </div>
    <div class="bordcontevent">
        <div class="containclandarevent" data-aos="fade-up" data-aos-delay="200">
            <div class="contianer">
                <div class="calendar">
                    <div class="calendar-header">
                        <span class="month-picker" id="month-picker">May</span>
                        <div class="year-picker" id="year-picker">
                            <span class="year-change" id="pre-year">
                                <pre><</pre>
                            </span>
                            <span id="year">2023</span>
                            <span class="year-change" id="next-year">
                                <pre>></pre>
                            </span>
                        </div>
                    </div>

                    <div class="calendar-body">
                        <div class="calendar-week-days">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="calendar-days">

                        </div>
                    </div>
                    <div class="calendar-footer">
                    </div>
                    <div class="date-time-formate">
                        <div class="day-text-formate">Aujourd'hui</div>
                        <div class="date-time-value">
                            <div class="time-formate">01:41:20</div>
                            <div class="date-formate">03 - march - 2022</div>
                        </div>
                    </div>
                    <div class="month-list"></div>
                </div>
            </div>

            <div class="blockafficheevent" id="event-details">
                <!-- Ici, les détails de la cause sélectionnée seront affichés -->
                <div class="contjourclick" style="display: flex; flex-direction: column; text-align: center; justify-content: center;">
                    <h2 style="color: #fff;" id="selected-day">Sélectionner une date</h2>
                    <p style="color: #fff;" id="selected-month">-</p>
                </div>
                <div class="repetevent" id="cause-details" style="display: flex; flex-direction: column; text-align: center;">
                    <!-- Détails de l'événement sélectionné -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     var causes = <?php echo json_encode($realisations); ?>;
</script>
{{--
    <?php
        // Affichage dynamique des jours avec causes
    foreach ($causes as $cause) {
           $cause_date = new DateTime($cause->dateRealisation); // Date de la cause
       $formatted_date = $cause_date->format('Y-m-d'); // Format de la date
       $day = $cause_date->format('d'); // Extraire le jour du mois

        // Afficher les jours avec l'événement associé
        echo "<div class='calendar-day' onclick='showCauseDetails(\"$formatted_date\")'>$day</div>";
     ?>
--}}
