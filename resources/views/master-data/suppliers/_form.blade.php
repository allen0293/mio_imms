@csrf

<div class="row g-3">

<div class="col-md-4">

<label class="form-label">Supplier Code</label>

<input type="text"
name="supplier_code"
class="form-control"
value="{{ old('supplier_code',$supplier->supplier_code ?? '') }}">

</div>

<div class="col-md-8">

<label class="form-label">Supplier Name</label>

<input type="text"
name="supplier_name"
class="form-control"
value="{{ old('supplier_name',$supplier->supplier_name ?? '') }}">

</div>

<div class="col-md-6">

<label class="form-label">Contact Person</label>

<input type="text"
name="contact_person"
class="form-control"
value="{{ old('contact_person',$supplier->contact_person ?? '') }}">

</div>

<div class="col-md-6">

<label class="form-label">Contact Number</label>

<input type="text"
name="contact_number"
class="form-control"
value="{{ old('contact_number',$supplier->contact_number ?? '') }}">

</div>

<div class="col-md-6">

<label class="form-label">Email</label>

<input type="email"
name="email"
class="form-control"
value="{{ old('email',$supplier->email ?? '') }}">

</div>

<div class="col-md-6">

<label class="form-label">TIN Number</label>

<input type="text"
name="tin_number"
class="form-control"
value="{{ old('tin_number',$supplier->tin_number ?? '') }}">

</div>

<div class="col-12">

<label class="form-label">Address</label>

<textarea
name="address"
rows="3"
class="form-control">{{ old('address',$supplier->address ?? '') }}</textarea>

</div>

<div class="col-12">

<label class="form-label">Remarks</label>

<textarea
name="remarks"
rows="3"
class="form-control">{{ old('remarks',$supplier->remarks ?? '') }}</textarea>

</div>

<div class="col-md-4">

<label>Status</label>

<select
name="is_active"
class="form-select">

<option value="1"
@selected(old('is_active',$supplier->is_active ?? 1)==1)>
Active
</option>

<option value="0"
@selected(old('is_active',$supplier->is_active ?? 1)==0)>
Inactive
</option>

</select>

</div>

</div>

<div class="mt-4 d-flex justify-content-end gap-2">

<a href="{{ route('master-data.suppliers.index') }}"
class="btn btn-secondary">

Cancel

</a>

<button class="btn btn-primary">

Save Supplier

</button>

</div>