var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function toggleSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove("sidebar-responsive");

    sidebarOpen = false;
  } else {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}
function logout() {
  window.location.href = "../repositories/logout.php";
}
