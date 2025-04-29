<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Tiket Santuy
  </title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   * {
    box-sizing: border-box;
  }
  body {
  margin: 0;
  padding: 0;
  font-family: 'Inter', sans-serif;
  background-color: #f7faff;
  color: #222;
  width: 100vw;
  height: 100vh;
  overflow-x: hidden;
}

  a {
    text-decoration: none;
    color: inherit;
  }
  /* Top bar */
  .top-bar {
    background: #fff;
    font-size: 13px;
    color: #7a7a7a;
    padding: 6px 16px 6px 16px;
    display: flex;
    justify-content: flex-end;
    gap: 16px;
    user-select: none;
  }
  .top-bar > div {
    white-space: nowrap;
  }
  .top-bar .lang-select {
    display: flex;
    align-items: center;
    gap: 4px;
    cursor: pointer;
  }
  .top-bar .lang-flag {
    width: 20px;
    height: 14px;
    border: 1px solid #ccc;
    border-radius: 2px;
  }
  /* Header */
  header {
    background: #f7faff;
    border-bottom: 1px solid #e1e9f8;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .header-left {
    display: flex;
    align-items: center;
    gap: 16px;
    flex: 1 1 300px;
    min-width: 0;
  }
 
  .logo-text {
    font-weight: 700;
    font-size: 24px;
    color: #0052cc;
    letter-spacing: -0.03em;
    user-select: none;
  }

  .search-input {
    flex: 1 1 auto;
    min-width: 0;
    position: relative;
  }
  .search-input input {
    width: 100%;
    border: none;
    border-radius: 24px;
    background: #f0f4fb;
    padding: 8px 40px 8px 40px;
    font-size: 14px;
    color: #7a7a7a;
    outline-offset: 2px;
  }
  .search-input input::placeholder {
    color: #7a7a7a;
  }
  .search-input .fa-search {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #7a7a7a;
    font-size: 16px;
  }
  .nav-menu {
    display: flex;
    gap: 24px;
    font-weight: 600;
    font-size: 16px;
    flex-wrap: nowrap;
    white-space: nowrap;
    margin-left: 16px;
  }
  .nav-menu .active {
    background: #e1e9f8;
    border-radius: 8px;
    padding: 6px 12px;
  }
  .nav-menu .dropdown {
    position: relative;
    cursor: pointer;
  }
  .nav-menu .dropdown > span {
    display: inline-flex;
    align-items: center;
    gap: 4px;
  }
  .nav-menu .dropdown > span .fa-caret-down {
    font-size: 10px;
    color: #222;
  }
  .header-right {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-shrink: 0;
    margin-left: auto;
  }
  .btn-login {
    background: #e1e9f8;
    border-radius: 8px;
    padding: 8px 20px;
    font-weight: 700;
    font-size: 16px;
    color: #0052cc;
    border: none;
    cursor: pointer;
  }
  .btn-register {
    background: #007bff;
    border-radius: 8px;
    padding: 8px 20px;
    font-weight: 700;
    font-size: 16px;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  /* Search bar below header */
  .search-bar {
    background: #f7faff;
    padding: 16px;
    display: flex;
    gap: 8px;
    max-width: 960px;
    margin: 16px auto 0 auto;
    border-radius: 16px;
    box-shadow: 0 0 0 1px #e1e9f8;
    flex-wrap: wrap;
  }
  .search-bar > div {
    background: #fff;
    border-radius: 12px;
    padding: 8px 16px;
    font-weight: 600;
    font-size: 14px;
    color: #222;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    white-space: nowrap;
    user-select: none;
  }
  .search-bar > div[aria-label="Swap origin and destination"] {
    background: #fff;
    border-radius: 12px;
    padding: 8px 12px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .search-bar > div[aria-label="Swap origin and destination"]:hover {
    background: #e1e9f8;
  }
  .search-bar .icon-search {
    font-size: 18px;
    color: #222;
  }
  .search-bar .icon-refresh {
    font-size: 16px;
    color: #222;
    border-radius: 50%;
    border: 1px solid #e1e9f8;
    padding: 4px;
  }
  .search-bar .btn-cari {
    margin-left: auto;
    background: #e1e9f8;
    border-radius: 12px;
    padding: 8px 24px;
    font-weight: 700;
    font-size: 16px;
    color: #007bff;
    cursor: pointer;
    border: none;
  }
  /* Date selector */
  .date-selector {
    max-width: 960px;
    margin: 24px auto 0 auto;
    display: flex;
    gap: 1px;
    overflow-x: auto;
    border-radius: 12px;
    user-select: none;
  }
  .date-item {
    background: #fff;
    min-width: 120px;
    padding: 12px 8px 8px 8px;
    font-size: 14px;
    color: #222;
    text-align: center;
    cursor: pointer;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    border-bottom: 3px solid transparent;
    flex-shrink: 0;
    user-select: none;
  }
  .date-item:not(:last-child) {
    border-right: 1px solid #e1e9f8;
  }
  .date-item.active {
    font-weight: 700;
    border-bottom: 3px solid #007bff;
    background: #f0f4fb;
  }
  .date-item .date-day {
    color: #7a7a7a;
    margin-bottom: 4px;
  }
  .date-item .date-price {
    font-weight: 700;
    font-size: 18px;
    margin-top: 4px;
  }
  .date-item .date-price span {
    font-weight: 400;
    font-size: 14px;
    color: #7a7a7a;
  }
  /* Filters */
  .filters {
    max-width: 960px;
    margin: 24px auto 0 auto;
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
  }
  .filter-btn {
    background: #fff;
    border-radius: 24px;
    padding: 8px 16px;
    font-size: 14px;
    font-weight: 600;
    color: #222;
    border: 1px solid #e1e9f8;
    display: flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    user-select: none;
  }
  .filter-btn .badge {
    background: #00b050;
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .filter-btn .fa-filter,
  .filter-btn .fa-sort-amount-down,
  .filter-btn .fa-plane,
  .filter-btn .fa-plane-arrival,
  .filter-btn .fa-clock {
    color: #7a7a7a;
    font-size: 14px;
  }
  .filter-btn .fa-plane,
  .filter-btn .fa-plane-arrival {
    color: #c0c0c0;
  }
  .filter-btn.penerbangan {
    border: 1.5px solid #007bff;
    color: #007bff;
    background: #f0f4fb;
  }
  /* Price guarantee banner */
  .price-guarantee {
    max-width: 960px;
    margin: 24px auto 0 auto;
    background: linear-gradient(90deg, #00b050 0%, #5a4de8 100%);
    border-radius: 12px;
    padding: 12px 24px;
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: default;
  }
  .price-guarantee img {
    width: 32px;
    height: 32px;
    flex-shrink: 0;
  }
  .price-guarantee strong {
    font-weight: 700;
  }
  /* Flight card */
  .flight-card {
    max-width: 960px;
    margin: auto;
    background: #fff;
    border-radius: 16px;
    padding: 16px 24px;
    box-shadow: 0 0 0 1px #e1e9f8;
    user-select: none;
  }
  .flight-header {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 8px;
  }
  .flight-header img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: contain;
    background: #fff;
    border: 1px solid #e1e9f8;
  }
  .flight-header .airline-name {
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .flight-header .fa-suitcase-rolling {
    font-size: 16px;
    color: #222;
  }
  .flight-times {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 30px;
    font-weight: 700;
    font-size: 20px;
    color: #222;
    margin-bottom: 8px;
    user-select: text;
  }
  .flight-times .time-block {
    text-align: center;
    min-width: 60px;
  }
  .flight-times .time-block .airport-code {
    font-weight: 400;
    font-size: 12px;
    color: #7a7a7a;
    margin-top: 2px;
  }
  .flight-times .duration {
    font-weight: 400;
    font-size: 12px;
    color: #7a7a7a;
    text-align: center;
    user-select: none;
  }
  .flight-times .duration .line {
    border-top: 1px solid #7a7a7a;
    margin: 4px 0 4px 0;
  }
  .flight-times .duration .text {
    font-style: normal;
  }
  .flight-price {
    font-weight: 700;
    font-size: 20px;
    color: #f15a4a;
    user-select: text;
  }
  .flight-price small {
    font-weight: 400;
    font-size: 14px;
    color: #7a7a7a;
  }
  .flight-points {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 14px;
    color: #7a7a7a;
    user-select: text;
  }
  .flight-points .fa-circle {
    color: #0052cc;
    font-size: 14px;
  }
  .flight-info {
    font-size: 14px;
    color: #222;
    margin-bottom: 8px;
  }
  .flight-info .tag {
    background: #f0f4fb;
    border-radius: 6px;
    padding: 4px 8px;
    display: inline-block;
    margin-bottom: 8px;
    user-select: none;
  }
  .flight-footer {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    flex-wrap: wrap;
  }
  .show-details {
    font-weight: 700;
    font-size: 14px;
    color: #007bff;
    cursor: pointer;
    user-select: none;
    display: flex;
    align-items: center;
    gap: 4px;
  }
  /* Scrollbar for date selector */
  .date-selector::-webkit-scrollbar {
    height: 6px;
  }
  .date-selector::-webkit-scrollbar-track {
    background: transparent;
  }
  .date-selector::-webkit-scrollbar-thumb {
    background: #c0c0c0;
    border-radius: 3px;
  }
  /* Responsive */
  @media (max-width: 768px) {
    header {
      justify-content: center;
      gap: 12px;
    }
    .header-left {
      flex: 1 1 100%;
      justify-content: center;
      gap: 12px;
    }
    .nav-menu {
      margin-left: 0;
      justify-content: center;
      gap: 12px;
      font-size: 14px;
    }
    .header-right {
      margin-left: 0;
      gap: 8px;
    }
    .search-bar {
      max-width: 100%;
      margin: 16px 8px 0 8px;
      flex-wrap: wrap;
      gap: 8px;
    }
    .date-selector {
      max-width: 100%;
      margin: 24px 8px 0 8px;
    }
    .filters {
      max-width: 100%;
      margin: 24px 8px 0 8px;
      gap: 8px;
    }
    .flight-card {
      max-width: 100%;
      margin: 24px 8px 48px 8px;
      padding: 16px 16px;
    }
    .flight-times {
      gap: 12px;
      font-size: 18px;
    }
    .flight-price {
      font-size: 18px;
    }
  }
  </style>
 </head>
 <body>
   
  <header aria-label="Main header" role="banner">
   <div class="header-left">
    <a aria-label="Tiket.com homepage" class="logo" href="#">
     <span class="logo-text">
      Tiket Santuy
     </span>
    </a>
    <div class="search-input" role="search">
     <i aria-hidden="true" class="fas fa-search">
     </i>
     <input aria-label="Search events in Jakarta" placeholder="Event di Jakarta" type="search"/>
    </div>
   
     
   <div class="header-right">
    <button class="btn-login" type="button">
     Masuk
    </button>
    <button class="btn-register" type="button">
     Daftar
    </button>
   </div>
  </header>
  <section aria-label="Flight search details" class="search-bar">
   <div role="button" tabindex="0" aria-label="Origin Jakarta, JKTC">
    <i aria-hidden="true" class="fas fa-search icon-search">
    </i>
    <strong>
     Jakarta, JKTC
    </strong>
   </div>
   <div aria-label="Swap origin and destination" role="button" tabindex="0" title="Swap origin and destination">
    <i aria-hidden="true" class="fas fa-sync-alt icon-refresh">
    </i>
   </div>
   <div role="button" tabindex="0" aria-label="Destination Surabaya, SUBC">
    <strong>
     Surabaya, SUBC
    </strong>
   </div>
   <div role="button" tabindex="0" aria-label="Date Sel, 29 Apr 25 (Sekali Jalan)">
    <strong>
     Sel, 29 Apr 25 (Sekali Jalan)
    </strong>
   </div>
   <div role="button" tabindex="0" aria-label="Passenger and class 1 penumpang, Ekonomi">
    <strong>
     1 penumpang, Ekonomi
    </strong>
   </div>
   <button aria-label="Search flights" class="btn-cari" type="button">
    Cari
   </button>
  </section>
  
 
  <article aria-label="Flight option from Citilink, departure 18:20 from CGK, arrival 19:55 at SUB, price IDR 930.951 per passenger" class="flight-card">
   <header class="flight-header">
    <div class="airline-name">
     Citilink
     <i aria-label="Baggage included" class="fas fa-suitcase-rolling">
     </i>
    </div>
   </header>
   <section aria-label="Flight times and duration" class="flight-times">
    <div class="time-block">
     <div aria-label="Departure time 18:20" class="time">
      18:20
     </div>
     <div class="airport-code">
      CGK
     </div>
    </div>
    <div aria-label="Flight duration 1 hour 35 minutes" class="duration">
     <div aria-hidden="true" class="line">
     </div>
     <div class="text">
      1j 35m
     </div>
     <div aria-hidden="true" class="line">
     </div>
     <div class="text" style="margin-top:4px;">
      Langsung
     </div>
    </div>
    <div class="time-block">
     <div aria-label="Arrival time 19:55" class="time">
      19:55
     </div>
     <div class="airport-code">
      SUB
     </div>
    </div>
   </section>
   <div class="flight-info">
    <div aria-label="No reschedule or refund allowed" class="tag">
     Tidak bisa reschedule &amp; refund
    </div>
    <div>
     Diskon Jemputan
    </div>
   </div>
   <footer class="flight-footer">
    <div aria-label="Price IDR 930.951 per passenger" class="flight-price">
     IDR 930.951
     <span style="font-weight:400;">
      /pax
     </span>
    </div>
    <div aria-label="931 points available" class="flight-points">
     <i aria-hidden="true" class="fas fa-circle">
     </i>
     931 poin
    </div>
   </footer>
   <div aria-controls="details1" aria-expanded="false" aria-label="Show flight details" class="show-details" role="button" tabindex="0">
    Tampilkan detail
    <i aria-hidden="true" class="fas fa-caret-down">
    </i>
   </div>
  </article>
  <script>
   // Add click handlers for interactive elements

// Search bar clickable divs
document.querySelectorAll('.search-bar > div[role="button"]').forEach(el => {
  el.addEventListener('click', () => {
  });
  el.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      el.click();
    }
  });
});

// Swap origin and destination
document.querySelector('.search-bar > div[aria-label="Swap origin and destination"]').addEventListener('click', () => {
});
document.querySelector('.search-bar > div[aria-label="Swap origin and destination"]').addEventListener('keydown', e => {
  if (e.key === 'Enter' || e.key === ' ') {
    e.preventDefault();
    e.target.click();
  }
});

// Date items clickable
document.querySelectorAll('.date-item').forEach(item => {
  item.addEventListener('click', () => {
    document.querySelectorAll('.date-item').forEach(i => i.classList.remove('active'));
    item.classList.add('active');
  });
  item.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      item.click();
    }
  });
});

