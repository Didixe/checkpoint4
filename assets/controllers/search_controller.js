import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        const input = this.element;
        const table = document.getElementById("myTable");
        const tr = table.getElementsByTagName("tr");

        input.addEventListener('input', function() {
            const filter = input.value.toUpperCase();

            for (let i = 0; i < tr.length; i++) {
                let found = false;

                for (let j = 0; j < tr[i].getElementsByTagName("td").length - 2; j++) {
                    const td = tr[i].getElementsByTagName("td")[j];

                    if (td) {
                        const txtValue = td.textContent || td.innerText;

                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }

                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        });
    }
}