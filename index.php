<?php
$pageTitle = 'Duurzaam Huis Dashboard';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <main class="dashboard">
        <?php include 'header.php'; ?>

        <section>
            <h2>Actuele Informatie</h2>
            <div class="grid info-grid">
                <article class="card accent-blue">
                    <span class="label">Buitentemperatuur</span>
                    <strong class="big">16°C</strong>
                    <span class="icon">🌡️</span>
                </article>

                <article class="card accent-orange">
                    <span class="label">Zon Tijden</span>
                    <p>🌅 <b>Opkomst:</b> 06:24</p>
                    <p>🌇 <b>Ondergang:</b> 21:18</p>
                </article>

                <article class="card weather-card accent-cyan">
                    <span class="label">Weersverwachting</span>
                    <p>☀️ <b>Vandaag:</b> Zonnig<br><small>Max: 19°C</small></p>
                    <p>🌧️ <b>Morgen:</b> Regenachtig<br><small>Max: 15°C</small></p>
                </article>
            </div>
        </section>

        <section>
            <h2>Grafieken & Analyse</h2>
            <div class="grid chart-grid">
                <article class="card chart-card">
                    <h3>Energieverbruik (kWh)</h3>
                    <canvas id="energyChart"></canvas>
                </article>

                <article class="card chart-card">
                    <h3>Temperatuur Verloop (°C)</h3>
                    <canvas id="tempChart"></canvas>
                </article>
            </div>

            <article class="card chart-card wide">
                <h3>Opbrengst Zonnepanelen (kWh)</h3>
                <canvas id="solarChart"></canvas>
                <div class="note"><b>Totaal vandaag:</b> 9.5 kWh opgewekt | <b>CO₂ besparing:</b> 4.3 kg</div>
            </article>
        </section>

        <section>
            <h2>Meten & Regelen</h2>
            <div class="grid control-grid">
                <article class="card control red">
                    <h3>🌡️ Woonkamer</h3>
                    <strong>21.5°C</strong>
                    <small>Luchtvochtigheid: 55%</small>
                </article>

                <article class="card control orange">
                    <h3>💡 Lamp Status</h3>
                    <strong>UIT</strong>
                    <small>Woonkamer plafondlamp</small>
                </article>

                <article class="card control purple">
                    <h3>⏻ Lamp Bediening</h3>
                    <button onclick="toggleLamp()" id="lampButton">Lamp Inschakelen</button>
                </article>

                <article class="card control green">
                    <h3>⏱️ Lamp Timer</h3>
                    <label for="timer">Tijd</label>
                    <input type="time" id="timer" value="18:00">
                    <button>Timer Starten</button>
                </article>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </main>

    <script>
        const labels = ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '23:59'];

        new Chart(document.getElementById('energyChart'), {
            type: 'bar',
            data: {
                labels,
                datasets: [{ label: 'kWh', data: [2, 1.8, 3.5, 4.3, 3.8, 5.2, 2.7], backgroundColor: '#10b981' }]
            },
            options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
        });

        new Chart(document.getElementById('tempChart'), {
            type: 'line',
            data: {
                labels,
                datasets: [
                    { label: 'Binnen', data: [19, 18, 18, 20, 21, 21, 20], borderColor: '#ef4444', tension: .35 },
                    { label: 'Buiten', data: [13, 11, 12, 16, 18, 15, 13], borderColor: '#3b82f6', tension: .35 }
                ]
            },
            options: { scales: { y: { beginAtZero: true, suggestedMax: 24 } } }
        });

        new Chart(document.getElementById('solarChart'), {
            type: 'line',
            data: {
                labels: ['06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
                datasets: [{ label: 'kWh', data: [0.1, 1.8, 3.6, 2.9, 1.0, 0.1], borderColor: '#f59e0b', backgroundColor: '#f59e0b', tension: .35 }]
            },
            options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
        });

        function toggleLamp() {
            const button = document.getElementById('lampButton');
            button.textContent = button.textContent.includes('Inschakelen') ? 'Lamp Uitschakelen' : 'Lamp Inschakelen';
        }
    </script>
</body>
</html>
<span id="naam1"></span>
<span id="naam2"></span>
<span id="naam3"></span>
