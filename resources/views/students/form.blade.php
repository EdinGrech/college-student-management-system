<div class="mb-3">
    <label for="name" class="form-label">Student Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email ?? '') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $student->phone ?? '') }}" required>
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob', $student->dob ?? '') }}" required>
    @error('dob')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="college_id" class="form-label">College <span class="text-danger">*</span></label>
    <select name="college_id" id="college_id" class="form-select @error('college_id') is-invalid @enderror" required>
        <option value="">Select College</option>
        @foreach ($colleges as $college)
            <option value="{{ $college->id }}" {{ old('college_id', $student->college_id ?? '') == $college->id ? 'selected' : '' }}>
                {{ $college->name }}
            </option>
        @endforeach
    </select>
    @error('college_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
