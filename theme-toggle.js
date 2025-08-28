const toggleBtn = document.getElementById('toggle-theme');
const icon = toggleBtn.querySelector('i');

// Load saved theme from localStorage
if (localStorage.getItem('theme') === 'light') {
  document.body.classList.add('light-mode');
  icon.classList.replace('fa-moon', 'fa-sun');
}

toggleBtn.addEventListener('click', () => {
  document.body.classList.toggle('light-mode');

  const isLight = document.body.classList.contains('light-mode');
  icon.classList.replace(isLight ? 'fa-moon' : 'fa-sun', isLight ? 'fa-sun' : 'fa-moon');
  localStorage.setItem('theme', isLight ? 'light' : 'dark');
});

