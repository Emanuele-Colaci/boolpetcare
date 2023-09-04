import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

// RECUPERO IL FORM TRAMITE IL SELETTORE
const deleteButton = document.querySelectorAll('.form-delete button[type="submit"]');

// CICLO TUTTI I BOTTONI AVENTI COME NOMI IL SELETTORE form-delete
deleteButton.forEach((button) => {

    // CREO UN EVENTO AL CLICK SULLA FORM
    button.addEventListener('click', (event) => {
        event.preventDefault();

        // RECUPERO L'HTML DELLA MODALE DI BOOTSTRAP TRAMITE L'ID
        const modal = document.getElementById('modalDelete');

        // CREO UN ISTANZA NELLA CLASSE MODAL E FACCIO APPARIRE LA MODALE AL CLICK SULLA FORM
        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        // RECUPERO IL BOTTONE DI CANCELLAZIONE DELLE MODALE 
        const modalButtonDelete = document.querySelector('.confirm-delete');

        // APPLICO UN EVENTO AL CLICK SUL BOTTONE DI CANCELLAZIONE DELLA MODALE
        modalButtonDelete.addEventListener('click', () => {
            button.parentElement.submit()
        })

    })
})
