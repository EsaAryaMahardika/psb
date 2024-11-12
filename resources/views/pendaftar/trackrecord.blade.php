<table class="table table-responsive table-bordered">
    <thead class="table-primary">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Pertanyaan</th>
            <th scope="col">YA</th>
            <th scope="col">TIDAK</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($soal as $item)    
        <tr class="text-center">
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->soal }}</td>
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="soal{{ $item->id }}" value="YA" required>
                </div>
            </td>
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="soal{{ $item->id }}" value="TIDAK" required>
                </div>
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>