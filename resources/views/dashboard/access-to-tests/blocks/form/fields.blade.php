<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="group_id">Select group</label>
            <select class="form-control" id="group_id" name="group_id">
                <option value="-1">Select group</option>
                @forelse($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @empty
                @endforelse
            </select>
        </div>

        @error('group_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="test_id">Select test</label>
            <select class="form-control" id="test_id" name="test_id">
                <option value="-1">Select test</option>
                @forelse($tests as $test)
                    <option value="{{ $test->id }}">{{ $test->name }}</option>
                @empty
                @endforelse
            </select>
        </div>

        @error('test_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
