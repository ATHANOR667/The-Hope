
const events = {};

causes.forEach(cause => {
    const date = cause.dateRealisation;

    if (!events[date]) {
        events[date] = [];
    }

    events[date].push({
        title: cause.titre,
        time: cause.dateRealisation || "Non spécifié",
        description: Array.isArray(cause.description) ? cause.description : [cause.description],
        image: cause.imagePostRealisation,
        video: cause.videoPostRealisation,
        causeDetails: JSON.stringify(cause)
    });
});



const isLeapYear = (year) => {
    return (
        (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
        (year % 100 === 0 && year % 400 === 0)
    );
};
const getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28;
};
let calendar = document.querySelector('.calendar');
const month_names = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
];
let month_picker = document.querySelector('#month-picker');
const dayTextFormate = document.querySelector('.day-text-formate');
const timeFormate = document.querySelector('.time-formate');
const dateFormate = document.querySelector('.date-formate');

month_picker.onclick = () => {
    month_list.classList.remove('hideonce');
    month_list.classList.remove('hide');
    month_list.classList.add('show');
    dayTextFormate.classList.remove('showtime');
    dayTextFormate.classList.add('hidetime');
    timeFormate.classList.remove('showtime');
    timeFormate.classList.add('hideTime');
    dateFormate.classList.remove('showtime');
    dateFormate.classList.add('hideTime');
};

const generateCalendar = (month, year) => {
    let calendar_days = document.querySelector('.calendar-days');
    calendar_days.innerHTML = '';
    let calendar_header_year = document.querySelector('#year');
    let days_of_month = [
        31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
    ];

    let currentDate = new Date();
    month_picker.innerHTML = month_names[month];
    calendar_header_year.innerHTML = year;

    let first_day = new Date(year, month);

    for (let i = 0; i < first_day.getDay(); i++) {
        let emptyDay = document.createElement('div');
        emptyDay.classList.add('empty');
        calendar_days.appendChild(emptyDay);
    }

    for (let i = 1; i <= days_of_month[month]; i++) {
        let day = document.createElement('div');
        day.innerHTML = i;

        let dateKey = `${year}-${(month + 1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}`;

        if (i === currentDate.getDate() && year === currentDate.getFullYear() && month === currentDate.getMonth()) {
            day.classList.add('current-date');
            // affichant le jour actuel
            document.getElementById("selected-day").innerText = `Aujourd'hui`;
            document.getElementById("selected-month").innerText = `${i}`;
        }

        if (events[dateKey]) {
            day.classList.add("has-event");
            day.style.backgroundColor = "#009fe3";
        }

        day.addEventListener('click', function () {
            document.querySelectorAll('.calendar-days div').forEach(d => {
                // d.style.backgroundColor = "";
                d.classList.remove("selected-day");
            });



            // affichant le jour sélectionné
            document.getElementById("selected-day").innerText = `${month}`;
            document.getElementById("selected-month").innerText = `${i}`;

            showEvents(dateKey);
        });

        calendar_days.appendChild(day);
    }
};


let month_list = calendar.querySelector('.month-list');
month_names.forEach((e, index) => {
    let month = document.createElement('div');
    month.innerHTML = `<div>${e}</div>`;

    month_list.append(month);
    month.onclick = () => {
        currentMonth.value = index;
        generateCalendar(currentMonth.value, currentYear.value);
        month_list.classList.replace('show', 'hide');
        dayTextFormate.classList.remove('hideTime');
        dayTextFormate.classList.add('showtime');
        timeFormate.classList.remove('hideTime');
        timeFormate.classList.add('showtime');
        dateFormate.classList.remove('hideTime');
        dateFormate.classList.add('showtime');
    };
});

(function () {
    month_list.classList.add('hideonce');
})();
document.querySelector('#pre-year').onclick = () => {
    --currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};
document.querySelector('#next-year').onclick = () => {
    ++currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};

let currentDate = new Date();
let currentMonth = { value: currentDate.getMonth() };
let currentYear = { value: currentDate.getFullYear() };
generateCalendar(currentMonth.value, currentYear.value);

const todayShowTime = document.querySelector('.time-formate');
const todayShowDate = document.querySelector('.date-formate');

