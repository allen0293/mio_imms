console.log("Transaction Table Loaded");
class TransactionTable {

    constructor() {
        this.rowIndex = 0;
        this.tableBody = document.getElementById('itemsTableBody');
        this.addButton = document.getElementById('btnAddItem');
        this.grandTotal = document.getElementById('grandTotal');

        if (!this.tableBody || !this.addButton) {
            return;
        }

        this.registerEvents();
    }

    registerEvents() {

        this.addButton.addEventListener('click', () => {
            this.addRow();
        });

        this.tableBody.addEventListener('input', (e) => {

            if (
                e.target.classList.contains('quantity') ||
                e.target.classList.contains('unit-cost')
            ) {
                this.calculateRow(e.target.closest('tr'));
            }

        });

        this.tableBody.addEventListener('click', (e) => {

            if (e.target.closest('.btn-remove')) {

                e.target.closest('tr').remove();

                this.calculateGrandTotal();

            }

        });

        this.tableBody.addEventListener('change', (e) => {

            if (e.target.matches('select[name*="[equipment_model_id]"]')) {

                this.populateModelDetails(e.target);

            }

        });

    }

        populateModelDetails(select) {

        const option = select.selectedOptions[0];

        const row = select.closest('tr');

        row.querySelector('input[name*="[unit_of_measure]"]').value =
            option.dataset.uom || '';

        row.querySelector('input[name*="[estimated_unit_cost]"]').value =
            option.dataset.cost || 0;

        row.querySelector('input[name*="[description]"]').value =
            option.dataset.description || '';

        this.calculateRow(row);

    }

    addRow() {

        this.tableBody.insertAdjacentHTML(
            'beforeend',
            this.buildRow(this.rowIndex)
        );

        this.rowIndex++;

    }

    buildRow(index) {

        let options = `<option value="">Select Model</option>`;

        window.equipmentModels.forEach(model => {

            options += `
                <option
                    value="${model.id}"
                    data-uom="${model.unit_of_measure}"
                    data-cost="${model.standard_cost}"
                    data-description="${model.specification ?? ''}">

                    ${model.model_name}

                </option>
                `;
        });

        return `
<tr>

<td>

<select
name="items[${index}][equipment_model_id]"
class="form-select"
required>

${options}

</select>

</td>

<td>

<input
type="text"
name="items[${index}][description]"
class="form-control">

</td>

<td>

<input
type="number"
name="items[${index}][quantity]"
class="form-control quantity"
value="1"
min="1">

</td>

<td>

<input
type="text"
name="items[${index}][unit_of_measure]"
class="form-control"
value="Unit">

</td>

<td>

<input
type="number"
step="0.01"
name="items[${index}][estimated_unit_cost]"
class="form-control unit-cost"
value="0">

</td>

<td>

<input
type="text"
class="form-control line-total"
value="0.00"
readonly>

</td>

<td class="text-center">

<button
type="button"
class="btn btn-danger btn-sm btn-remove">

<i class="bi bi-trash"></i>

</button>

</td>

</tr>
`;

    }

    calculateRow(row) {

        const qty = parseFloat(
            row.querySelector('.quantity').value
        ) || 0;

        const unitCost = parseFloat(
            row.querySelector('.unit-cost').value
        ) || 0;

        const total = qty * unitCost;

        row.querySelector('.line-total').value =
            total.toLocaleString('en-PH', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

        this.calculateGrandTotal();

    }

    calculateGrandTotal() {

        let total = 0;

        document.querySelectorAll('.line-total').forEach(input => {

            total += parseFloat(
                input.value.replace(/,/g, '')
            ) || 0;

        });

        this.grandTotal.innerHTML =
            '₱' +
            total.toLocaleString('en-PH', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

    }

}

document.addEventListener('DOMContentLoaded', () => {

    new TransactionTable();

});