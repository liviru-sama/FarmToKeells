document.addEventListener("DOMContentLoaded", function() {
    const rows = document.querySelectorAll("table tr");
    rows.forEach(row => {
      row.addEventListener("click", function() {
        const link = row.getAttribute("data-href");
        if (link) {
          window.location.href = link;
        }
      });
    });
  });