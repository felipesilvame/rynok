<table class="table table-responsive" id="ventaAccions-table">
    <thead>
        
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($ventaAccions as $ventaAccion)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['ventaAccions.destroy', $ventaAccion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ventaAccions.show', [$ventaAccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ventaAccions.edit', [$ventaAccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>