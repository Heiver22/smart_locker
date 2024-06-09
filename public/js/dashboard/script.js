function toggleDropdown(id) {
    // Obtiene el menú desplegable correspondiente
    var dropdown = document.getElementById(id);
    
    // Verifica si el menú está actualmente visible
    var isDropdownOpen = dropdown.classList.contains('show');
    
    // Cierra todos los menús desplegables abiertos
    var dropdowns = document.getElementsByClassName('dropdown-content');
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].classList.remove('show');
    }

    // Alterna el menú desplegable correspondiente si no estaba abierto
    if (!isDropdownOpen) {
        dropdown.classList.toggle('show');
    }
}
