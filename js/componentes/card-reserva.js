class CardReserva extends HTMLElement {

    connectedCallback(){

        const cubiculo = this.getAttribute('cubiculo');
        const fecha = this.getAttribute('fecha');
        const inicio = this.getAttribute('inicio');
        const fin = this.getAttribute('fin');
        const id = this.getAttribute('id');

        this.innerHTML = `
            <div class="card">

                <h3>${cubiculo}</h3>

                <p><strong>Fecha:</strong> ${fecha}</p>

                <p>
                    <strong>Horario:</strong>
                    ${inicio} - ${fin}
                </p>

                <br>

                <a href="../php/cancelar_reserva.php?id=${id}">
                    <button>Cancelar</button>
                </a>

            </div>
        `;
    }
}

customElements.define('card-reserva', CardReserva);