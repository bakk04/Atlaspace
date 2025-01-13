// Mise à jour de la date
function updateDateTime() {
    const now = new Date();
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    document.getElementById('currentDate').textContent =
        now.toLocaleDateString('fr-FR', options);
}

// Météo pour Rabat
async function updateWeather() {
    // Simulated weather data for Rabat
    const weatherData = {
        temp: Math.round(20 + Math.random() * 10),
        condition: 'Ensoleillé',
        city: 'Rabat'
    };

    const weatherHtml = `
        <h2>${weatherData.temp}°C</h2>
        <p>${weatherData.condition}</p>
        <p>${weatherData.city}</p>
    `;

    document.getElementById('weather').innerHTML = weatherHtml;
}

// Graphique des tendances
function initChart() {
    const ctx = document.getElementById('trendsChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Réservations',
                data: [4000, 4500, 5000, 4800, 5200, 5500],
                borderColor: '#ff7a00',
                backgroundColor: 'rgba(255, 122, 0, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
    updateDateTime();
    updateWeather();
    initChart();

    // Mises à jour périodiques
    setInterval(updateDateTime, 60000);
    setInterval(updateWeather, 300000);
});

// Remplacez par votre clé API
const API_KEY = "4dbafef7262490228ca1a5e248122c79";
const CITY = "Rabat";

// Appeler l'API météo
async function fetchWeather() {
    try {
        const response = await fetch(
            `https://api.openweathermap.org/data/2.5/weather?q=${CITY}&appid=${API_KEY}&units=metric&lang=fr`
        );
        const data = await response.json();

        // Mettre à jour les éléments HTML avec les données météo
        document.getElementById("temperature").innerText = `${data.main.temp} °C`;
        document.getElementById("description").innerText = data.weather[0].description;
    } catch (error) {
        console.error("Erreur lors de la récupération des données météo:", error);
        document.getElementById("description").innerText = "Impossible de récupérer la météo.";
    }
}

// Charger la météo au chargement de la page
fetchWeather();