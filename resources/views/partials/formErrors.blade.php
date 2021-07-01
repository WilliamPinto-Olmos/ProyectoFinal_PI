@if($errors->any())
    <div class="alert alert-danger">
        <h6 class="mb-4 font-semibold">
            Verifique los campos del formulario
        </h6>
        <p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </p>
    </div>
@endif