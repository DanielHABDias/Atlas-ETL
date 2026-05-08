document.addEventListener('DOMContentLoaded', function () {
  const container = document.getElementById('countries');

  if (!container) return;

  fetch('http://localhost:8000/api/countries')
    .then(res => res.json())
    .then(data => {
      let html = '';

      data.forEach(country => {
        html += `
          <div style="padding:10px;margin:5px 0;border:1px solid #ccc;border-radius:6px;">
            <strong>${country.name}</strong><br>
            Região: ${country.region}<br>
            População: ${country.population}
          </div>
        `;
      });

      container.innerHTML = html;
    })
    .catch(() => {
      container.innerHTML = 'Erro ao carregar dados';
    });
});