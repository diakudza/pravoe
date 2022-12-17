@if (session('success'))
    <div class="absolute bottom-10 right-5  flex justify-center alert_popup">
        <div class="w-content box-content alert alert-success shadow-lg opacity-90">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span> {{ session('success') }}</span>
        </div>
    </div>
@endif

@if (session('fail'))
    <div class="absolute bottom-10 right-5  flex justify-center alert_popup">
        <div class="alert alert-error shadow-lg opacity-90">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span> {{ session('fail') }}</span>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="absolute bottom-10 right-5  flex flex-col gap-3 justify-center alert_popup">
        @foreach ($errors->all() as $error)
            <div class="alert alert-error shadow-lg opacity-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ $error }} </span>
            </div>
        @endforeach
    </div>
@endif