const currshowDate = new Date();
const showCurrentDateOption = {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    weekday: 'long',
};
const currentDateFormate = new Intl.DateTimeFormat(
    'en-US',
    showCurrentDateOption
).format(currshowDate);
todayShowDate.textContent = currentDateFormate;
setInterval(() => {
    const timer = new Date();
    const option = {
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
    };
    const formateTimer = new Intl.DateTimeFormat('en-us', option).format(timer);
    let time = `${`${timer.getHours()}`.padStart(
        2,
        '0'
    )}:${`${timer.getMinutes()}`.padStart(
        2,
        '0'
    )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
    todayShowTime.textContent = formateTimer;
}, 1000);






function showEvents(date) {
    let eventContainer = document.querySelector('.repetevent');
    eventContainer.innerHTML = '';  // On vide d'abord le container des événements

    if (events[date] && events[date].length > 0) {
        events[date].forEach(event => {
            let eventCard = document.createElement('div');
            eventCard.classList.add('card2', 'animated');  // Ajoute des classes pour le style

            // Crée l'URL de l'image
            document.getElementById("event-details").style.backgroundImage = "url('/storage/" + event.image + "')";

            // Crée le contenu HTML de l'événement
            eventCard.innerHTML = `
                <div class="card-header2">
                    <span class="dot"></span>
                    <div class="card-info">
                        <h3 style="font-weight: 700; color: #ffffff;">${event.title}</h3>
                        <p>${event.time}</p>
                    </div>

                    <!-- Bouton pour afficher/masquer les détails -->
                    <button class="btn-toggle-details" onclick="toggleDetails(this)"><span class="arrow">&#x276F;</span></button>
                </div>

                <div class="card-details hidden">
                    <!-- Description affichée en paragraphes distincts -->
                    <div class="description-container">
                        ${Array.isArray(event.description)
                ? event.description.map(desc => `<p>${desc}</p>`).join('')
                : `<p>${event.description}</p>`
            }
                    </div>

                    <!-- Bouton pour ouvrir le modal de la vidéo -->
                    <button class="btn-play-video" onclick="openVideoModal('${event.video}')">
                        Voir la vidéo
                    </button>

                    <!-- Image de l'événement -->
                </div>

                <!-- Modal pour afficher la vidéo -->
                <div class="modal" id="videoModal" style="display: none;">
                    <div class="modal-content">
                        <span class="close" onclick="closeVideoModal()">&times;</span>
                        <iframe id="videoFrame" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <style>
                    .card-details {
                        padding: 20px;
                        background-color: rgba(124,156,128,0.4);
                        border-radius: 8px;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                        transition: all 0.3s ease-in-out;
                        display: block;
                        color: #333;
                    }

                    .description-container {
                        font-size: 1rem;
                        line-height: 1.6;
                        margin-bottom: 15px;
                        color: #333;
                        white-space: pre-line;  /* Gère les retours à la ligne automatiques si nécessaire */
                        word-wrap: break-word;  /* Permet de couper les mots trop longs pour éviter les débordements */
                    }

                    .btn-play-video {
                        background-color: #007bff;
                        color: #fff;
                        border: none;
                        padding: 10px 20px;
                        margin-top: 15px;
                        border-radius: 5px;
                        cursor: pointer;
                        font-size: 1rem;
                        text-align: center;
                    }

                    .btn-play-video:hover {
                        background-color: #0056b3;
                    }

                    /* Modal */
                    .modal {
                        display: none;
                        position: fixed;
                        z-index: 1000;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: rgba(0, 0, 0, 0.9);  /* Fond semi-transparent noir */
                    }

                    /* Contenu du modal */
                    .modal-content {
                        background-color: #fff;
                        margin: 0;
                        padding: 20px;
                        width: 100%;
                        height: 100%;
                        display: flex;
                        justify-content: center;  /* Centrer horizontalement */
                        align-items: center;  /* Centrer verticalement */
                        box-sizing: border-box;
                        overflow: hidden;
                    }

                    /* L'iframe qui contient la vidéo */
                    iframe {
                        width: 90%;
                        height: 90%;
                        border: none;
                    }

                    /* Bouton de fermeture du modal */
                    .close {
                        color: #aaa;
                        font-size: 32px;
                        font-weight: bold;
                        position: absolute;
                        top: 20px;
                        right: 20px;
                        cursor: pointer;
                    }

                    .close:hover,
                    .close:focus {
                        color: black;
                        text-decoration: none;
                        cursor: pointer;
                    }

                    /* Classe pour masquer les détails */
                    .hidden {
                        display: none;
                    }

                    /* Ajustements pour les petits écrans */
                    @media (max-width: 768px) {
                        /* Adapter l'affichage des événements */
                        .repetevent {
                            padding: 10px;
                            overflow-x: hidden; /* Empêche le défilement horizontal */
                        }

                        .card2 {
                            width: 100%;
                            margin: 10px 0;
                            padding: 10px;
                            box-shadow: none; /* On enlève l'ombre pour alléger l'affichage */
                            border-radius: 8px;
                        }

                        .card-header2 {
                            flex-direction: column;
                            align-items: flex-start;
                            padding: 10px;
                        }

                        .card-info h3 {
                            font-size: 1rem;
                        }

                        .card-info p {
                            font-size: 0.9rem;
                        }

                        .description-container {
                            font-size: 0.85rem;
                            margin-bottom: 15px;
                            padding: 0 10px;  /* Ajout d'un padding pour ne pas coller aux bords */
                        }

                        .btn-play-video {
                            width: 100%;
                            padding: 12px;
                            font-size: 1rem;
                        }

                        .modal {
                            display: none;
                            position: fixed;
                            z-index: 1000;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            overflow: auto;
                            background-color: rgba(0, 0, 0, 0.7);  /* Fond semi-transparent */
                            padding: 20px;
                        }

                        /* Modal content ajustée pour petits écrans */
                        .modal-content {
                            background-color: #fff;
                            margin: 0;
                            padding: 20px;
                            width: 100%; /* Réduit la largeur pour s'adapter */
                            height: 100%; /* Ajuste la hauteur selon le contenu */
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            box-sizing: border-box;
                            overflow: hidden;
                        }

                        iframe {
                            width: 100%;
                            height: 60%;
                            border: none;
                        }

                        .close {
                            color: #aaa;
                            font-size: 28px;
                            font-weight: bold;
                            position: absolute;
                            top: 10px;
                            right: 10px;
                            cursor: pointer;
                        }

                        .close:hover,
                        .close:focus {
                            color: black;
                            text-decoration: none;
                            cursor: pointer;
                        }

                        .description-container p {
                            font-size: 0.9rem;
                            line-height: 1.5;
                            word-wrap: break-word;
                            margin-bottom: 10px;
                        }

                        .card-details {
                            padding: 10px;
                        }
                    }

                    /* Pour les très petits écrans (ex. mobile portrait) */
                    @media (max-width: 480px) {
                        .modal-content {
                            width: 100%;
                            height: 100%;
                            padding: 15px;
                        }

                        .close {
                            font-size: 24px;
                        }

                        .description-container {
                            font-size: 0.8rem;
                            padding: 0 5px;
                        }

                        iframe {
                            height: 50%;
                        }

                        .btn-play-video {
                            font-size: 0.9rem;
                            padding: 10px;
                        }
                    }

                </style>
            `;

            eventContainer.appendChild(eventCard);  // Ajoute la carte à la liste d'événements
        });
    } else {
        eventContainer.innerHTML = `<p style="color: white;">No events for this date.</p>`;
    }
}

function openVideoModal(videoUrl) {
    var modal = document.getElementById("videoModal");
    var iframe = document.getElementById("videoFrame");
    iframe.src = videoUrl;  // Remplace le src de l'iframe par le lien YouTube
    modal.style.display = "block";  // Affiche le modal
}

// Fonction pour fermer le modal
function closeVideoModal() {
    var modal = document.getElementById("videoModal");
    var iframe = document.getElementById("videoFrame");
    iframe.src = "";  // Supprime le lien YouTube pour arrêter la vidéo
    modal.style.display = "none";  // Masque le modal
}

// Fonction pour afficher/masquer les détails d'un événement
function toggleDetails(button) {
    let details = button.closest('.card2').querySelector('.card-details');
    details.classList.toggle('hidden'); // Affiche ou masque la section .card-details
}

