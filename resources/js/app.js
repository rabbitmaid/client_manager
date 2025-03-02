import DataTable from 'datatables.net-dt';
import "../css/datatables.css";

document.addEventListener('livewire:navigated', () => {
    
        const selectors = document.querySelectorAll('.dt-table');
        selectors.forEach((selector, index) => {
            new DataTable(selector);
            selector.setAttribute('wire:key', index);
            selector.setAttribute('wire:ignore');
        }); 

});