// Filter buttons clickable
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
  });
});

// Show details toggle
const showDetailsBtn = document.querySelector('.show-details');
showDetailsBtn.addEventListener('click', () => {
  const expanded = showDetailsBtn.getAttribute('aria-expanded') === 'true';
  showDetailsBtn.setAttribute('aria-expanded', !expanded);
  if (!expanded) {
    showDetailsBtn.innerHTML = 'Sembunyikan detail <i class="fas fa-caret-up"></i>';
  } else {
    showDetailsBtn.innerHTML = 'Tampilkan detail <i class="fas fa-caret-down"></i>';
  }
});
showDetailsBtn.addEventListener('keydown', e => {
  if (e.key === 'Enter' || e.key === ' ') {
    e.preventDefault();
    showDetailsBtn.click();
  }
});
// Fungsi untuk menukar nilai dua elemen
function swapValues(element1, element2) {
  const value1 = element1.querySelector('strong').textContent;
  const value2 = element2.querySelector('strong').textContent;

  element1.querySelector('strong').textContent = value2;
  element2.querySelector('strong').textContent = value1;

  const label1 = element1.getAttribute('aria-label');
  const label2 = element2.getAttribute('aria-label');
  element1.setAttribute('aria-label', label2);
  element2.setAttribute('aria-label', label1);
}

// Tambahkan event listener pada tombol swap
document.querySelector('div[aria-label*="Swap origin and destination"]').addEventListener('click', function() {
  const origin = document.querySelector('div[aria-label*="Origin"]');
  const destination = document.querySelector('div[aria-label*="Destination"]');
  swapValues(origin, destination);
});
  </script>
 </body>
</html>