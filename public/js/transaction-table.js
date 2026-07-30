let rowIndex = 0;

document.addEventListener("DOMContentLoaded", function () {

    const addButton = document.getElementById("btnAddItem");

    if (!addButton) return;

    addButton.addEventListener("click", addRow);

});

function addRow() {

    const tbody = document.getElementById("itemsTableBody");

    tbody.insertAdjacentHTML(
        "beforeend",
        buildRow(rowIndex)
    );

    rowIndex++;

}

function buildRow(index) {

    let options = '<option value="">Select Model</option>';

    window.equipmentModels.forEach(model => {

        options += `
            <option value="${model.id}">
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

<td>

<button
type="button"
class="btn btn-danger btn-sm"
onclick="removeRow(this)">

<i class="bi bi-trash"></i>

</button>

</td>

</tr>
`;

}

function removeRow(button){

    button.closest("tr").remove();

    calculateGrandTotal();

}