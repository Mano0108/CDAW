<x-app-layout>

@push('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush


@push('script')
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/create_table_shop.js') }}"></script>
@endpush

@include('menus.header')


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
                    <form method="POST" action="/unlocked">
                    @csrf
                    <button name="energy_id" value="{{ $energy->energy_id }}">UNLOCK</button>
                    </form>
               </td>
          </tr>
          @endforeach
       </tbody>
</table>

</x-app-layout>