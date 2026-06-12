class MenuNavegacion extends HTMLElement {

    connectedCallback(){

        const rol = this.getAttribute('rol');

        if(rol === 'estudiante'){

            this.innerHTML = `
                <div class="menu">

                    <a href="dashboard.php">
                        <button>Inicio</button>
                    </a>

                    <a href="mis_reservas.php">
                        <button>Mis Reservas</button>
                    </a>

                    <a href="../php/logout.php">
                        <button>Cerrar Sesión</button>
                    </a>

                </div>
            `;
        }

        if(rol === 'admin'){

            this.innerHTML = `
                <div class="menu">

                    <a href="dashboard.php">
                        <button>Panel</button>
                    </a>

                    <a href="reservas.php">
                        <button>Reservas</button>
                    </a>

                    <a href="../php/logout.php">
                        <button>Cerrar Sesión</button>
                    </a>

                </div>
            `;
        }
    }
}

customElements.define('menu-navegacion', MenuNavegacion);