import DataTable from 'datatables.net-dt';
import "../css/datatables.css";

document.addEventListener('livewire:navigated', () => {
    
    const selectors = document.querySelectorAll('.dt-table');
    selectors.forEach((selector) => {
        let table = new DataTable(selector);
    });

});