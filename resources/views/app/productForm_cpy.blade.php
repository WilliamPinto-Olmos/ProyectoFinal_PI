@if(isset($producto))
            <!-- Editar programa -->
            <form action="{{ route('producto.update', $producto) }}" method="POST">    
              @method('PATCH')
          @else 
          <!-- Crear programa -->
            <form action="{{ route('producto.store') }}" method="POST">
          @endif

            @csrf
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $producto->nombre ?? '' }}">

            <br>

            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') ?? $producto->descripcion ?? '' }}">
            <br>

            <label for="precio">Precio: </label>
            <input type="number" min="0" name="precio" id="precio" value="{{ old('precio') ?? $producto->precio ?? '' }}">
            <br>

            <label for="stock">Stock: </label>
            <input type="number" min="0" name="stock" id="stock" value="{{ old('stock') ?? $producto->stock ?? '' }}">
            <br>

            <label for="img">Imagen: </label>
            <input type="text" name="img" id="img" value="{{ old('img') ?? $producto->img ?? '' }}">
            <br>

            <label for="provedor_id">Provedor: </label>
            <select name="provedor_id" id="provedor_id">
              @foreach($provedores as $provedor)
                <option value="{{ $provedor->id }}">{{ $provedor->nombre }}</option>
              @endforeach
            </select>

            <input type="submit" value="Guardar">
          </form>
          