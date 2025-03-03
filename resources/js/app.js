import DataTable from 'datatables.net-dt';
import "../css/datatables.css";
import { data } from 'autoprefixer';

document.addEventListener('livewire:navigated', () => {
    
        const selectors = document.querySelectorAll('.dt-table');
     
        selectors.forEach((selector, index) => {

            const dataTable = new DataTable(selector);
            selector.setAttribute('wire:key', index)
            
            // If you go back or forward of history, reload page
            window.addEventListener("popstate", () => {
                location.reload(); 
            });
            
            
        }); 




});

