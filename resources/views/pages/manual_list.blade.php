<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/"
                alt="Manuals for '{{ $brand->name }}'" title="Manuals for '{{ $brand->name }}'">{{ $brand->name }}</a>
        </li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand' => $brand->name]) }}</p>

    <div class="manuallist">
        @foreach ($manuals as $manual)
            <div class="manualitem">
                <a href="{{ route('manuals.countviews', $manual->id) }}" target="_blank"
                    title="{{ $manual->name }}">{{ $manual->name }}</a>
            </div>
        @endforeach
    </div>

    <form action="{{ route('brands.update', $brand->id) }}" method="POST">
        @csrf
        <label for="">Rename: </label>
        <input type="text" name="name" value="{{ $brand->name }}">

        <label for="">Categorie: </label>
        <select id="categorie" name="categorie" value="{{ $brand->categorie }}">
            <option value="{{ $brand->categorie }}">{{ $brand->categorie }}</option>
            <option value="communicatie">Communicatie Device</option>
            <option value="music">Music Device</option>
            <option value="game">Game Device</option>
            <option value="Niks aangegeven">Overige</option>
        </select>


        <input type="submit" value="Submit" value="">
    </form>
    <br>
    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="DELETE">
    </form>
    <br>

</x-layouts.app>
