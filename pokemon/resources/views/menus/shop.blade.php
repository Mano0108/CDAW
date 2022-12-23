<x-app-layout>

@push('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

@endpush

<style>
     .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.disabled {
     
     background-color: #ff0000; /* red */
  opacity: 0.6;
  cursor: not-allowed;
}
</style>

@push('script')
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/create_table_shop.js') }}"></script>
@endpush

@include('menus.header')

<h1>{{$user->gold}}</h1>

<table id="shop">
       <thead>
            <tr>
                <th>icon</th>
                <th>name</th>
                <th>cost</th>
                <th>unlock</th>
            </tr>
       </thead> 
       <tbody>
          @foreach($energies as $energy)
          <tr>
               <td><img src={{ $energy->icon }} ></td>
               <td> <img src={{$energy ->path }} alt={{$energy ->name}}>
                    <span style="display:none;">{{ $energy->name }}</span></td>
               <td>80</td>
               <td>
               
                    @if ($user->gold >= 80)
                         <form method="POST" action="/unlocked">
                         @csrf
                         <button class= "button" name="energy_id" value="{{ $energy->energy_id }}">UNLOCK</button>
                         </form>

                    @else
                         <form method="POST" action="/unlocked">
                         @csrf
                         <button class= "button disabled" name="energy_id" value="{{ $energy->energy_id }}" disabled>UNLOCK</button>
                         <h3>Not enough gold </h3>
                         </form>
                    @endif
               </td>
          </tr>
          @endforeach
       </tbody>
</table>

</x-app-layout>