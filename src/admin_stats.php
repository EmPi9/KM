<?php require '../layouts/admin_header.php'; ?>
<?php require_once '../models/project.php';
$projects = getProjects() ?>


<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Статистика
    </h2>

    <!-- General elements -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Сформировать статистику
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form action="" class='text-center'>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Статистика</span>
          <select id="typeSelect" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="requests">Заявок</option>
            <option value="resumes">Резюме</option>
          </select>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Диапазон времени</span>
          <input id="timeRange" name="desc_project" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="2023-2024" oninput="formatTimeRange(this)">
        </label>

        <br>
        <button type="button" onclick="generateComparison()" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Сформировать
        </button>
      </form>
      <canvas id="statisticsChart"></canvas>

    </div>
  </div>
</main>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/locale/ru.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  let chartInstance;

function formatTimeRange(input) {
    let value = input.value.replace(/[^\d]/g, '');

    if (value.length > 4) {
        value = value.slice(0, 4) + '-' + value.slice(4, 8);
    }

    input.value = value.slice(0, 9);

    const pattern = /^\d{4}(-\d{4})?$/;
    if (!pattern.test(input.value)) {
        input.setCustomValidity('Введите диапазон времени в формате 2022 или 2022-2024');
    } else {
        input.setCustomValidity('');
    }
}

async function fetchData(url, params) {
    const response = await fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(params)
    });
    return response.json();
}

async function generateComparison() {
    const typeSelect = document.getElementById('typeSelect');
    const selectedType = typeSelect.value;
    const timeRange = document.getElementById('timeRange').value;
    const [startYear, endYear] = timeRange.includes('-') ? timeRange.split('-').map(year => parseInt(year)) : [parseInt(timeRange), null];

    if (startYear === endYear) {
        alert('Начальный и конечный год не должны быть одинаковыми');
        return;
    }

    const data = await fetchData('../controllers/getStatistics.php', { type: selectedType, startYear, endYear });

    const labels = data.map(item => item.year);
    const values = data.map(item => item.total_requests || item.total_resumes);

    if (chartInstance) {
        chartInstance.destroy();
    }

    const ctx = document.getElementById('statisticsChart').getContext('2d');
    chartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: selectedType === 'requests' ? 'Заявки' : 'Резюме',
                data: values,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
</script>
</body>

</html>