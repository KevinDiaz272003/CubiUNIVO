class CardCubiculo extends HTMLElement {

    connectedCallback() {

        const id = this.getAttribute('id');
        const nombre = this.getAttribute('nombre');
        const estado = this.getAttribute('estado');
        const capacidad = this.getAttribute('capacidad');

        const estadoVisual =
            estado === 'disponible'
            ? '🟢 Disponible'
            : '🔴 Ocupado';

        this.innerHTML = `
            <div class="card">

                <h3>${nombre}</h3>

                <p>${estadoVisual}</p>

                <p>
                    👥 ${capacidad} personas
                </p>

                <a href="reservar.php?id=${id}">
                    <button>Reservar</button>
                </a>

            </div>
        `;
    }
}

customElements.define('card-cubiculo', CardCubiculo);