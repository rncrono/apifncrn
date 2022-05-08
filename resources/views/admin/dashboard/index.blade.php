@extends('admin.layout.main')
@section('title')
    Dashboard
@endsection
@section('content')
<tr>
    <td>
        <div id="wrapper">
            <h1>Dashboard</h1>
            <div class="list-alerts">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>
            </div>
        </div>    
    </td>
</tr>
@endsection
@section('onPageJS')
    <script>
        $(function(){
            
        });
    </script>
@endsection