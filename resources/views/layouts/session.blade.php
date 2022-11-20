@if (session('success'))
    <div x-data="{ showSuccess: true }" x-show="showSuccess" x-init="setTimeout(() => showSuccess = false, 3000)">
        <div>
            <div class="session">
                <div class="card text-center bg-success">
                    <div class="card-body p-5 text-white">
                        <h4 class="card-title">{{ session('success') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif(session('delete'))
    <div x-data="{ showDelete: true }" x-show="showDelete" x-init="setTimeout(() => showDelete = false, 3000)">
        <div>
            <div class="session">
                <div class="card text-center bg-danger">
                    <div class="card-body p-5 text-white">
                        <h4 class="card-title">{{ session('delete') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
@endif
