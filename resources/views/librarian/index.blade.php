@extends("layouts.librarian")


@section("title", "Librarian")


@section("content")
   @if (count($undelivered) === 0)
       <span>There is no undelivered book.</span>
   @else
    <table>
        <tr>
           <th>Student Number</th>
           <th>Student Name</th>
           <th>Book</th>
           <th>Verilis Tarihi</th>
           <th>Planlanan</th>
        </tr>
        @foreach($undelivered as $data)
        <tr>
            <td>{{$data->OgrenciNo}}</td>
            <td>{{$data->OgrenciAdi}}</td>
            <td>{{$data->KitapAdi}}</td> 
            <td>{{$data->VerilisTarihi}}</td>
            <td>{{$data->PlanlananVerilisTarihi}}</td>  
        </tr>    
        @endforeach
    </table>
    @endif
@endsection